<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth; 
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
    
    public $successStatus = 200;
    
    /**
     * AuthController constructor.
     *
     * @param UserRepositoryInterface           $user_repository
     */
    public function __construct (
        UserRepositoryInterface $user_repository) {
            $this->user_repository = $user_repository;
    }

    /**
     * View all users.
     *
     * @return JsonResponse
     */
    public function index () : JsonResponse 
    {
        $users = $this->user_repository->all();
        
        return response()->json(['users' => $users]);
    }
    
    /**
     * login a user.
     *
     * @param  Request $request
     *
     * @return JsonResponse
     */
    public function login (Request $request) : JsonResponse
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success =  array();
            $success['error'] = false;
            $success['user'] = $user;
            $success['token'] =  $user->createToken('StudioRiecko')->accessToken;
            
            return response()->json($success, $this->successStatus); 
        } else {
            $error = array();
            $error['error'] = true;
            $error['message'] = 'Invalid email or password';
            
            return response()->json($error);
        }
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
        $user = $this->user_repository->storeRequest($request);
        
        $responseData = array();
        $responseData['error'] = false;
        $responseData['message'] = 'Registered successfully';
        $responseData['user'] = $user; 
        
        return response()->json($responseData);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        //
    }

}
