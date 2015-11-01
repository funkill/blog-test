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

    private $rules = [
        'login' => 'required|min:4|max:20|unique:users,login',
        'password' => 'min:8'
    ];

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
        $filteredData = array_only($data, array_merge(array_keys($this->rules), ['password']));

        $this->validateData($filteredData);

        $filteredData['password'] = Hash::make($filteredData['password']);

        $this->Entity->login = $filteredData['login'];
        $this->Entity->password = $filteredData['password'];

        return $this->Entity->save();
    }

    public function updateUser($userId, array $data)
    {
        /**
         * @var User $user
         */
        $user = $this->Entity->find($userId);

        if (!$userId) {
            throw new ModelNotFoundException();
        }

        $filteredData = array_only($data, array_keys($this->rules));

        $this->validateData($filteredData);

        $user->login = $filteredData['login'];

        return $user->update();
    }

    public function deleteUser($userId)
    {
        return $this->Entity->findOrFail($userId)->delete();
    }

    /**
     * @param array $filteredData
     * @throws InvalidFormException
     */
    private function validateData(array $filteredData)
    {
        $validator = Validator::make($filteredData, $this->rules);

        if ($validator->fails()) {
            throw new InvalidFormException($validator->messages());
        }
    }

}