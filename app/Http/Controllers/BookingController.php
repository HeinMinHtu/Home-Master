<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Bool_;

class BookingController extends Controller
{
    public function serviceBookingList($post_id)
    {
       $bookings=Booking::where('post_id',$post_id)->latest()->paginate(5);
       return view('service.booking.all',compact('bookings'));
    }

    public function serviceBookingAll(){
        $posts=Post::where('user_id',Auth::user()->id)->get();
        $bookings = collect();
        foreach($posts as $post){
            $postbooking=Booking::where('post_id',$post->id)->get();
            $bookings=$bookings->merge($postbooking);
        }

        return view('service.booking.all',compact('bookings'));


    }

    public function bookingAccept($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return back()->with('error', 'Booking not found.');
    }
    if ($booking->status === 'comfirm') {
        return back()->with('error', 'Booking သည် ယခင်ထဲက လက်ခံပီးပီဖစ်နေပါသည်.');
    }
    // Update booking status to "confirm"
    $booking->status = 'comfirm';
    $booking->update();

    return back()->with('success', 'Booking လက်ခံလိုက်ပါပီ.');
}

public  function bookingReject($id){
    $booking = Booking::find($id);

    if (!$booking) {
        return back()->with('error', 'Booking not found.');
    }
    if ($booking->status === 'reject') {
        return back()->with('error', 'Booking သည် ယခင်ထဲက ငြင်းထားပီဖစ်နေပါသည်.');
    }
    // Update booking status to "confirm"
    $booking->status = 'reject';
    $booking->update();

    return back()->with('success', 'Booking ငြင်းထားပါသညိ.');

}

public function bookingDelete($id){
    Booking::find($id)->delete();
    return back()->with('success','Booking ကိုဖျက်လိုက်ပါပီ');

}
}
