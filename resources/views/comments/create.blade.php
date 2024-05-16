@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Comment</h2>
        <form action="{{ route('comments.add', $post->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection