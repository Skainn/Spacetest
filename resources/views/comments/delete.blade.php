@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Delete Comment</h2>
        <p>Are you sure you want to delete this comment?</p>
        <form action="{{ route('comments.delete', ['post' => $post->id, 'comment' => $comment->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection