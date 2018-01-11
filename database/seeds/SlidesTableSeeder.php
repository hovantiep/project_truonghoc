<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;
        $faker = Faker\Factory::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('slides')->insert([
                'name' => $faker->unique()->sentence($nbWords = 2),
                'strAttr' => $faker->paragraph($nbSentences = 1),
                'intAttr' => $faker->randomDigitNotNull,
                'created_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
