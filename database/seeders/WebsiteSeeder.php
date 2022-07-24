<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Website::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'url'   => $faker->slug(4),
                'author' => $faker->name,
            ]);
        }
    }
}
