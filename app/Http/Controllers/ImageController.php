<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $images = Image::all();

        // dd($images.type);

        $images = $images->where('user_id', $user->id);

    
        return view ('images.index')->with('images',$images);

    }

    public function show(Image $image)
    {   
        return view ('images.show')->with('image',$image);
    }
    
    public function store(request $request)
    {
        $user = auth()->user();
        
        request()->validate([
            'name'  => 'required|min:5|max:255',
            'url'   => 'required|min:5|max:255',
        ]);

        $image = Image::create([
            'name'    => request()->name,
            'url'     => request()->url,
            'user_id' => $user->id
        ]);

        return redirect('/images/'.$image->id);
    }

    public function update(Image $image)
    {
        $data = request()->validate([
            'name' => 'required|min:5|max:255',
            'url' => 'required|min:5|max:255',
        ]);

        $image->update($data);

        return redirect('/images/'.$image->id);
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return redirect('/images');
    }
}
