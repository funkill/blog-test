@extends('admin.main_layout')

@section('content')
    <div class="auth-form">
        {{ Form::open(['route' => 'login']) }}
        {{ Form::token() }}
        <div class="panel panel-default">
            <div class="panel-heading">Авторизация</div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Запомнить меня</label>
                </div>
            </div>
            <div class="panel-footer text-right">
                <button type="submit" class="btn btn-default">Войти</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection