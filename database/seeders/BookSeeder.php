<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();

        $items = [];

		$faker = Container::getInstance()->make(Generator::class);

        for ($i = 1; $i <= 557; $i++) {
        	$title = 'Книга ' . $i;
        	$items[] = [
        		'category_id' => mt_rand(1, 5),
				'author_id' => mt_rand(1, 110),
				'slug' => Str::slug($title, '-'),
				'title' => $title,
				'description' => $faker->paragraph(mt_rand(1, 6)),
				'rating' => mt_rand(0, 55),
				'cover' => 'https://via.placeholder.com/180x250',
				'created_at' => $date,
				'updated_at' => $date,
			];
		}

        DB::table('books')->insert($items);
    }
}
