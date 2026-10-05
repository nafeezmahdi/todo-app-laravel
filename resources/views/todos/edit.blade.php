@extends('layouts.main')

@section('content')

<div class="create-page">

    <div class="create-card">

        <div class="create-header">

            <div class="task-icon">
                ✎
            </div>

            <div>
                <h1>Edit Task</h1>
                <p>Update the details of your task.</p>
            </div>

        </div>

        <form method="POST" action="{{ route('todos.update', $todo) }}">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="title">
                    Title <span>*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $todo->title) }}"
                    placeholder="Enter task title..."
                >

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description..."
                >{{ old('description', $todo->description) }}</textarea>

                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-actions">

                <a href="{{ route('home') }}" class="cancel-btn">
                    ← Cancel
                </a>

                <button type="submit" class="create-btn">
                    ✓ &nbsp; Update Task
                </button>

            </div>

        </form>

    </div>

</div>

@endsection