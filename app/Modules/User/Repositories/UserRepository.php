<?php

namespace App\Modules\User\Repositories;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\User\Interfaces\UserRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Collection;


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
    public function storeRequest($request): User
    {
        $data = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => bcrypt(
                $request->get('password')
                ),
            'gender'   => $request->get('gender'),
        ];
        
        return $this->model()->create($data);
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

}
