<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    public function allBlogCategory(){
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('blogCategories'));
    }

    public function addBlogCategory(){
        return view('admin.blog_category.add_blog_category');
    }

    public function storeBlogCategory(Request $request){
        $request->validate([
            'blog_category' => 'required',
        ], [
            'blog_category.required' => 'Blog Category is required',
        ]);

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Category Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }


    public function editBlogCategory($id){
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category',compact('category'));
    }

    public function updateBlogCategory(Request $request){

        $cat_id = $request->id;
        $request->validate([
            'blog_category' => 'required',
        ], [
            'blog_category.required' => 'Blog Category is required',
        ]);

        BlogCategory::findOrFail($cat_id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }

    public function deleteBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }
}
