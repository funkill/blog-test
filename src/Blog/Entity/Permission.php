<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 02.11.15
 * Time: 22:32
 */

namespace Blog\Entity;

use Carbon\Carbon;

/**
 * Class Permission
 *
 * @package Blog\Entity
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Permission extends EntityAbstract
{

    protected $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    /**
     * @return int[]
     */
    public function getRoleIds()
    {
        return $this->roles()->getRelatedIds();
    }

}