@extends('layouts.app')

@section('content')
    <h2 class="title">Task Details:</h1>

    <p>Associated project: {{ $task->project->name }}</p>
    <p>Name: {{ $task->name }}</p>
    <p>Priority #: {{ $task->priority }}</p>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
@endsection
