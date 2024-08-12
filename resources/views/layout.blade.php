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

        nav ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }


        footer {
            text-align: center; /* Center align the text */

        }
    </style>
</head>
<body>
    <header>
        <h1>blog of Harald</h1>
        <nav>
            <ul>
                <li><a href="{{ route('posts.index') }}">Home</a></li>
                <li><a href="{{ route('posts.create') }}">Create Post</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @if(session('success')) 
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content') 
    </main>

    <footer>
        <p>&copy; 2024 blog of Harald</p>
    </footer>
</body>
</html>
