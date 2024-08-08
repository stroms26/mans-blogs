@extends('layout')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 
 

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', 
 $post->title) }}" required> 
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="body">Body:</label>
            <textarea name="body" id="body" required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">Image:</label>
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }} Image" width="200"> 
            @endif
            <input type="file" name="image" id="image"> 
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="publication_date">Publication Date:</label>
            <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', $post->publication_date->format('Y-m-d')) }}" required>
            @error('publication_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') 

                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Update Post</button>
    </form>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>

@endsection