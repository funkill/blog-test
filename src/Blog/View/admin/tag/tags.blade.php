@extends('admin.auth_layout')

@section('content')
    <div class="col-lg-8">
        @if (count($tags) < 1)
            Нет тегов!
        @else
            <table class="table table-striped table-hover">
                <colgroup>
                    <col class="col-lg-10">
                    <col class="col-lg-2">
                </colgroup>
                <tr>
                    <th>Имя</th>
                    <th></th>
                </tr>
                @foreach($tags as $tag)
                    @include('admin.tag.tag_item', ['tag' => $tag])
                @endforeach
            </table>
            <div class="center">{{ $tags->links(); }}</div>
        @endif
    </div>
    <div class="col-lg-4">
        {{ \Illuminate\Support\Facades\Form::open(['id' => 'tagEditForm', 'route' => 'admin_create_tag']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                Добавление/редактирование тега
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">Тег</label>
                    <input class="form-control" name="name" id="name" />
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