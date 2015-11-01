<?php
$updateUrl = URL::route('admin_update_tag', ['tag' => $tag->id]);
$deleteUrl = URL::route('admin_delete_tag', ['tag' => $tag->id]);
?>
<tr>
    <td class="-name-">{{ $tag->name }}</td>
    <td class="text-right">
        <button class="btn btn-xs btn-warning -tag-edit-" data-url="{{ $updateUrl }}">
            <span class="glyphicon glyphicon-pencil"></span>
        </button>
        <button class="btn btn-xs btn-danger -tag-remove-" data-url="{{ $deleteUrl }}">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
    </td>
</tr>