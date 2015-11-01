@extends('admin.auth_layout')

@section('content')
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
    @if(!isset($post))
        {{ \Illuminate\Support\Facades\Form::open(['class' => 'form-horizontal']) }}
    @else
        {{ \Illuminate\Support\Facades\Form::model($post, ['class' => 'form-horizontal']) }}
    @endif
        <div class="form-group">
            <div class="col-lg-2">
                {{ \Illuminate\Support\Facades\Form::label('title', 'Заголовок', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-10">
                {{ \Illuminate\Support\Facades\Form::text('title', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">
                {{ \Illuminate\Support\Facades\Form::label('body', 'Пост', ['class' => 'control-label']) }}
            </div>
            <div class="col-lg-10">
                {{ \Illuminate\Support\Facades\Form::textarea('body', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group text-right">
            <button type="reset" class="btn btn-danger">Сбросить изменения</button>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    {{ \Illuminate\Support\Facades\Form::close() }}
@endsection