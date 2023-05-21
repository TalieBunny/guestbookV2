<?php

namespace Tests\Unit;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class RegisterUserTest extends TestCase
{

    use RefreshDatabase;


    public function test_registration_screen()
    {
        $response = $this->get('/register');
 
        $response->assertStatus(200);
    }
 
    public function test_new_users_registration()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

}
