<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Database\Factories\ProfileFactory;
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
        $u = User::factory()->create([
            'email'=>'test@test.com',
            'password'=>Hash::make('gfhjkm')
            ]);
        $u->profile()->save(Profile::factory()->make());

        User::factory(50)->create()->each(function($u){
            $u->profile()->save(Profile::factory()->make());
        });
    }
}
