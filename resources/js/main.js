/**
 * Created by funkill on 02.11.15.
 */
'use strict';
/**
 * todo: rename all -*-remove to -*-delete-
 */
$(document).ready(function(){
    var $userEditForm = $('#userEditForm'),
        $userLogin = $userEditForm.find('#login'),
        $userPassword = $userEditForm.find('#password'),

        $tagEditForm = $('#tagEditForm'),
        $tagName = $tagEditForm.find('#name')
    ;

    $('.-user-edit-').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            $row = $this.closest('tr'),
            $login = $row.find('.-login-'),
            $passwordPlaceholder = ''
        ;

        $userLogin.val($login.text());
        $userPassword.val($passwordPlaceholder);
        $userEditForm.attr('action', $this.data('url'));
    });

    $('.-user-remove-').click(function (e) {
        e.preventDefault();
        if (!confirm('Вы действительно хотите удалить данного пользователя?')) {
            return false;
        }

        var $this = $(this),
            $row = $this.closest('tr')
        ;

        $.ajax({
            method: 'POST',
            url: $this.data('url'),
            data: {},
            success: function (result) {
                if (result.hasOwnProperty('result') && result.result == 'success') {
                    $row.remove();
                }
            }
        });
    });

    $('.-tag-edit-').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            $row = $this.closest('tr'),
            $name = $row.find('.-name-')
        ;

        $tagName.val($name.text());

        $tagEditForm.attr('action', $this.data('url'));
    });

    $('.-tag-remove-').click(function (e) {
        e.preventDefault();
        if (!confirm('Вы действительно хотите удалить данный тег?')) {
            return false;
        }

        var $this = $(this),
            $row = $this.closest('tr')
        ;

        $.ajax({
            method: 'POST',
            url: $this.data('url'),
            data: {},
            success: function (result) {
                if (result.hasOwnProperty('result') && result.result == 'success') {
                    $row.remove();
                }
            }
        });
    });

    $('.-post-remove-').click(function (e) {
        e.preventDefault();
        if (!confirm('Вы действительно хотите удалить данный пост?')) {
            return false;
        }

        var $this = $(this),
            $row = $this.closest('tr')
            ;

        $.ajax({
            method: 'POST',
            url: $this.data('url'),
            data: {},
            success: function (result) {
                if (result.hasOwnProperty('result') && result.result == 'success') {
                    $row.remove();
                }
            }
        });
    });
});