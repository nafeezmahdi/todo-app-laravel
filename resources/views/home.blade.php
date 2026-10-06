@extends('layouts.main')

@section('content')

    <div class="home-page">

        <div class="dashboard-header">

            <div class="dashboard-title">

                <h1>My Todo List</h1>

                <p>
                    Welcome back,
                    <strong>{{ auth()->user()->name }}</strong>.
                    Here are your current tasks.
                </p>

            </div>

            <a
                href="{{ route('todos.create') }}"
                class="new-task-button"
            >
                <span>+</span>
                New Task
            </a>

        </div>

        <div class="todo-list">

            @forelse ($todos as $todo)

                <div class="todo-item">

                    <div class="todo-content">

                        <h3>{{ $todo->title }}</h3>

                        @if ($todo->description)
                            <p>{{ $todo->description }}</p>
                        @endif

                    </div>

                    <div class="todo-actions">

                        <form
                            action="{{ route('todos.toggle', $todo->id) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="todo-checkbox"
                            >
                                @if ($todo->completed)
                                    ✓ Completed
                                @else
                                    ○ Pending
                                @endif
                            </button>

                        </form>

                        <a
                            href="{{ route('todos.edit', $todo) }}"
                            class="edit-btn"
                        >
                            Edit
                        </a>

                        <form
                            method="POST"
                            action="{{ route('todos.destroy', $todo) }}"
                            class="delete-form"
                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        ✓
                    </div>

                    <h2>No todos found</h2>

                    <p>
                        You don't have any tasks yet.
                        Create your first task to get started.
                    </p>

                    <a
                        href="{{ route('todos.create') }}"
                        class="new-task-button"
                    >
                        <span>+</span>
                        Create Your First Task
                    </a>

                </div>

            @endforelse

        </div>

    </div>

@endsection