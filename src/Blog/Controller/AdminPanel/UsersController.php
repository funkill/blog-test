<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 01.11.15
 * Time: 0:21
 */

namespace Blog\Controller\AdminPanel;


use Blog\Exception\InvalidFormException;
use Blog\Model\UserInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class UsersController extends \BaseController
{

    /**
     * @return UserInterface
     */
    private function getModel()
    {
        return App::make('user');
    }

    public function users()
    {
        $users = $this
            ->getModel()
            ->getPage()
        ;

        return View::make('admin/user/users', [
            'users' => $users,
        ]);
    }

    public function createUser()
    {


        try {
            $this
                ->getModel()
                ->createUser(Input::all())
            ;
        } catch (InvalidFormException $IFE) {
            $errors = $IFE->getErrors();

            return Redirect::route('admin_users')->withErrors($errors);
        }

        return Redirect::route('admin_users');
    }

    public function updateUser($userId)
    {
        try {
            $this
                ->getModel()
                ->updateUser($userId, Input::all())
            ;
        } catch (InvalidFormException $IFE) {
            $errors = $IFE->getErrors();

            return Redirect::route('admin_users')->withErrors($errors);
        }

        return Redirect::route('admin_users');
    }

    public function deleteUser($userId)
    {
        if (!$this->getModel()->deleteUser($userId)) {
            return JsonResponse::create(['result' => 'fail']);
        }

        return JsonResponse::create(['result' => 'success']);
    }

}