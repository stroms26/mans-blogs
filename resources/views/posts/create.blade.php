@extends('layout') 

@section('content')
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"> {{-- Handle image uploads --}}
        @csrf 

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required> 
            @error('title')
                <div class="error">{{ 
 $message }}</div>
            @enderror
        </div>

        <div>
            <label for="body">Body:</label>
            <textarea name="body" id="body" required>{{ old('body') }}</textarea>
            @error('body')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image"> 
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="publication_date">Publication Date:</label>
            <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date') }}" required>
            @error('publication_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>   

            @error('status')
                <div class="error">{{ 
 $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Post</button>
    </form>

@endsection