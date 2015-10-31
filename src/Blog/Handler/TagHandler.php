<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 14:47
 */

namespace Blog\Handler;


use Blog\Entity\Tag;
use Blog\Model\TagInterface;

class TagHandler implements TagInterface
{

    const LIMIT = 10;

    /**
     * @var Tag
     */
    private $Entity;

    public function __construct()
    {
        $this->Entity = new Tag();
    }

    public function getPage()
    {
        return $this->Entity->paginate(self::LIMIT);
    }

    public function createTag(array $data)
    {

    }

    public function updateTag($tagId, array $data)
    {

    }

    public function deleteTag($tagId)
    {

    }

}