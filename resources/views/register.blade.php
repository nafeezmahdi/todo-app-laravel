@extends('layouts.main')

@section('content')

    <div class="auth-page">

        <div class="auth-card">

            <div class="auth-icon">
                ✓
            </div>

            <h1>Create Account</h1>

            <p class="auth-subtitle">
                Create your account and start managing your tasks.
            </p>


            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="error">

                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach

                </div>
            @endif


            <form
                method="POST"
                action="{{ route('register.store') }}"
            >

                @csrf


                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        autocomplete="name"
                        required
                        autofocus
                    >

                </div>


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
                        autocomplete="email"
                        required
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
                        placeholder="Minimum 8 characters"
                        autocomplete="new-password"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="auth-button"
                >
                    Create Account
                </button>

            </form>


            <div class="auth-footer">

                Already have an account?

                <a href="{{ route('login') }}">
                    Sign In
                </a>

            </div>

        </div>

    </div>

@endsection