<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $users=User::where('role','user')->get();
        $providers=User::where('role','service')->get();
        $pendingPosts=Post::where('status','pending')->get();
        $acceptPosts=Post::where('status','accept')->get();
        $rejectPosts=Post::where('status','reject')->get();
        $reviews=Review::all();
        return view('admin.index',compact('users','providers','pendingPosts','acceptPosts','rejectPosts','reviews'));
    }
    public function customerList(){
        $users=User::where('role','user')->latest()->paginate(5);
        return view('admin.user.customerlist',compact('users'));
    }
    public function serviceList(){
        $users=User::where('role','service')->latest()->paginate(5);
        return view('admin.user.customerlist',compact('users'));
    }
    public function postList(){
        $posts=Post::with('user')->latest()->paginate(5);
        return view('admin.Post.index',compact('posts'));

    }
   public function postAccept($id){
    $post = Post::find($id);

    if ($post) {
        if($post->status==='accept'){
            return redirect()->back()->with('error', 'Postသည် ယခင်ထဲက လက်ခံပီးပီဖစ်နေပါသည်.');
        }
        $post->update(['status' => 'accept']);
        return redirect()->back()->with('success', 'ပိုစ့်တင်ခြင်းအား Approved ပေးလိုက်ပါပီ.');
    } else {
        return redirect()->back()->with('error', 'ပိုစ့်အားမတွေ့ပါ.');
    }
   }

   public function postReject($id) {
    $post = Post::find($id);

    if ($post) {
        if($post->status==='reject'){
            return redirect()->back()->with('error', 'Postသည် ယခင်ထဲက ပယ်ချပီးပီဖစ်နေပါသည်.');
        }
        $post->update(['status' => 'reject']);
        return redirect()->back()->with('success', 'ပိုစ့်တင်ခြင်းအား ပယ်ချလိုက်ပါပီ');
    } else {
        return redirect()->back()->with('error', 'ပိုစ့်အားမတွေ့ပါ.');
    }
}

public function adminProfile(){
    $user=User::find(Auth::user()->id);
    return view('admin.profile.index',compact('user'));

}

public function adminProfileEdit(){

    $user=User::find(Auth::user()->id);
    return view('admin.profile.edit',compact('user'));
}

public function adminProfileUpdate(Request $request){
    $data=$request->validate([
        "name"=>"required",
        "email"=>'required|email',
        "password"=>"required|min:3",
        "phone"=>'required',
        "image"=>"required|image|mimes:png,jpg"
      ]);
      $id=Auth::user()->id;

      $image = $request->image;
      $imageName = uniqid() . '_' . $image->getClientOriginalName();
      $image->storeAs('public/images', $imageName);

     $data['image']=$imageName;

    User::find($id)->update($data);
    return redirect()->route('admin.profile.index')->with('success','သင့်အချက်လက်များကို ပြုပြင်ပီးပါပီ');


}

public function customerDelete($id){
    $user = User::find($id);

    if ($user) {
        $user->delete();
        return back()->with('success', 'အောင်မြင်စွာနဲ့ဖျက်လိုက်ပါပီ');
    } else {
        return back()->with('error', 'Customer not found');
    }
}

public  function customerDetail($id){
  $user=User::find($id);
  return view('admin.user.customerDetail',compact('user'));
}

public function serviceDetail($id){
    $category=Category::find($id);
    return view('admin.category.detail',compact('category'));
}
public function postDetail($id){
    $post=Post::find($id);
    return view('admin.Post.detail',compact('post'));
}

public  function userBookingList($id){
   $bookings=Booking::where('user_id',$id)->paginate(5);
   return view('admin.Booking.userbooking',compact('bookings'));
}
public function bookingList(){
    $bookings=Booking::paginate('10');
    return view('admin.Booking.userbooking',compact('bookings'));
}
public function servicePostList($id){
    $posts=Post::where('user_id',$id)->paginate(5);
    return view('admin.Post.index',compact('posts'));
}
public function userProfileEdit($id){
    $user=User::find($id);
    return view('admin.user.edit',compact('user'));
}
public function userProfileUpdate($id,Request $request){
    $data=$request->validate([
        "name"=>"required",
        "email"=>'required|email',
        "password"=>"required|min:3",
        "phone"=>'required',
        "image"=>"required|image|mimes:png,jpg"
    ]);

      $image = $request->image;
      $imageName = uniqid() . '_' . $image->getClientOriginalName();
      $image->storeAs('public/images', $imageName);

     $data['image']=$imageName;

    User::find($id)->update($data);
    return redirect()->route('admin.customers.list')->with('success',' User အချက်လက်များကို ပြုပြင်ပီးပါပီ');
}

public function cusReviewList($cusid){
    $reviews=Review::where('customer_id',$cusid)->paginate(8);
    return view('admin.review.index',compact('reviews'));


}
}
