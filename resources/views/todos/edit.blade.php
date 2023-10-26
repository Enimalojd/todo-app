@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo</div>

                <div class="card-body">
                    <h4>Изменить задачу</h4>

                    <form method="post" action="{{ route('todos.update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="mb-3">
                            <label class="form-label">Заголовок</label>
                            <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ваш текст</label>
                            <textarea name="description" class="form-control" cols="5" rows="5">{{ $todo->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Статус</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected>Выбрать статус</option>
                                <option value="1">Выполнено</option>
                                <option value="0">В процессе</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection