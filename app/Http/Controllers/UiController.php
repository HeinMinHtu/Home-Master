<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UiController extends Controller
{

    public function home(){

        return view('UI.home');
    }
    public function service(){
        $categories=Category::all();
        return view('UI.service',compact('categories'));
    }
    public function contact(){
        return view('UI.contact');
    }
    public function newFeedPosts(){
       $posts=Post::where('status','accept')->get();
       return view('UI.newfedposts',compact('posts'));
    }

    public function categoryPostList($cid){
        $posts=Post::with('category')->where('category_id',$cid)->where('status', 'accept')->get();
        return view('UI.newfedposts',compact('posts'));
    }

    public function userProfile(){
        $user=User::find(Auth::user()->id);

        return view('UI.userProfile',compact('user'));
    }
    public function userPhotoEdit(){
        $user=User::find(Auth::user()->id);
        return view('UI.profileEdit',compact('user'));
    }
    public function userPhotoUpdate(Request $request){
        $id=Auth::user()->id;
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $user = User::findOrFail($id);

        // delete image if exists


        // store image
        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);



        $user->update([
            "image" => $imageName,
        ]);

        return redirect()->route('user.profile')->with("success", "ပုံကိုအောင်မြင်စွာ ပြောင်းလဲလိုက်ပါပီ!");



    }

    public function userPasswordEdit(){

        $user=User::find(Auth::user()->id);
        return view('UI.changePassword',compact('user'));

    }

    public function userPasswordUpdate(Request $request){
        $request->validate([
            "old_password"=>"required",
            "new_password"=>"required|min:8|confirmed"
        ]);

        if(!Hash::check($request->old_password,Auth::user()->password)){
            return back()->with('error','Password သည် ကိုက်ညီမှု မရှိပါ');
        }

        $id=Auth::user()->id;
        User::where('id',$id)->update([
            "password"=>Hash::make($request->new_password)
        ]);
        return redirect()->route('user.profile')->with('success','Password အောင်မြင်စွာ ချိန်းလိုက်ပါပီ');

    }

    public function newfeePostDetail($id){
        $post=Post::find($id);
        return view('UI.postDetails',compact('post'));
    }

    public function createBooking(Request $request)
{
    // Check if the authenticated user has the role 'user'
    if (Auth::user()->role !== 'user') {
        return redirect()->route('newfeed.posts')->with('error', 'Booking တင်နိုင်ရန် User အကောင့်ဖြစ်ရန် လိုအပ်ပါသည်');
    }

    // Validate the request data
    $data = $request->validate([
        'booking_time' => 'required|date|after_or_equal:today',
        'address' => 'required',
        'notes' => 'required',
    ]);

    // Get the authenticated user's ID
    $user_id = Auth::user()->id;
    // Get the post ID from the request
    $post_id = $request->input('post_id');

    // Create a new booking
    $booking = Booking::create([
        'user_id' => $user_id,
        'post_id' => $post_id,
        'address' => $request->input('address'),
        'booking_time' => $request->input('booking_time'),
        'notes' => $request->input('notes'),
    ]);

    // Redirect to the posts page with a success message
    return redirect()->route('newfeed.posts')->with('success', 'သင်သည် Bookingတင်လိုက်ပါပီ Confirm ဖြစ်ရန်စောင့်ပေးပါ');
}


    public function userHistory(){
        $bookings=Booking::where('user_id',Auth::user()->id)->paginate(5);
        return view('UI.userHistory',compact('bookings'));
    }

    public function serviceProviderList(){
        $services=User::where('role','service')->get();
        return view('UI.serviceProvider.list',compact('services'));
    }

    public function serviceProviderDetail($id){
        $user=User::find($id);
        $posts=Post::where('user_id',$id)->latest()->take(4)->get();
        $reviews=Review::where('service_provider_id',$id)->latest()->take(6)->get();
        return view('UI.serviceProvider.detail',compact('user','posts','reviews'));

    }

    public function serviceProviderPostList($id){
    $posts=Post::where('user_id',$id)->get();

    return view('UI.newfedposts',compact('posts'));

}

}
