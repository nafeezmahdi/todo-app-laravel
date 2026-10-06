<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>MyTodo</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

</head>

<body>

    {{-- =====================================================
         Header
         ===================================================== --}}

    <header class="site-header">

        <div class="header-container">

            <a
                href="{{ route('home') }}"
                class="logo"
                aria-label="MyTodo Home"
            >
                <span class="logo-icon">✓</span>
                <span>MyTodo</span>
            </a>

            @auth

                <nav class="main-nav">

                    <a
                        href="{{ route('home') }}"
                        class="nav-link"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('todos.create') }}"
                        class="nav-button"
                    >
                        + New Task
                    </a>

                    <div class="user-menu">

                        <div
                            class="user-avatar"
                            aria-hidden="true"
                        >
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <span class="user-name">
                            {{ auth()->user()->name }}
                        </span>

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="header-logout"
                            >
                                Logout
                            </button>

                        </form>

                    </div>

                </nav>

            @else

                <nav class="main-nav">

                    <a
                        href="{{ route('login') }}"
                        class="nav-link"
                    >
                        Sign In
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="nav-button"
                    >
                        Create Account
                    </a>

                </nav>

            @endauth

        </div>

    </header>


    {{-- =====================================================
         Main Content
         ===================================================== --}}

    <main class="main-content">

        @yield('content')

    </main>


    {{-- =====================================================
         Footer
         ===================================================== --}}

    <footer class="site-footer">

        <div class="footer-container">

            <div class="footer-brand">

                <a
                    href="{{ route('home') }}"
                    class="footer-logo"
                    aria-label="MyTodo Home"
                >
                    <span class="logo-icon">✓</span>
                    <span>MyTodo</span>
                </a>

                <p>
                    Simple task management for your everyday life.
                </p>

            </div>

            <div class="footer-links">

                <a href="{{ route('home') }}">
                    Home
                </a>

                @auth

                    <a href="{{ route('todos.create') }}">
                        New Task
                    </a>

                @else

                    <a href="{{ route('login') }}">
                        Sign In
                    </a>

                    <a href="{{ route('register') }}">
                        Register
                    </a>

                @endauth

            </div>

        </div>


        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} MyTodo. All rights reserved by
                <a
                    href="https://github.com/nafeezmahdi"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    NM
                </a>.
            </p>

        </div>

    </footer>

</body>

</html>