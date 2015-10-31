<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 16:24
 */

namespace Blog\Entity;

/**
 * Class Tag
 *
 * @package Blog\Entity
 *
 * @property int $id
 * @property string $name
 */
class Tag extends EntityAbstract
{

    protected $table = 'tags';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}