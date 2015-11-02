<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 22:50
 */

namespace Blog\Controller;


use Illuminate\Support\Facades\View;

class Errors extends \BaseController
{

    public function e403()
    {
        return View::make('errors/e403');
    }

}