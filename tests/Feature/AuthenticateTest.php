<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        $response = $this->post('auth', ['email' => 'test', 'password'=> 'test']);
        $response->assertRedirect('/');
        
    }
    
    public function testValidLogin()
    {
        $user = factory(User::class)->create();
        
        //attempt login
        $response = $this->post('auth', [
            'email'=> $user->email,
            'password' => 'password'
        ]);
        $response->assertRedirect('dashboard');
    }
}
