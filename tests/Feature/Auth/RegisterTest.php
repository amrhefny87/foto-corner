<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Image;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_new_user_can_be_registered ()
    {
        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => 'Test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertCount(1, User::all());

        $user = User::first();

        $this->assertEquals($user->name, 'Test');
        $this->assertEquals($user->email, 'Test@example.com');
        
        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    /** @test */
    public function a_user_can_not_be_register_without_name ()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'Test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function a_user_can_not_be_register_without_email ()
    {
        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function a_user_can_not_be_register_without_password ()
    {
        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => 'Test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function a_user_can_not_be_register_without_confirming_password ()
    {
        $response = $this->post('/register', [
            'name' => 'Test',
            'email' => 'Test@example.com',
            'password' => 'password',
            'password_confirmation' => 'wrong password',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
}
