<?php
$url = URL::route('post', ['post_id' => $post->id]);
$isPost = Route::currentRouteName() == 'post';
?>
<div class="post">
    @if($isPost)
        <div class="page-header">
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="content">{{$post->body}}</div>
    @endif
    <div class="panel panel-default">
        @if(!$isPost)
            <div class="panel-heading">
                <strong>
                    <a href="{{ $url }}">{{ $post->title }}</a>
                </strong>
            </div>
            <div class="panel-body">
                {{ $post->body }}
            </div>
        @endif
        <div class="panel-footer">
            <a href="#">&commat;{{ $post->author->login }}</a>
            <div class="pull-right">
                @foreach($post->tags as $tag)
                    @include('tag', ['tag' => $tag])
                @endforeach
            </div>
        </div>
    </div>
</div>