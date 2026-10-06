@extends('layouts.main')

@section('content')

<div class="login-page">

    <div class="login-card">

        <div class="login-icon">
            ✓
        </div>

        <h1>Welcome Back</h1>

        <p class="login-subtitle">
            Sign in to manage your tasks.
        </p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    autofocus
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                >

            </div>

            <button type="submit" class="login-button">
                Sign In
            </button>

        </form>

    </div>

</div>

@endsection