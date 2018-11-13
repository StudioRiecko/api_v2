<?php

namespace App\Modules\User\Interfaces;

use App\Modules\Base\Interfaces\BaseTransformerInterface;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\Item;

/**
 * Class UserTransformer
 *
 * @package App\Modules\User\Transformers
 */
interface UserTransformerInterface extends BaseTransformerInterface
{
    /**
     * @param Model $model
     *
     * @return array
     */
    public function transform(Model $model): array;

    /**
     * @param Model $model
     *
     * @return Item
     */
    //public function includeFilters(Model $model): Item;

}
