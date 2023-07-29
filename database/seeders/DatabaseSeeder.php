<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Salman saad',
            'email' => 'devsalmansaad@gmail.com',
            'student_id' => '011211115'
        ]);

        Listing::factory(9)->create([
            'user_id' => $user->id
        ]);
    }
}
