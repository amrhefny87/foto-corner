<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view ('images.index')->with('images',$images);

    }

    public function show(Image $image)
    {   
        return view ('images.show')->with('image',$image);
    }
    
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:5|max:255',
            'url' => 'required|min:5|max:255',
        ]);

        $image = Image::create($data);

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
