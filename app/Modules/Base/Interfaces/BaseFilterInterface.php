<?php

namespace App\Modules\Base\Interfaces;

/**
 * Interface BaseFilterInterface
 *
 * @package App\Modules\Base\Interfaces
 */
interface BaseFilterInterface
{
    /**
     * @param $request
     *
     * @return mixed
     */
    public function filter($request);
}
