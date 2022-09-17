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

    public function a_list_of_images_can_be_retrieved ()
    {
        $this->withoutExceptionHandling();
        Image::factory(3)->create();


        $this->assertCount(3, Image::all());

        $response = $this->get('/images');
        $images = Image::all();
        $response->assertViewIs('images.index');
        $response->assertViewHas('images', $images);
    
    }

    /** @test */
    public function an_image_can_be_retrieved ()
    {
        $this->withoutExceptionHandling();

        Image::factory(1)->create();

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $response = $this->get('/images/'.$image->id);
        
        $response->assertViewIs('images.show');
        $response->assertViewHas('image', $image);
    }

    /** @test */
    public function an_image_can_be_created()
    {
        
        $this->withoutExceptionHandling();

        $response = $this->post('/images', [
            'name' => 'Test name',
            'url'=> 'Test url',

        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $this->assertEquals($image->name, 'Test name');
        $this->assertEquals($image->url, 'Test url');

        $response->assertRedirect('/images/'.$image->id);
    }

     /** @test */
     public function an_image_can_be_updated()
     {
         
         $this->withoutExceptionHandling();

         Image::factory(1)->create();

         $this->assertCount(1, Image::all());

         $image = Image::first();

         $response = $this->put('/images/'.$image->id, [
             'name' => 'Test name',
             'url'=> 'Test url',
         ]);
 
         $image = $image->fresh();
 
         $this->assertEquals($image->name, 'Test name');
         $this->assertEquals($image->url, 'Test url');
 
         $response->assertRedirect('/images/'.$image->id);
     }

     /** @test */
     public function an_image_can_be_eliminated()
     {
         
         $this->withoutExceptionHandling();

         Image::factory(1)->create();

         $image = Image::first();

         $response = $this->delete('/images/'.$image->id);

         $this->assertCount(0, Image::all());
 
         $response->assertRedirect('/images');
     }
}
