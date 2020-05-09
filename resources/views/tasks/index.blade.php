@extends('layouts.app')

@section('content')
    <div class="header mb-2">
        <h1>Tasks</h1>
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">New Task</a>
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
        <tbody class="list">
            @foreach($tasks as $task)
                <tr>
                    <th>{{ $task->getKey() }}</th>
                    <th>

                            {{ $task->name }}
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('projects.tasks.show', $task->project->getKey()) }}">
                            {{ $task->project->name }}
                        </a>
                    </th>
                    <th class="list__actions">
                        <a href="{{ route('tasks.show', $task) }}"
                            class="btn btn-info list__actions-item">
                            View
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}"
                            class="btn btn-warning list__actions-item">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                        class="list__actions-item">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
