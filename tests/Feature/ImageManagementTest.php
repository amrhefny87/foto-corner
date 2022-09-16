<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Image;
use Tests\TestCase;

class ImageManagementTest extends TestCase
{
    /** @test */

    use RefreshDatabase;


    public function an_image_can_be_added()
    {
        
        $this->withoutExceptionHandling();

        $response = $this->post('/images', [
            'name' => 'test name',
            'url'=> 'test url',

        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $this->assertEquals($image->name, 'test name');
        $this->assertEquals($image->url, 'test url');
    }
}
