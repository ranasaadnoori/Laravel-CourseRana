<!-- edit.blade.php -->
@extends('auth.layouts')

@section('content')
    <h1>Edit Comment</h1>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="body" id="body" class="form-control">{{ $comment->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection