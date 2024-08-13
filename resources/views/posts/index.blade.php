@extends('layout')

@section('content')
    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
        <h1 style="text-align: center;">Blog posts</h1>
    </div>

    @auth
        <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 20px;">
            <h4>
                <a href="{{ route('posts.index', ['filter' => 'all']) }}" class="{{ $filter === 'all' ? 'active underline' : '' }}">All Posts</a>
            </h4>
            <h4>
                <a href="{{ route('posts.index', ['filter' => 'active']) }}" class="{{ $filter === 'active' ? 'active underline' : '' }}">Active Posts</a>
            </h4>
            <h4>
                <a href="{{ route('posts.index', ['filter' => 'inactive']) }}" class="{{ $filter === 'inactive' ? 'active underline' : '' }}">Inactive Posts</a>
            </h4>
        </div>
    @endauth

    @if ($posts->count())
        <div class="posts-grid"> 
            @foreach ($posts as $post) 
                @if (auth()->check() || $post->status === 1)
                    <article style="padding: 10px 0; display: flex; flex-direction: column; align-items: center; justify-content: center;"> 
                        @if ($post->image_path)
                            <a href="{{ route('posts.show', $post) }}">
                                <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }} Image" style="width: 100%; height: auto; object-fit: contain;">
                            </a>
                        @endif
                        <h2 style="text-align: start;">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <p style="text-align: start;">{{ $post->publication_date->format('F j, Y') }}</p>
                    </article>
                @endif
            @endforeach
        </div> 
    @else
        <p style="text-align: center; display: flex; justify-content: center;">No posts found.</p>
    @endif
@endsection
