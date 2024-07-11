<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $totalPosts=Post::where('user_id',Auth::user()->id)->get();
        $approvedPosts=Post::where('user_id',Auth::user()->id)->where('status','accept')->get();
        $rejectPosts=Post::where('user_id',Auth::user()->id)->where('status','reject')->get();
        $reviews=Review::where('service_provider_id',Auth::user()->id)->get();

        return view('service.index',compact('totalPosts','approvedPosts','rejectPosts','reviews'));
    }

    public function reviewList(){
        $reviews=Review::where('service_provider_id',Auth::user()->id)->paginate(7);
        return view('service.review.index',compact('reviews'));


    }
    public function adminreviewList()
{
    $reviews=Review::paginate(6);
    return view('admin.review.index',compact('reviews'));
}

}
