<?php
$updateUrl = URL::route('admin_update_post', ['post' => $post->id]);
$deleteUrl = URL::route('admin_delete_post', ['post' => $post->id]);
?>
<tr>
    <td>
        <a href="{{ $updateUrl }}">{{ $post->title }}</a>
    </td>
    <td class="text-right">
        <a class="btn btn-xs btn-warning -post-edit-" href="{{ $updateUrl }}">
            <span class="glyphicon glyphicon-pencil"></span>
        </a>
        <!-- TODO: rename -post-remove- to -post-delete- -->
        <button class="btn btn-xs btn-danger -post-remove-" data-url="{{ $deleteUrl }}">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
    </td>
</tr>