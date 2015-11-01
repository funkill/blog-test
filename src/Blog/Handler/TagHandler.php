<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 14:47
 */

namespace Blog\Handler;


use Blog\Entity\Tag;
use Blog\Exception\InvalidFormException;
use Blog\Model\TagInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class TagHandler implements TagInterface
{

    const LIMIT = 10;

    /**
     * @var Tag
     */
    private $Entity;

    private $rules = [
        'name' => 'required|min:3|max:255'
    ];

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
        $filteredData = array_only($data, array_keys($this->rules));

        $this->validateData($filteredData);

        $this->Entity->setRawAttributes($filteredData);

        return $this->Entity->save();
    }

    public function updateTag($tagId, array $data)
    {
        $tag = $this->Entity->find($tagId);

        if (!$tag) {
            throw new ModelNotFoundException();
        }

        $filteredData = array_only($data, array_keys($this->rules));

        $this->validateData($filteredData);

        return $tag->update($filteredData);
    }

    public function deleteTag($tagId)
    {
        return $this->Entity->findOrFail($tagId)->delete();
    }

    /**
     * @param array $filteredData
     * @throws InvalidFormException
     */
    private function validateData(array $filteredData)
    {
        $validator = Validator::make($filteredData, $this->rules);

        if ($validator->fails()) {
            throw new InvalidFormException($validator->messages());
        }
    }

}