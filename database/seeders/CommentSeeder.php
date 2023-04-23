<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();

		$faker = Container::getInstance()->make(Generator::class);

        $items = [];

        for ($i = 1; $i <= 557; $i++) {
        	for ($j = 0; $j <= mt_rand(1, 3); $j++) {
				$items[] = [
					'book_id' => $i,
					'user_id' => (mt_rand(1, 3) === 3) ? mt_rand(1, 10) : 0,
					'username' => $faker->name(),
					'comment' => $faker->paragraph(mt_rand(1, 2)),
					'created_at' => $date,
					'updated_at' => $date,
				];
			}
		}

        DB::table('comments')->insert($items);
    }
}
