@extends('layout')

@section('content')
    <h1 class="title">Create a Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="field">
            <label for="name" class="label">Name</label>

            <div class="control">
                <input required type="text" class="input @error('name') is-danger @enderror"
                    name="name" placeholder="Create web application" value="{{ old('name') }}">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create</button>
            </div>
        </div>

        @include('errors')
    </form>

@endsection
