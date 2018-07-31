<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BookmarksTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
        $this->call(LikeActivitiesTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
