<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Image;
use App\Models\User;
use Tests\TestCase;

class ImageManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_new_user_will_receive_a_message_that_photos_have_not_been_uploaded ()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => 'Test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $images = Image::all();

        $message = 'You do not have any images uploaded';

        $this->assertCount(0, Image::all());

        $response = $this->get('/images');

        $response->assertViewIs('images.index');
        $response->assertViewHas('message', $message);
    }

    /** @test */
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
    public function an_image_can_be_retrieved ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory()->create([]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $response = $this->get('/images/'.$image->id);
        
        $response->assertViewIs('images.show');
        $response->assertViewHas('image', $image);
    }

    /** @test */
    public function an_image_can_be_created_by_authenticated_user ()
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

        $response->assertRedirect('/images');
    }

    /** @test */
    public function image_name_is_required_to_create_an_image ()
    {   
        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);
        
        $response = $this->post('/images', [
            'name' => '',
            'url'=> 'Test url',
        ]); 

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function image_url_is_required_to_create_an_image ()
    {
        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        $response = $this->post('/images', [
            'name' => 'Test name',
            'url'=> '',
        ]); 

        $response->assertSessionHasErrors(['url']);
    }

    /** @test */
    public function an_image_can_be_updated_by_its_uploader()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory()->create([
            'user_id' => 1
        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();

        $response = $this->put('/images/'.$image->id, [
             'name' => 'Test name',
             'url'=> 'Test url',
        ]);
 
        $image = $image->fresh();
 
        $this->assertEquals($image->name, 'Test name');
        $this->assertEquals($image->url, 'Test url');
 
        $response->assertRedirect('/images');
    }

    /** @test */
    public function image_name_is_required_to_update_an_image ()
    {   
        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory()->create([
            'user_id' => 1
        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();
        
        $response = $this->put('/images/'.$image->id, [
            'name' => '',
            'url'=> 'Test url',
       ]);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function image_url_is_required_to_update_an_image ()
    {   
        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory()->create([
            'user_id' => 1
        ]);

        $this->assertCount(1, Image::all());

        $image = Image::first();
        
        $response = $this->put('/images/'.$image->id, [
            'name' => 'Test',
            'url'=> '',
       ]);

        $response->assertSessionHasErrors(['url']);
    }

    /** @test */
    public function an_image_can_be_eliminated_by_its_uploader()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'id'=>1
        ]);

        $this->actingAs($user);

        Image::factory()->create([
            'user_id' => 1
        ]);

        $image = Image::first();

        $response = $this->delete('/images/'.$image->id);

        $this->assertCount(0, Image::all());
 
        $response->assertRedirect('/images');
    }
}
