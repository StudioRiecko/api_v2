<?php

namespace App\Modules\User\Repositories;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\User\Interfaces\UserRepositoryInterface;
use App\Modules\User\Models\User;


/**
 * Class UserRepository
 *
 * @package App\Modules\User\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @param $user
     *
     * @return User
     */
    public function storeRequest($user): User
    {
        return $this->model()->create($user);
    }

    /**
     * @param $user
     *
     * @return User
     */
    public function storeEmailAndMakeActivationToken($user): User
    {
       return $this->model()->create($user);
    }

    /**
     * @param $activation_token
     *
     * @return User
     */
    public function findUserByToken($activation_token): User
    {
        return $this->model()->where('activation_token', '=', $activation_token)->first();
    }

}
