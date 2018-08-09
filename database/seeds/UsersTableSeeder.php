<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 1)->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'verified' => true,
        ]);
        factory(App\Models\User::class, 10)->create();
    }
}
