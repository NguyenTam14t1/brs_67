<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use Mail;
use App\Events\UserRegistered;


class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function($user) {

            $token = $user->verificationToken()->create([
                'token' => bin2hex(random_bytes(64))
            ]);

            event(new UserRegistered($user));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}