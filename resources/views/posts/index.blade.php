@extends('auth.layouts')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>List of Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    @if ($posts->count())
        <ul class="list-group mb-3">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        </br>
        
            {{ $posts->links() }} 
    
    @else
        <p>No posts found.</p>
    @endif
@endsection