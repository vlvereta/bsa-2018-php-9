<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    /**
     * Redirect user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect(route('index'));
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     *
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     *
     * @return  User
     */
    public function findOrCreateUser($user)
    {
        $authUser = User::where('email', $user->getEmail())->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'      => $user->getName(),
            'email'     => $user->getEmail(),
            'password'  => null,
        ]);
    }
}
