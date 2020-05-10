<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfTasks = 10;
        factory(App\Task::class, $numberOfTasks)->create();
    }
}
