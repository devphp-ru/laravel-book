<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();

        $items = [
        	'name' => 'Иван Админ',
			'email' => 'admin@domain.com',
			'password' => Hash::make('12345j'),
			'remember_token' => Str::random(10),
			'created_at' => $date,
			'updated_at' => $date,
		];

        DB::table('employees')->insert($items);
    }
}
