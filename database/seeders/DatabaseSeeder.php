<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Article::factory(20)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(40)->create();

        $user1 = User::create([
            'name' => "Swan Pyae Sone",
            'email' => "swan@gmail.com",
            'password' => Hash::make('123123123'),
        ]);
        $user2 = User::create([
            'name' => "Luwix",
            'email' => "luwix@gmail.com",
            'password' => Hash::make('123123123'),
        ]);

    }
}
