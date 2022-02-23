<?php
namespace App\ETicket;

use App\User;

class AuthenticateUser
{

    public function auth($user_data)
    {
        $auth = User::where($user_data)->get();
        return $auth->isEmpty();
    }
}

