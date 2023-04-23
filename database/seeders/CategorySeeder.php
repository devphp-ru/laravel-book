<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();

        $categories = [
        	'Научная фантастика',
        	'Фэнтези',
        	'Романы',
        	'Историческое',
        	'Детективы',
		];

        $items = [];

        foreach ($categories as $value) {
        	$items[] = [
        		'slug' => Str::slug($value, '-'),
				'title' => $value,
				'created_at' => $date,
				'updated_at' => $date,
			];
		}

    	DB::table('categories')->insert($items);
    }
}
