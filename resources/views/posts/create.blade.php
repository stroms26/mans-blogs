@extends('layout')

@section('content')
    <h1 style="text-align: center;">Create New Post</h1>

    <div style="width: 70%; margin: 0 auto;">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="title" style="display: block;">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="body" style="display: block;">Body</label>
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="publication_date">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control" value="{{ old('publication_date') }}" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
