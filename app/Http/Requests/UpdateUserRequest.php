<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
            'role' => 'required', Rule::in(['Admin', 'User']),
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->request->get('id'),
            'password' => 'nullable|min:8',
            'image'=> 'nullable|image'
        ];

    }

    protected function failedValidation(Validator $validator)
    {
         $response = response()->json([
            'success' => true,
            'errors' => $validator->errors()->all()
         ]);


     throw (new ValidationException($validator, $response))
        ->errorBag($this->errorBag)
        ->redirectTo($this->getRedirectUrl());
    }
}
