<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function allPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }

    public function addPortfolio()
    {
        return view('admin.portfolio.add_portfolio');
    }

    public function storePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio Name is required',
            'portfolio_title.required' => 'Portfolio Title is required',
        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1020, 519)->save('upload/portfolio_image/' . $name_gen);
        $save_url = 'upload/portfolio_image/' . $name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_image' => $save_url,
            'portfolio_description' => $request->portfolio_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    public function editPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit_portfolio',compact('portfolio'));
    }

    public function updatePortfolio(Request $request){
        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1020, 519)->save('upload/portfolio_image/' . $name_gen);
            $save_url = 'upload/portfolio_image/' . $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated With Image!',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);
        } else { //end if
            Portfolio::findOrFail($portfolio_id)->update(['portfolio_name' => $request->portfolio_name,
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated Without Image!',
                'alert-type' => 'success'
            );
            return redirect()->route('all.portfolio')->with($notification);
        }  //end else
    }

    public function deletePortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        $image = $portfolio->portfolio_image;
        unlink($image);
        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Portfolio Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    public function portfolioDetails($id){
        $singlePortfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('singlePortfolio'));
    }
}
