<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 16:07
 */

namespace Blog\Handler;


use Blog\Entity\Post;
use Blog\Exception\InvalidFormException;
use Blog\Model\PostInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostHandler implements PostInterface
{

    const LIMIT = 10;

    /**
     * @var Post
     */
    private $Entity;

    public function __construct()
    {
        $this->Entity = new Post();
    }

    /**
     * @return Collection
     */
    public function getPage()
    {
        return $this->Entity->paginate(self::LIMIT);
    }

    public function getPost($postId)
    {
        return $this->Entity->findOrFail($postId);
    }

    public function updatePost($postId, array $data)
    {

    }

    public function createPost($authorId, array $data)
    {

    }

    public function deletePost($postId)
    {

    }

}
