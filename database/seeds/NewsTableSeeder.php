<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
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
            $title = $faker->unique()->sentence($nbWords = 10);
            DB::table('news')->insert([
                'category_id' => $faker->numberBetween(0, 20),
                'title' => $title,
                'alias' => $title,
                'intro' => $faker->paragraph($nbSentences = 2),
                'content' => $faker->paragraph($nbSentences = 300),
                'keywords' => $faker->paragraph($nbSentences = 2),
                'strAttr' => $faker->paragraph($nbSentences = 1),
                'intAttr' => $faker->randomDigitNotNull,
                'created_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
