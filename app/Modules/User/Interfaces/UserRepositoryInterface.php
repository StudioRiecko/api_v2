<?php

namespace App\Modules\User\Interfaces;

use App\Modules\User\Models\User;
use App\Modules\User\Models\UserProfile;
use App\Modules\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Modules\User\Interfaces
 */
interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $user
     *
     * @return User
     */
    public function StoreEmailAndMakeActivationToken($user): User;

}
