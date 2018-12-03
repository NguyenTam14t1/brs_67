<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\RequestBook\RequestBookInterface;
use App\Repositories\RequestBook\RequestBookRepository;
use App\Repositories\Book\BookInterface;
use App\Repositories\Book\BookRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserInterface::class, UserRepository::class);
        App::bind(BookInterface::class, BookRepository::class);
        App::bind(RequestBookInterface::class, RequestBookRepository::class);
        
    }
}
