<?php

namespace App\Modules\User\Interfaces;

use App\Modules\Base\Interfaces\BaseTransformerInterface;
use App\Modules\User\Models\User;
use League\Fractal\Resource\Collection;

/**
 * Class UserTransformer
 *
 * @package App\Modules\User\Transformers
 */
interface UserFilterTransformerInterface extends BaseTransformerInterface
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user): array;

}
