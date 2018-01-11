<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
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
        for ($i=0; $i<$limit;$i++) {
            DB::table('comments')->insert([
                'user_id' => 1,
                'news_id' => $faker->numberBetween(0,10),
                'content' => $faker->paragraph($nbSentences = 2),
                'strAttr' => $faker->paragraph($nbSentences = 1),
                'intAttr' => $faker->randomDigitNotNull,
                'created_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
