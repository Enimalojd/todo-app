@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo</div>

                <div class="card-body">
                    <h4>Изменить задачу</h4>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Заголовок</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ваш текст</label>
                            <textarea name="description" class="form-control" cols="5" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection