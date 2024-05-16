@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Comment</h2>
        <form action="{{ route('comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{ $comment->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection