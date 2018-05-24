<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(PostSeeder::class);*/
        factory(App\User::class, 10)
            ->create()
            ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
                $u->posts()->save(factory(App\Post::class)->make());
                $u->posts()->save(factory(App\Post::class)->make());
                $u->posts()->save(factory(App\Post::class)->make());
                $u->posts()->save(factory(App\Post::class)->make());
            });

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
