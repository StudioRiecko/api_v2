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
        $responseData = array();
        $responseData['error'] = true;
        $responseData['message'] = 'This email already exist, please login';
        
        return response()->json($responseData);
        
        dd($request->get('email'));
        $user = $this->user_repository->storeEmailAndMakeActivationToken($request);
        //$user->callback_url = $request->get('callback_url');
        //$user->notify(new SendActivation($user));

        return responder()->success($user)->respond();
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
