@extends('layouts.app')

@section('content')
    <div class="header mb-2">
        <h1>Tasks</h1>
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">Create Task</a>
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
                    </th>
                    <th scope="col">{{ $task->project->name }}</th>
                    <th class="list__actions">
                        <a href="{{ route('tasks.show', $task) }}"
                            class="btn btn-secondary list__actions-item">
                            View
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}"
                            class="btn btn-info list__actions-item">
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
