@extends('layouts.app')

@section('content')
    <h1>List of Comments</h1>
    @if(count($comments) > 0)
        <ul class="list-group">
            @foreach($comments as $comment)
                <li class="list-group-item">
                    <a href="/comments/{{$comment->id}}">{{$comment->body}}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments found</p>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
