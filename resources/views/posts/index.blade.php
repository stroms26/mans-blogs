@extends('layout') {{-- Extend your main layout --}}

@section('content')
    <h1>All Blog Posts</h1>

    @if ($posts->count()) {{-- Check if there are any posts --}}
        @foreach ($posts as $post) 
            <article>
                <h2>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h2>
                <p>{{ $post->excerpt }}</p> {{-- Assuming you have an excerpt method in your Post model --}}
            </article>
        @endforeach
    @else
        <p>No posts found.</p>
    @endif

@endsection