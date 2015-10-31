<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 15:23
 */

namespace Blog\Entity;

use Carbon\Carbon;

/**
 * Class Post
 *
 * @package Blog\Model
 *
 * @property int id
 * @property string title
 * @property string url
 * @property string body
 * @property int author_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Post extends EntityAbstract
{

    protected $table = 'posts';

    protected $fillable = ['title', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
