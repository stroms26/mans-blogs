<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog of Harald - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Style for the header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        /* Style for the navigation menu */
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a,
        nav ul li form button {
            text-decoration: none;
            color: black;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
        }

        nav ul li a:hover,
        nav ul li form button:hover {
            text-decoration: underline;
        }


        nav ul li form button {
    /* Inherit link styles */
    text-decoration: none;
    color: black;
    font-weight: bold;
    background: none;
    border: none;
    cursor: pointer;

    /* Additional styling to match links */
    padding: 0; /* Remove default padding */
    font-size: inherit; /* Inherit font size from parent */
}

    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    @auth
                        <li><a href="{{ route('posts.create') }}">Create Post</a></li>
                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>
        </header>

        <main style="min-height: 50px;">
        <main>
            @yield('content')
        </main>

        <footer style="position: fixed; bottom: 0; width: 100%; margin-bottom: 10px; text-align: center; ">
        <footer>
            &copy; {{ date('Y') }} blog of Harald. All rights reserved.
        </footer>
    </div>
</body>
</html>
