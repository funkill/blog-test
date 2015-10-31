<?php
/**
 * Created by PhpStorm.
 * User: funkill
 * Date: 31.10.15
 * Time: 15:58
 */

namespace Blog\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class EntityAbstract extends Eloquent
{

    /**
     * Needs to prevent throw exception on parse value
     * from timestamp with milliseconds
     *
     * @param mixed $value
     * @return Carbon|static
     */
    protected function asDateTime($value)
    {
        try {
            $object = parent::asDateTime($value);
        } catch (\InvalidArgumentException $IAE) {
            $object = Carbon::parse($value);
        }

        return $object;
    }

}
