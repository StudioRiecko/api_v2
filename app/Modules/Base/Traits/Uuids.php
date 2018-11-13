<?php

namespace App\Modules\Base\Traits;

use Ramsey\Uuid\Uuid;

/**
 * Trait Uuids
 *
 * @package Modules\Core\Traits
 */
trait Uuids
{
    /**
     * Boot function from laravel.
     */
    public static function bootUuids()
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    /**
     * @param $uuid
     *
     * @return mixed
     */
    public static function findU($uuid)
    {
        return static::where('uuid', '=', $uuid)->first();
    }
}
