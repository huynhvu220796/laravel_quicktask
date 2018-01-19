<?php

use Illuminate\Database\Seeder;

class DatabaseTaskUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 10)->create()->each(function ($user){
        	$user->tasks()->save(factory(App\Models\Task::class)->make());
        });
    }
}
