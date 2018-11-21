<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Modules\User\Interfaces\UserRepositoryInterface;
use App\Modules\Auth\Requests\StoreEmailRequest;

/**
 * Class AuthController
 *
 * @package App\Modules\Auth\Controllers
 */
class AuthController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;
    
    /**
     * AuthController constructor.
     *
     * @param UserRepositoryInterface           $user_repository
     */
    public function __construct (
        UserRepositoryInterface $user_repository
        ) {
            $this->user_repository = $user_repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEmailRequest $request
     *
     * @return JsonResponse
     */
    public function store (StoreEmailRequest $request) : JsonResponse
    {
        $data = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => bcrypt(
                $request->get('password')
                ),
            'gender'   => $request->get('gender'),
        ];
        
        $user = $this->user_repository->storeRequest($data);
        
        $responseData = array();
        $responseData['error'] = false;
        $responseData['message'] = 'Registered successfully';
        $responseData['user'] = $user; 
        return response()->json($responseData);
        
        //$user->callback_url = $request->get('callback_url');
        //$user->notify(new SendActivation($user));

        //return responder()->success($user)->respond();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
