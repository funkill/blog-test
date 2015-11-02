<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 16:01
 */

namespace Blog\Model;


use Blog\Exception\InvalidFormException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

interface UserInterface
{

    /**
     * Show paginated tags list
     *
     * @return Collection
     */
    public function getPage();

    /**
     * @param int $userId
     * @return \Illuminate\Support\Collection|static
     */
    public function getUser($userId);

    /**
     * Create new user
     *
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidFormException
     */
    public function createUser(array $data);

    /**
     * Update exists user
     *
     * @param int $userId
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidFormException
     * @throws ModelNotFoundException
     */
    public function updateUser($userId, array $data);

    /**
     * Delete exists tag
     *
     * @param int $userId
     *
     * @return bool
     *
     * @throws ModelNotFoundException
     */
    public function deleteUser($userId);

    /**
     * Is user has role
     *
     * @param string $role
     * @return bool
     */
    public function has($role);

    /**
     * Is user can do this
     *
     * @param string $permission
     * @return bool
     */
    public function can($permission);

}