<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 01.11.15
 * Time: 16:09
 */

namespace Blog\Exception;


use Illuminate\Support\MessageBag;

class InvalidFormException extends \InvalidArgumentException
{

    private $Messages;

    public function __construct(MessageBag $Messages)
    {
        $this->Messages = $Messages;

        return parent::__construct('Invalid form');
    }

    public function getErrors()
    {
        return $this->Messages->all();
    }

}