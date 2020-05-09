@extends('layouts.app')

@section('content')
    <div style="display:flex; justify-content: space-around;align-items:center;">
        <h1>Tasks</h1>
        <a class="btn btn-secondary" href="{{ route('tasks.create') }}">Create Task</a>
    </div>

    <table class="table">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Project</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th>{{ $task->getKey() }}</th>
                    <th>
                       <a href="{{ route('tasks.show', $task->getKey()) }}">
                            {{ $task->name }}
                        </a>
                    </th>
                    <th scope="col">{{ $task->project->name }}</th>
                    <th>
                        <a href="{{ route('tasks.edit', $task->getKey()) }}">
                            Edit
                        </a>
                        <a href="{{ route('tasks.destroy', $task->getKey()) }}">
                            Delete
                        </a>
                    </th>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
