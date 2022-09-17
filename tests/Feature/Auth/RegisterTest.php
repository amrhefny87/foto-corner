<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/register', [
            'name' => 'Andrea',
            'email' => 'andrea@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $user = User::first();
        dd($user);
        // $this->assertAuthenticated();
        // $response->assertRedirect('/home');
    }
}
