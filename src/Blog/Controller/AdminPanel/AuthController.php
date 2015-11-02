<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 22:39
 */

namespace Blog\Controller\AdminPanel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AuthController extends \BaseController
{

    public function loginPage()
    {
        return View::make('admin.auth');
    }

    public function login()
    {
        $auth = array_only(Input::get(), ['login', 'password', 'remember']);
        if (Auth::attempt(['login' => $auth['login'], 'password' => $auth['password']], array_key_exists('remember', $auth))) {
            return Redirect::intended('admin_main');
        }

        return View::make('admin.auth');
    }

    public function main()
    {
        return View::make('admin.auth_layout');
    }

}