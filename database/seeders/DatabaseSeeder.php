<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,

        ]);
        
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
