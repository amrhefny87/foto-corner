<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store()
    {
        $data = request()->validate([

            'name' => '',
            'url' => '',

        ]);

        $image = Image::create($data);
    }
}
