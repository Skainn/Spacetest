@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Создать новый пост') }}</div>

                    <div class="card-body">
                        <!-- Форма для создания нового поста -->
                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Заголовок') }}</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Содержание') }}</label>
                                <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Создать пост') }}</button>
                        </form>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
