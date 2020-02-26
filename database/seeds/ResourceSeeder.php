<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            $faker = Faker::create('App\Resource');
            for($i = 1 ; $i <= 50 ; $i++){
                DB::table('resources')->insert([
                    'group_id' => random_int(\DB::table('groups')->min('id'), \DB::table('groups')->max('id')),
                    'name' => $faker->unique()->text($maxNbChars = 16),
                    'description' => $faker->text($maxNbChars = 255),
                    'created_at' => \Carbon\Carbon::now(),
                    'Updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        }
        catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
