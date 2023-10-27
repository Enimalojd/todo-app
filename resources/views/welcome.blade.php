@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ToDo list') }}</div>

                <div class="card-body">
                    @if (Auth::check())
                    <p>Добро пожаловать, {{ Auth::user()->name }}!</p>
                    <br>
                    <a class="btn btn-secondary" href=" {{ route('todos.index') }}">К списку задач</a>
                    @else
                    <p>Пожалуйста, войдите в свой аккаунт или зарегистрируйтесь</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection