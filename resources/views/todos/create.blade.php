@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo</div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('todos.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Заголовок</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ваш текст</label>
                            <textarea name="description" class="form-control" cols="5" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Выполнить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection