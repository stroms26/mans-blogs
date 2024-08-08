<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog   
 - @yield('title')</title> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
</head>
<body>
    <header>
        <h1>My Blog</h1>
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
        <p>&copy; 2024 life of harald</p>
    </footer>
</body>
</html>