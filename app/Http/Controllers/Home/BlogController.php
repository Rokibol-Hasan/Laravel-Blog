<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use Image;
use App\Models\BlogCategory;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function allBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('blogs'));
    }

    public function addBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.add_blog', compact('categories'));
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
        ], [
            'blog_category_id.required' => 'Category Name is required',
            'blog_title.required' => 'Blog Title is required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 327)->save('upload/blog_image/' . $name_gen);
        $save_url = 'upload/blog_image/' . $name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_image' => $save_url,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('blog', 'categories'));
    }

    public function updateBlog(Request $request)
    {
        $blog_id = $request->id;
        if ($request->file('blog_image')) {
            $request->validate([
                'blog_category_id' => 'required',
                'blog_title' => 'required',
            ], [
                'blog_category_id.required' => 'Category Name is required',
                'blog_title.required' => 'Blog Title is required',
            ]);

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('upload/blog_image/' . $name_gen);
            $save_url = 'upload/blog_image/' . $name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_image' => $save_url,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        } else { //end if
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Updated Without Image!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        }  //end else
    }



    public function deleteBlog($id)
    {
        $portfolio = Blog::findOrFail($id);
        $image = $portfolio->blog_image;
        unlink($image);
        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    }


    public function blogDetails($id){
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories =  BlogCategory::orderBy('blog_category','ASC')->get();
        $multiImage = MultiImage::all();
        return view('frontend.blog_details',compact('blog','recentBlogs','categories','multiImage'));
    }

    public function categoryBlog($id){
        $categoryBlogs = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories =  BlogCategory::orderBy('blog_category', 'ASC')->get();
        $category = BlogCategory::findOrFail($id);
        $multiImage = MultiImage::all();
        return view('frontend.category_blog_details',compact('categoryBlogs','blog','recentBlogs','categories','category','multiImage'));
    }

    public function homeBlog()
    {
        $homeBlog = Blog::latest()->get();
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories =  BlogCategory::orderBy('blog_category', 'ASC')->get();
        $multiImage = MultiImage::all();
        return view('frontend.blogs', compact('recentBlogs', 'categories', 'multiImage', 'homeBlog'));
    }
}
