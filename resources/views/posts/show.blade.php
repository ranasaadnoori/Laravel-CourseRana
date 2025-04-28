@extends('auth.layouts')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>{{ $post->title }}</h1>
    <hr/>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Index Page</a>
    
    
    </div>
    <div>
        <p>{{ $post->content }}</p>  
    </div>

    <hr>
    <h4>Comments</h4> 
    @if ($post->count())
        <ul class="list-group mb-3">
            @foreach ($post->comments as $comment)
            <div>
                <li class="list-group-item">{{ $comment->body }}</li>
                <div class="btn-group" role="group">
                    <a href="{{ route('comments.edit',  $comment->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div> 
            </div>
            
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif

    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="body">Add Comment:</label>
            <textarea name="body" id="body" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
    </form>
@endsection