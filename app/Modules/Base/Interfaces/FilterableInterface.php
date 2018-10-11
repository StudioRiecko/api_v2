<?php

namespace App\Modules\Base\Interfaces;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface FilterableInterface
 *
 * @package App\Modules\Base\Interfaces
 */
interface FilterableInterface
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder $builder
     */
    public function apply(Builder $builder, $value): Builder;
}
