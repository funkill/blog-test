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

    private $rules = [
        'title' => 'required|min:5|max:255',
        'url' => 'min:5|max:255',
        'body' => 'required|min:5',
    ];

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
        /**
         * @var Post $post
         */
        $post = $this->Entity->find($postId);

        if (!$post) {
            throw new NotFoundHttpException();
        }

        $filteredData = array_only($data, array_keys($this->rules));

        $this->validateData($filteredData);

        return $post->update($filteredData);
    }

    public function createPost($authorId, array $data)
    {
        $filteredData = array_only($data, array_keys($this->rules));

        $this->validateData($filteredData);

        $this->Entity->setRawAttributes($filteredData);
        $this->Entity->author_id = $authorId;

        if (!$this->Entity->save()) {
            throw new \Exception();
        }

        return $this->Entity->id;
    }

    /**
     * @param array $filteredData
     */
    private function validateData(array $filteredData)
    {
        $validator = Validator::make($filteredData, $this->rules);

        if ($validator->fails()) {
            throw new InvalidFormException($validator->messages());
        }
    }

    public function deletePost($postId)
    {
        return $this->Entity->findOrFail($postId)->delete();
    }

}