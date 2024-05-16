@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Добро пожаловать в вашу панель управления!') }}</p>
                    <p>{{ __('Вы вошли в систему!') }}</p>
                    <a href="{{ route('logout') }}" class="btn btn-primary"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <ul class="list-group mt-3">
                        <li class="list-group-item"><a href="{{ route('posts.index') }}">Список постов</a></li>
                        <li class="list-group-item"><a href="{{ route('posts.create') }}">Создать пост</a></li>
                        <!-- Добавьте ссылки на другие страницы, если необходимо -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
