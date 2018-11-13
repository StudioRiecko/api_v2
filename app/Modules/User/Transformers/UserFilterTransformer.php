<?php

namespace App\Modules\User\Transformers;

use App\Modules\Base\Transformers\BaseTransformer;
use App\Modules\City\Interfaces\CityTransformerInterface;
use App\Modules\User\Interfaces\UserFilterTransformerInterface;
use App\Modules\User\Models\User;
use League\Fractal\Resource\Item;

/**
 * Class UserTransformer
 *
 * @package App\Modules\User\Transformers
 */
class UserFilterTransformer extends BaseTransformer implements UserFilterTransformerInterface
{
    /**
     * @var CityTransformerInterface
     */
    private $city_transformer;

    /**
     * @var array
     */
    protected $defaultIncludes = [
        
    ];

    /**
     * @param User $user
     *
     * @return array
     */
    
    public function transform(User $user): array
    { 
        /** @var User $model */
        return [
            'city' => $user->userProfile->city->uuid ?? null,
            'education_level' => $user->userProfile->educationLevel->uuid ?? null,
        ];
    } 
    
    /**
     * @param User $user
     *
     * @return Item
     */
    //public function includeCity(User $user): Item
    //{
    //    return $this->item($user->userProfile->city, $this->city_transformer);
    //}

}
