@extends('admin.auth_layout')

@section('content')
    <div class="form-group text-right">
        <a href="{{ URL::route('admin_post_create_page') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>Написать пост
        </a>
    </div>
    @if (count($posts) < 1)
        Нет постов!
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
            @foreach($posts as $post)
                @include('admin.post.post_item', ['post' => $post])
            @endforeach
        </table>
        <div class="center">{{ $posts->links(); }}</div>
    @endif
@endsection