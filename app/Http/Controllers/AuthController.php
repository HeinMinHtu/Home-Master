<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view("Auth.register");
    }

    public function registerStore(Request $request){
        $data=$request->validate([
            "name"=>"required",
            "email"=>'required|email|unique:users,email',
            "password"=>"required|min:3",
            "role"=>'required',
            "phone"=>'required',
            "image"=>"required|image|mimes:png,jpg"
          ]);

          $image = $request->image;
          $imageName = uniqid() . '_' . $image->getClientOriginalName();
          $image->storeAs('public/images', $imageName);

         $data['image']=$imageName;
         User::create($data);
         return redirect()->route('login');
    }

    // Check database login
    public function loginStore(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            }

            else {
                return redirect()->intended('/');

            }
        }

        return back()->with(['error' => 'Please check your credentials!'])->withInput($request->only('email'));
    }


    public function logout(Request $request)
    {
        Auth()->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function serviceProfile(){
        $user=User::find(Auth::user()->id);
        return view('service.profile.index',compact('user'));
    }

    public function serviceProfilePhotoEdit(){
        $user=User::find(Auth::user()->id);
        return view('service.profile.edit',compact('user'));

    }
    public function servicePhotoUpdate(Request $request){
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

        return redirect()->route('service.profie.index')->with("success", "ပုံကိုအောင်မြင်စွာ ပြောင်းလဲလိုက်ပါပီ!");
    }

    public function servicePasswordEdit(){
        $user=User::find(Auth::user()->id);
        return view('service.profile.passwordEdit',compact('user'));
    }
    public function servicePasswordUpdate(Request $request){
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
        return redirect()->route('service.profie.index')->with('success','Password အောင်မြင်စွာ ချိန်းလိုက်ပါပီ');

    }

}
