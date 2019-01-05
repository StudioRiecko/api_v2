<?php

namespace App\Modules\Messages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Modules\Messages\Interfaces\MessageRepositoryInterface;

class MessagesController extends Controller
{
    
    public function __construct (
        MessageRepositoryInterface $message_repository) {
            $this->message_repository = $message_repository;
    }

    /**
     * View all users.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        
        $messages = $this->message_repository->all();
        dd($messages);
        return response()->json(['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $this->message_repository->storeRequest($request);
        
        $responseData = array();
        $responseData['error'] = false;
        $responseData['message'] = 'Message send successfully';
        $responseData['messages'] = $message;
        
        return response()->json($responseData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
