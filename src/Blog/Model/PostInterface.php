<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 16:01
 */

namespace Blog\Model;


use Blog\Exception\InvalidFormException;
use Illuminate\Database\Eloquent\Collection;

interface PostInterface
{

    /**
     * @return Collection
     */
    public function getPage();

    /**
     * @param int $postId
     * @return mixed
     */
    public function getPost($postId);

    /**
     * @param $authorId
     * @param array $data
     * @return int
     * @throws InvalidFormException
     */
    public function createPost($authorId, array $data);

    /**
     * @param int $postId
     * @param array $data
     * @return bool
     * @throws InvalidFormException
     */
    public function updatePost($postId, array $data);

    /**
     * @param int $postId
     * @return bool
     */
    public function deletePost($postId);

}
