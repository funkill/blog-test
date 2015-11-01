@extends('admin.auth_layout')

@section('content')
    <div class="col-lg-8">
        @if (count($users) < 1)
            Нет пользователей!
        @else
            <table class="table table-striped table-hover">
                <colgroup>
                    <col class="col-lg-7">
                    <col class="col-lg-3">
                    <col class="col-lg-2">
                </colgroup>
                <tr>
                    <th>Логин</th>
                    <th>Дата создания</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                    @include('admin.user.user_item', ['user' => $user])
                @endforeach
            </table>
            <div class="center">{{ $users->links(); }}</div>
        @endif
    </div>
    <div class="col-lg-4">
        {{ \Illuminate\Support\Facades\Form::open(['id' => 'userEditForm', 'route' => 'admin_create_user']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                Добавление/редактирование пользователя
            </div>
            <div class="panel-body">
                @if($errors->count() > 0)
                    <div class="-form-errors-">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input class="form-control" name="login" id="login" />
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input class="form-control" name="password" id="password" type="password" />
                </div>
            </div>
            <div class="panel-footer text-right">
                <button type="reset" class="btn btn-danger">Отменить</button>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
        {{ \Illuminate\Support\Facades\Form::close() }}
    </div>
@endsection