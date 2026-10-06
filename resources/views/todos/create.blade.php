@extends('layouts.main')

@section('content')

    <div class="create-page">

        <div class="create-card">

            <div class="create-header">

                <div class="task-icon">
                    +
                </div>

                <div>
                    <h1>Create New Task</h1>
                    <p>Add a new task to your todo list.</p>
                </div>

            </div>

            <form
                method="POST"
                action="{{ route('todos.store') }}"
            >

                @csrf

                <div class="form-group">

                    <label for="title">
                        Title <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter task title..."
                        autofocus
                        required
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
                        placeholder="Enter task description (optional)..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="error">{{ $message }}</p>
                    @enderror

                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('home') }}"
                        class="cancel-btn"
                    >
                        ← Cancel
                    </a>

                    <button
                        type="submit"
                        class="create-btn"
                    >
                        ✓ &nbsp; Create Task
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection