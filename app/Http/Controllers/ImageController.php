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

        $images = $images->where('user_id', $user->id)->sortByDesc('id');

        $message = "";

        if ($images->count() == 0) {
            $message = 'You do not have any images uploaded';
            return view ('images.index')->with('images',$images)->with('message',$message);
        } else {
            $message = 'Take a photo, it will last longer';
            return view ('images.index')->with('images',$images)->with('message',$message);
        }
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

        return redirect('/images')->with('message',$image->name.' photo is added to your gallery');
    }

    public function edit($id)
    {
        $image = Image::findOrfail($id);

        return view('images.edit')->with('image', $image);
    }


    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $image = Image::findOrfail($id);

        if ($image->user_id == $user->id) {
            $data = request()->validate([
                'name' => 'required|min:5|max:255',
                'url' => 'required|min:5|max:255',
            ]);
    
            $image->update($data);
    
            return redirect('/images')->with('message',$image->name.' photo has been modified');
        } else {
            return redirect('/images');
        }
        
    }

    public function destroy($id)
    {
        $user = auth()->user();

        $image = Image::find($id);
        
        if ($image->user_id == $user->id) {

            $image->delete();

            return redirect('/images')->with('message',$image->name.' photo has been deleted');
        } else {
            return redirect('/images');
        }
    }
}
