<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_page_can_be_retreived ()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_login ()  
    {
        $user = User::factory()->create();

        $response = $this->post('/login', 
        [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/images');
    }

    /** @test */
    public function user_can_not_login_with_incorrect_email ()
    {
        $user = User::factory()->create();

        $this->post('/login',
        [
            'email' => 'email',
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    /** @test */
    public function user_can_not_login_with_incorrect_password ()
    {
        $user = User::factory()->create();

        $this->post('/login',
        [
            'email' => $user->email,
            'password' => 'password wrong',
        ]);

        $this->assertGuest();
    }
}
