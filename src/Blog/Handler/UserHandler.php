<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 14:48
 */

namespace Blog\Handler;


use Blog\Entity\Permission;
use Blog\Entity\Role;
use Blog\Entity\User;
use Blog\Exception\InvalidFormException;
use Blog\Model\UserInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserHandler implements UserInterface
{

    const LIMIT = 10;

    /**
     * @var User
     */
    private $Entity;

    public function __construct()
    {
        $this->Entity = new User();
    }

    public function getPage()
    {
        return $this->Entity->paginate(self::LIMIT);
    }

    public function getUser($userId)
    {
        return $this->Entity->findOrFail($userId);
    }

    public function createUser(array $data)
    {

    }

    public function updateUser($userId, array $data)
    {

    }

    public function deleteUser($userId)
    {

    }

}