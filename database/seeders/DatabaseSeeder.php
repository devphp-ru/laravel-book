<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
		$this->call(CategorySeeder::class);
		$this->call(AuthorSeeder::class);
		$this->call(BookSeeder::class);
		$this->call(CommentSeeder::class);
		$this->call(EmployeeSeeder::class);
    }
}
