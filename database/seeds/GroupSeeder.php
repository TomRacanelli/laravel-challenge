<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Group');
        for($i = 1 ; $i <= 50 ; $i++){
            DB::table('groups')->insert([
                'name' => $faker->unique()->text($maxNbChars = 16),
                'description' => $faker->text($maxNbChars = 255),
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
