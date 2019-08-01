<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        factory(App\Tasks::class, 10)->create()->each(function ($p) {
            $p->save();
        });
    }
}
