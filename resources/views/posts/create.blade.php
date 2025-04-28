@extends('auth.layouts')

@section('content')
    <h1>Create a New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>
@endsection