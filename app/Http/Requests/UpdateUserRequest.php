<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        return [
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'nullable|min:8',
            'image'=>'image|nullable'
        ];

    }

    protected function failedValidation(Validator $validator)
    {
    if($this->wantsJson())
    {
         $response = response()->json([
            'success' => true,
            'errors' => $validator->errors()->all()
         ]);
     }

     throw (new ValidationException($validator, $response))
        ->errorBag($this->errorBag)
        ->redirectTo($this->getRedirectUrl());
    }
}
