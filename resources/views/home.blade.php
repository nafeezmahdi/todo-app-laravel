@extends('layouts.main')

@section('content')

    <div class="home-page">

        <h1>My Todo List</h1>

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

                    <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="todo-checkbox">
                            @if ($todo->completed)
                                ✓ Completed
                            @else
                                ○ Pending
                            @endif
                        </button>

                    </form>

                </div>

            @empty

                <p>No todos found.</p>

            @endforelse

        </div>

    </div>

@endsection