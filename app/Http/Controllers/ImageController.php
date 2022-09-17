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
            'name' => '',
            'url' => '',
        ]);

        $image = Image::create($data);

        return redirect('/images/'.$image->id);
    }

    public function update(Image $image)
    {
        $data = request()->validate([
            'name' => '',
            'url' => '',
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
