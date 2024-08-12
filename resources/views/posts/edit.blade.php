@extends('layout')

@section('content')
    <h1 style="text-align: center;">Edit Post</h1>

    <div style="width: 70%; margin: 0 auto;"> <!-- Center and limit width -->
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH') 

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="title" style="display: block;">Title</label> <!-- Label displayed as a block element -->
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="body" style="display: block;">Body</label> <!-- Label displayed as a block element -->
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="image" style="display: block;">Image</label>
                @if ($post->image_path)
                    <!-- Corrected format for displaying the image -->
                    <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }} Image" style="width: 100%; height: auto; object-fit: contain;">
                @endif
                <input type="file" name="image" id="image" class="form-control-file">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="publication_date" style="display: block;">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control" value="{{ old('publication_date', $post->publication_date->format('Y-m-d')) }}" required>
                @error('publication_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="status" style="display: block;">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') 
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
    </div>
@endsection
