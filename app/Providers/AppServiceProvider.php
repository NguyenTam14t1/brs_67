<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Book;
use App\Models\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $categoryBooks = Book::with(['categories' => function($query) {
            $query->orderBy('id', 'desc')->take(config('setting.category.counter_book_category'));
        }])
            ->Paginate(config('setting.paginate'));

        $categories = Category::where('parent_id', config('setting.category.parent_id'))
            ->get();

        $allCategories = Category::where('parent_id', config('setting.category.parent_id'))->pluck('name', 'id');

        $newBooks = Book::orderBy('id', 'desc')
            ->take(config('setting.counter_book.new'))
            ->get();

        $topRatingBooks = Book::orderBy('average_rating', 'desc')
            ->take(config('setting.counter_book.top_rating'))
            ->get();

        $topCounterViewBooks = Book::orderBy('counter_view', 'desc')
            ->take(config('setting.counter_book.top_view'))
            ->get();
        
        View::share(compact('categories', 'categoryBooks', 'newBooks', 'topRatingBooks', 'topCounterViewBooks', 'allCategories', 'book'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
