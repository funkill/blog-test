@extends('admin.main_layout')

<?php
$pages = [
        ['route' => 'admin_users', 'title' => 'Авторы'],
        ['route' => 'admin_posts', 'title' => 'Посты'],
        ['route' => 'admin_tags', 'title' => 'Теги'],
];
?>

@section('navigation')
    <ul class="nav nav-tabs">
        @foreach($pages as $page)
            <li class="{{ Route::currentRouteName() == $page['route'] ? 'active' :'' }}">
                <a href="{{ URL::route($page['route']) }}">{{ $page['title'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection