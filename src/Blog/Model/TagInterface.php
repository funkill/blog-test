<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 16:03
 */

namespace Blog\Model;


use Blog\Exception\InvalidFormException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface TagInterface
{

    /**
     * Show paginated tags list
     *
     * @return Collection
     */
    public function getPage();

    /**
     * Create new tag action
     *
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidFormException
     */
    public function createTag(array $data);

    /**
     * Update exists tag
     *
     * @param int $tagId
     * @param array $data
     *
     * @return bool
     *
     * @throws InvalidFormException
     * @throws ModelNotFoundException
     */
    public function updateTag($tagId, array $data);

    /**
     * Delete exists tag
     *
     * @param int $tagId
     *
     * @return bool
     *
     * @throws ModelNotFoundException
     */
    public function deleteTag($tagId);

}