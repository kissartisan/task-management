@extends('layouts.app')

@section('content')
    <h1 class="title">Create a Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="project_id">Project</label>
            <select name="project_id"
                class="form-control @error('name') is-invalid @enderror"
                required>
                <option value="">Choose One</option>
                @foreach($projects as $key => $name)
                    <option value="{{ $key }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('project_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
@endsection
