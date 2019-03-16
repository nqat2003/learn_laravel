<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustoms extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'pass' => 'required|min:3|same:pass',
        ];
    }
    public function message()
    {
        return [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'This email already taken by another user',
                'pass.required' => 'Password is required',
                'pass.same' => 'Password confirm is not match' 
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Name',
            'pass' => 'Password',
            'pass2' => 'Password confirm',
            'email' => 'Email address',
        ];
    }
    
}
