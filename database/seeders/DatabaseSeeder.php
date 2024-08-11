<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Consultant::class, 20)->create();
        // \App\Models\User::factory(10)->create();
        \App\Models\Consultant::factory(10)->create();
    }
}
