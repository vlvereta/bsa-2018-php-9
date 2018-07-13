<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        echo "{$provider} here!";
    }

    public function handleProviderCallback($provider)
    {
//
    }
}
