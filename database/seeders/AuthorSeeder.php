<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
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

        for ($i = 1; $i <= 110; $i++) {
        	$items[] = [
        		'name' => 'Автор ' . $i,
				'created_at' => $date,
				'updated_at' => $date,
			];
		}

        DB::table('authors')->insert($items);
    }
}
