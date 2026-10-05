@extends('layouts.main')

@section('content')

    <div class="home-page">

        <h1>
            My Todo List

            <a href="{{ route('todos.create') }}" class="home-button">
                + New Task
            </a>
        </h1>

        <p class="home-description">
            Welcome, {{ auth()->user()->name }}.
        </p>

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

                        {{-- Complete / Pending --}}
                        <form
                            action="{{ route('todos.toggle', $todo->id) }}"
                            method="POST"
                        >
                            @csrf

                            <button type="submit" class="todo-checkbox">
                                @if ($todo->completed)
                                    ✓ Completed
                                @else
                                    ○ Pending
                                @endif
                            </button>

                        </form>

                        {{-- Edit --}}
                        <a
                            href="{{ route('todos.edit', $todo) }}"
                            class="edit-btn"
                        >
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form
                            method="POST"
                            action="{{ route('todos.destroy', $todo) }}"
                            class="delete-form"
                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete-btn">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <p>No todos found.</p>

            @endforelse

        </div>

    </div>

@endsection