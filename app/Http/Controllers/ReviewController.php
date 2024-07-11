<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function uiReviewStore(Request $request){
        $data=$request->validate([
            "review_text"=>"required"
        ]);
        Review::create([
            "customer_id"=>Auth::user()->id,
            "service_provider_id"=>$request->input('service_provider_id'),
            "review_text"=>$request->input('review_text')


        ]);

       return back()->with('success','သင်သည် ၀န်ဆောင်မှုပေးသူအား Review ပေးပီးပါပီ');
    }

    public function reviewDelete($id) {
        $review = Review::find($id);
        if (!$review) {
            return back()->with('error', 'ဒီတစ်ခါသင့်တွင်ကွန့်မန့်မရှိသေးပါ');
        }

        if ($review->customer_id == Auth::user()->id) {
            $review->delete();
            return back()->with('success', 'သင့်ကွန့်မန့်ကို ဖျက်လိုက်ပါပီ');
        }

        return back()->with('error', 'သင့်သည်အခြားသူ၏ကွန့်မန့်ကိုဖျက်လို့မရနိုင်ပါ');
    }
}
