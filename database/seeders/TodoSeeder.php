<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use Database\Factories\TodoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todo = Todo::factory(30)->create();
    }
}
