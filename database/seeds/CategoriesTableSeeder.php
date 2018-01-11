<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 20;
        $faker = Faker\Factory::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->unique()->sentence($nbWords = 2),
                'alias' => $faker->sentence($nbWords = 2),
                'parent_id' => 0,
                'keywords' => $faker->paragraph($nbSentences = 2),
                'description' => $faker->paragraph($nbSentences = 2),
                'strAttr' => $faker->paragraph($nbSentences = 1),
                'intAttr' => $faker->randomDigitNotNull,
                'created_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
