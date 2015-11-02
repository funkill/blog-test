<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 17:17
 */

namespace Blog\Entity;

use Carbon\Carbon;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

/**
 * Class User
 *
 * @package Blog\Entity
 *
 * @property int id
 * @property string login
 * @property string password
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class User extends EntityAbstract implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    /**
     * @return int[]
     */
    public function getRoleIds()
    {
        return $this->roles()->getRelatedIds();
    }

}