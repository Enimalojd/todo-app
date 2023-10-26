@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo</div>
                <div class="card-body">
                    @if (Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif

                    @if(count($todos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Задача</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Состояние</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                            <tr>
                                <td> {{ $todo->title }} </td>
                                <td> {{ $todo->description }} </td>
                                <td> {{ $todo->is_complete }} </td>
                                <td> {{ $todo->action }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h4>Нет активных задач</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection