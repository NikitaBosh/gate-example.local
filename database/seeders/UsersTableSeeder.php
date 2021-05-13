<?php

namespace Database\Seeders;
use App\Models\User;
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
            User::factory()
            ->count(1)
            ->admin()
            ->create();

            User::factory()
            ->count(1)
            ->user()
            ->create();

            User::factory()
            ->count(10)
            ->create();

    }
}
