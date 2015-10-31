@extends('main_layout')

@section('content')
    @if (count($posts) < 1)
        Нет записей!
    @else
        @foreach($posts as $post)
            @include('post_item', ['post' => $post])
        @endforeach
        <div class="center">{{ $posts->links(); }}</div>
    @endif
@endsection