<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'email' => 'required|max:255,unique:users',
            'password' => 'required|min:8',
            'phone' => 'required|min:6',
            'country' => 'required',
        ];
    }
    private function randomWhoops() {
        $num = rand(1, 4);

        if ($num === 1) {
            return "Whoops, ";
        } else if ($num === 2) {
            return "Please ";
        } else if ($num === 3) {
            return "Something went wrong, ";
        } else {
            return "Whoops! ";
        }
    }

    public function messages()
    {
        $whoops = $this->randomWhoops();
        return [
            'name.required' => $whoops . 'enter your full name',
            'email.required' => $whoops . 'enter your email',
            'password.required' => $whoops . 'enter a password with min. 8 characters',
            'phone.required' => $whoops . 'enter your phone number',
            'country.required' => $whoops . 'tell us which country you\'re located in',
        ];
    }
}
