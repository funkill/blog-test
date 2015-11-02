<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 22:31
 */

namespace Blog\Entity;


use Carbon\Carbon;

/**
 * Class Role
 *
 * @package Blog\Entity
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Role extends EntityAbstract
{

    protected $table = 'roles';

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

}