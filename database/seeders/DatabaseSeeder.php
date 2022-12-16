<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory(30)->create()->each(function ($user){
            \App\Models\Article::factory(rand(0,10))
                ->create(['user_id' => $user->id])
                ->each(function ($article){
                    \App\Models\Comment::factory(rand(0,4))
                        ->create([
                            'article_id' => $article->id,
                            'user_id' => User::all()->random()->id,
                            ]);
            });
        });
    }
}
