<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
        ]);


        $todos = Todo::factory(10)->create([
            'user_id' => 2,
        ]);

        foreach ($todos as $todo) {
            Comment::factory(4)->create([
                'todo_id' => $todo->id,
                'user_id' => $todo->user_id,
            ]);
        };






        $users = User::factory(20)->create();

        foreach ($users as $user) {
            Todo::factory(10)->create([
                'user_id' => $user->id,
            ]);
        }

        $this->call(TodoSeeder::class);
    }
}
