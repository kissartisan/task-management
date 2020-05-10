<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class UpdateTaskPriorities extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tasks = Task::get();
        $prioritizedTasks = collect($request->tasks);

        /** Working solution #1: Update all task priorities whether it was changed or not */
        // foreach ($tasks as $task) {
        //     foreach ($prioritizedTasks as $prioritizedTask) {
        //         if ($prioritizedTask['id'] !== $task->id) continue;

        //         $task->update(['priority' => $prioritizedTask['priority']]);
        //     }
        // }

        /** Working solution #2: Find existing task, check if priority is changed then ONLY update if it is */
        $prioritizedTasks->each(function($prioritizedTask) {
            $task = Task::findOrFail($prioritizedTask['id']);

            if($task->priority === $prioritizedTask['priority']) return;

            $task->update(['priority' => $prioritizedTask['priority']]);
        });


        return response([
            'message' => 'Tasks re-prioritized.',
            'status' => '200'
        ]);
    }
}
