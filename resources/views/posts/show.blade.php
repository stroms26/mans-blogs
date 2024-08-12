@extends('layout')

@section('content')
    <style>
        .content {
            width: 50%;
            margin: 30px auto; /* 30px margin top and bottom, auto on sides */
            display: flex;
            gap: 20px;
        }

        .content img {
            max-width: 50%; /* Image takes up 50% of the content width */
            height: auto;
            object-fit: cover;
        }

        .content .details {
            flex: 1; /* Remaining space goes to details */
        }

        .content h1 {
            text-align: left;
            width: 100%;
        }

        /* Button Styling */
        .btn-custom {
            font-size: 15px;
            font-weight: 400;
            color: grey;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
        }

        .btn-custom:hover,
        .btn-custom:focus {
            text-decoration: underline;
            color: black;
        }

        .btn-custom:focus {
            outline: none;
        }



    </style>

    <div class="content">
        @if ($post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }} Image">
        @endif

        <div class="details">
            <h1>{{ $post->title }}</h1>

            <p>{{ $post->body }}</p>

            <p>Published on: {{ $post->publication_date->format('F j, Y') }}</p> 
            <p>Status: {{ $post->status ? 'Active' : 'Inactive' }}</p>

            <div style="margin-top: 20px;">
                <a href="{{ route('posts.edit', $post) }}" class="btn-custom">Edit Post</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()"> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-custom btn-custom-danger">Delete post</button>
                </form>

                <a href="{{ route('posts.index') }}" class="btn-custom">Back to Posts</a>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Do you want to delete this post?");
        }
    </script>
@endsection
