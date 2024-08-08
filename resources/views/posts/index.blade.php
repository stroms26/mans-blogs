@extends('layout')

@section('content')
    <h1>All Blog Posts</h1>

    @if ($posts->count())
        @foreach ($posts as $post) 
            <article>
                <h2>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h2>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    @else
        <p>No posts found.</p>
    @endif

@endsection