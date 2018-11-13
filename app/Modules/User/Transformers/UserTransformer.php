<?php

namespace App\Modules\User\Transformers;

use App\Modules\Base\Transformers\BaseTransformer;
//use App\Modules\File\Interfaces\FileTransformerInterface;
use App\Modules\User\Interfaces\UserFilterTransformerInterface;
use App\Modules\User\Interfaces\UserTransformerInterface;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\Item;

/**
 * Class UserTransformer
 *
 * @package App\Modules\User\Transformers
 */
class UserTransformer extends BaseTransformer implements UserTransformerInterface
{

    /**
     * @var array
     */
    protected $availableIncludes = [
        'filters',
    ];

    /**
     * @var array
     */
    protected $defaultIncludes = [
        'filters',
    ];

    /**
     * UserTransformer constructor.
     *
     * @param UserFilterTransformerInterface $user_filter_transformer
     */
    public function __construct(
        UserFilterTransformerInterface $user_filter_transformer
    ) {
        $this->user_filter_transformer = $user_filter_transformer;
    }

    /**
     * @param Model $model
     *
     * @return array
     */
    public function transform(Model $model): array
    {
        /** @var User $model */
        return [
            'nick_name' => $model->userProfile->nickname ?? null,
            'email' => $model->email,
            'gender' => $model->userProfile->gender ?? null,
            'birthday' => $model->userProfile->birthday ?? null,
        ];
    }

    /**
     * @param Model $model
     *
     * @return Item
     */
    public function includeFilters(Model $model): Item
    {
        return $this->item($model, $this->user_filter_transformer);
    }

}
