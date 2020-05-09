@extends('layouts.app')

@section('content')
    <div style="display:flex; justify-content: space-around;align-items:center;">
        <h1>Tasks</h1>
        <a href="{{ route('tasks.create') }}">Create Task</a>
    </div>

    <ul>
    @foreach($tasks as $task)
        <li>
            <a href="{{ route('tasks.show', $task->getKey()) }}">
                {{ $task->name }}
            </a>
        </li>
    @endforeach
    </ul>
@endsection
