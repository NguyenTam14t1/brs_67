<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthController extends Controller
{
    /**
     * [redirect user to OAuth Provider]
     * @return Response           
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
        // try {
        //     $socialite = Socialite::driver($provider)->redirect();
        // } catch (InvalidStateException $e) {
        //     $socialite = Socialite::driver($provider)->stateless()->redirect();
        // }dd($socialite);
    }  

    /**
     * Get Info from Provider, check user if exist in DB will login, else create user in DB
     */

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        dd($user);
        
        try {
            $user = Socialite::driver($provider)->user();
        } catch (InvalidStateException $e) {
            $user = Socialite::driver($provider)->stateless()->user();
        }
        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser) {
            Auth::login($authUser, true);
        }

        return redirect()->route('book.index');
    }

    /**
     * findOrCreateUser.
     *
     * @return void
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
