<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $categories = Category::latest()->paginate(4);
        return view('admin.category.index', compact('categories'));
    }

    public function categoryCreate()
    {
        return view('admin.category.create');
    }

    public function categoryStore(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        // Create category
        Category::create($data);

        // Redirect back with a success message
        return redirect()->route('admin.service.category.list')->with('success', 'Service category ဖန်တီးလိုက်ပါပီ!');
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.service.category.list')->with('success', ' Service Categoryအား ဖျက်လိုက်ပါပီ.');
        } else {
            return redirect()->route('admin.service.category.list')->with('error', 'Category not found.');
        }
    }

    public function categoryEdit($id)
    {

        $category=Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate($id,Request $request){
        $category=Category::findOrfail($id);
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg',
        ]);

        $category=Category::find($id);
        $existedImage = $category->image;
        if ($request->image) {
            File::delete('storage/images/' . $existedImage);

            // store a new image
            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/\images', $imageName);
            $data['image'] = $imageName;
        }

        // Update category
        $category->update($data);

        // Redirect back with a success message
        return redirect()->route('admin.service.category.list')->with('success', 'Service Categoryပြင်လိုက်ပါပီ!');
    }

}
