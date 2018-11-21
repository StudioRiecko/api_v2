<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreEmailRequest
 *
 * @package App\Modules\Auth\Requests
 */
class StoreEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize (): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules (): array
    {
        return [
            'name'     => 'required|min:4',
            'email'    => 'required|unique:users|email',
            'password' => 'required',
            'gender'   => 'required',
        ];
    }
}
