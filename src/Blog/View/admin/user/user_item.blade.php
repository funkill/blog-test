<?php
$updateUrl = URL::route('admin_update_user', ['user' => $user->id]);
$deleteUrl = URL::route('admin_delete_user', ['user' => $user->id]);
?>
<tr>
    <td class="-login-">{{ $user->login }}</td>
    <td>{{ $user->created_at->format('d.m.Y') }}</td>
    <td class="text-right">
        <button class="btn btn-xs btn-warning -user-edit-" data-url="{{ $updateUrl }}">
            <span class="glyphicon glyphicon-pencil"></span>
        </button>
        <button class="btn btn-xs btn-danger -user-remove-" data-url="{{ $deleteUrl }}">
            <span class="glyphicon glyphicon-trash"></span>
        </button>
    </td>
</tr>