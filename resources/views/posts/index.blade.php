@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список всех постов') }}</div>

                    <div class="card-body">
                        @if ($posts->count() > 0)
                            <ul>
                                @foreach ($posts as $post)
                                    <li>
                                        <h3>{{ $post->title }}</h3>
                                        <p>{{ $post->content }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{ __('Нет доступных постов.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
