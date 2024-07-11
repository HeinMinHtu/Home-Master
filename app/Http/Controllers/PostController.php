<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function postList(){
       $posts=Post::with('category')->where('user_id',Auth::user()->id)->latest()->paginate(3);
       return view('service.post.index',compact('posts'));

    }
    public function postCreate(){
        $categories=Category::all();
        return view('service.post.create',compact('categories'));
    }
    public function postStore(Request $request){

        $data=  $request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Handle the image upload
        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);

        $data['image']=$imageName;
        $data['user_id']=Auth::user()->id;

        Post::create($data);
        return redirect()->route('service.post.list')->with('success', 'ပိုစ့် အား ဖန်တီးလိုက်ပါပီ!');
    }

    public function postDelete($id){
       Post::find($id)->delete();
       return back()->with('success','ပို့စ် အား ဖျက်လိုက်ပါပီ');
    }

    public function postEdit($id){
       $post= Post::findOrfail($id);
       $categories=Category::all();
       return view('service.post.edit',compact('post','categories'));
    }

    public function postUpdate($id,Request $request)
    {
        // Validate the request data
        $data=$request->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);
        $post=Post::find($id);
        $existedImage = $post->image;
        if ($request->image) {
            File::delete('storage/images/' . $existedImage);

            // store a new image
            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/\images', $imageName);
            $data['image'] = $imageName;
        }



        $post->update($data);
        // Redirect back with a success message
        return redirect()->route('service.post.list')->with('success', 'ပိုစ်အားပြင်လိုက်ပါပီ!');
    }

}
