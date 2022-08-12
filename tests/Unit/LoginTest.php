<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register_login_status()
    {
        $user= [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ];
        $useResponse = $this->post('/register', $user );


       $response = $this->post('/login', [
            'email' => $user['email'],
            'password' => $user['password'],
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

    }
}
