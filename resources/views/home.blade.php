@extends('layouts.main')

@section('content')

    <div class="home-page">

        <h1>My Todo List</h1>

        <p class="home-description">
            Welcome, {{ Auth::user()->name }}.
        </p>

        <div class="todo-list">

            @forelse ($todos as $todo)

                <div class="todo-item">

                    <div>
                        <h3>{{ $todo->title }}</h3>

                        @if ($todo->description)
                            <p>{{ $todo->description }}</p>
                        @endif
                    </div>

                    @if ($todo->completed)
                        <span class="todo-status completed">
                            Completed
                        </span>
                    @else
                        <span class="todo-status pending">
                            Pending
                        </span>
                    @endif

                </div>

            @empty

                <p>No todos found.</p>

            @endforelse

        </div>

    </div>

@endsection