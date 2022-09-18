<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Image;
use App\Models\User;
use Tests\TestCase;

class ImageManagementTest extends TestCase
{
    /** @test */

    use RefreshDatabase;

    public function a_list_of_images_can_be_retrieved_by_its_owner ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory(3)->create([
            'user_id' => 1
        ]);

        $this->assertCount(3, Image::all());

        $response = $this->get('/images');

        $images = Image::all();
        $images = $images->where('user_id', $user->id);

        $this->assertCount(3, $images);
        $response->assertViewIs('images.index');
        $response->assertViewHas('images', $images);
    
    }

    /** @test */
    public function an_image_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        Image::factory()->create([]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $response = $this->get('/images/'.$image->id);
        
        $response->assertViewIs('images.show');
        $response->assertViewHas('image', $image);
    }

    /** @test */
    public function an_image_can_be_created_by_authenticated_user()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        $response = $this->post('/images', [
            'name' => 'Test name',
            'url'=> 'Test url',
        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $this->assertEquals($image->name, 'Test name');
        $this->assertEquals($image->url, 'Test url');
        $this->assertEquals($image->user_id, 1);

        $response->assertRedirect('/images/'.$image->id);
    }

    

    /** @test */
    public function image_name_is_required()
    {
        $response = $this->post('/images', [
            'name' => '',
            'url'=> 'Test url',
        ]); 

        $response->assertSessionHasErrors(['name']);
    
    }

    /** @test */
    public function image_url_is_required()
    {
        $response = $this->post('/images', [
            'name' => 'Test name',
            'url'=> '',
        ]); 

        $response->assertSessionHasErrors(['url']);
    
    }

     /** @test */
    //  public function an_image_can_be_updated()
    //  {
         
    //      $this->withoutExceptionHandling();

    //      Image::factory(1)->create();

    //      $this->assertCount(1, Image::all());

    //      $image = Image::first();

    //      $response = $this->put('/images/'.$image->id, [
    //          'name' => 'Test name',
    //          'url'=> 'Test url',
    //      ]);
 
    //      $image = $image->fresh();
 
    //      $this->assertEquals($image->name, 'Test name');
    //      $this->assertEquals($image->url, 'Test url');
 
    //      $response->assertRedirect('/images/'.$image->id);
    //  }

    //  /** @test */
    //  public function an_image_can_be_eliminated()
    //  {
         
    //      $this->withoutExceptionHandling();

    //      Image::factory(1)->create();

    //      $image = Image::first();

    //      $response = $this->delete('/images/'.$image->id);

    //      $this->assertCount(0, Image::all());
 
    //      $response->assertRedirect('/images');
    //  }

     
}
