@extends('layouts.app')

@section('content')
    <h2 class="title">Project: {{ $project->name }}</h2>
    <hr>

    <h4>Associated Tasks:</h4>

    <ul>
        @foreach($project->tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task) }}">
                    {{ $task->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
@endsection
