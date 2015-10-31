@extends('main_layout')

@section('content')
    @include('post_item', ['post' => $post])
@endsection

