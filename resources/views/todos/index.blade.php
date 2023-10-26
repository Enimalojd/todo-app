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

                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
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
                                <td>
                                    @if ($todo->is_completed == 1)
                                    <a class="btn btn-sm btn-success">Задача выполнена!</a>
                                    @else
                                    <a class="btn btn-sm btn-warning">Задача в процессе выполнения</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('todos.edit', $todo->id) }}">Изменить</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('todos.detail', $todo->id) }}">Подробнее</a>
                                    <form action="">
                                        <input type="hidden" name="todo_id" value=" {{ $todo->id }} ">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Удалить">
                                    </form>
                                </td>
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