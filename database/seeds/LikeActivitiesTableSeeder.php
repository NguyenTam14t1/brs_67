<?php

use Illuminate\Database\Seeder;

class LikeActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\LikeActivity::class, 10)->create();
    }
}
