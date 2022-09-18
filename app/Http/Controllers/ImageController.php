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

        $images = $images->where('user_id', $user->id);
    
        return view ('images.index')->with('images',$images);

    }

    public function show(Image $image)
    {   
        return view ('images.show')->with('image',$image);
    }

    public function create()
    {
        return view ('images.create');
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

    public function edit($id)
    {
        $image = Image::findOrfail($id);

        return view ('images.edit')->with('image', $image);
    }

    public function update(Image $image)
    {
        $user = auth()->user();

        if ($image->user_id == $user->id) {
            $data = request()->validate([
                'name' => 'required|min:5|max:255',
                'url' => 'required|min:5|max:255',
            ]);
    
            $image->update($data);
    
            return redirect('/images/'.$image->id);
        } else {
            return redirect('/images');
        }
        
    }

    public function destroy(Image $image)
    {
        $user = auth()->user();

        if ($image->user_id == $user->id) {
            $image->delete();

            return redirect('/images');
        } else {
            return redirect('/images');
        }
    }
}
