<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    /**
     * Display tasks per project.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project->load('tasks');

        return view('projects.tasks.show', compact('project'));
    }
}
