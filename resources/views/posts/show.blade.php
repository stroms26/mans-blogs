@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>

        @if ($post->image_path) 
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }} Image"> 
        @endif

        <p>{{ $post->body }}</p>

        <p>Published on: {{ $post->publication_date->format('F j, Y') }}</p> 
        <p>Status: {{ $post->status ? 'Active' : 'Inactive' }}</p>
    </article>

    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Post</a> {{-- Add Edit link --}}

    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;"> 
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete   
 Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts</a> 
@endsection