<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerUserRequest extends FormRequest
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
            'user_id' => ['required', 'string', 'max:50', 'min:1', 'unique:users'],
            'role_id' => ['required', 'string', 'max:20', 'min:1'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
           
        ];
    }

    public function messages(){
        return[
            //Exceções User_id
            'user_id.required' => 'O campo User ID é obrigatório!',
            'user_id.max' => 'O campo User ID deve conter no máximo 50 Caracteres.',
            'user_id.min' => 'O campo User ID deve conter no mínimo 1 Caracter.',
            //Exceções Role_id
            'role_id.required'=>'O campo Role ID é obrigatório!',
            'role_id.max'=>'O campo Role deve conter no máximo 20 Caracteres.',
            'role_id.min'=>'O campo Role ID deve conter no mínimo 1 Caracter.',
            //Exceções email
            'email.required' => 'O campo Email é obrigatório!',
            //Exceções password
            'password.min'=> 'O campo Senha deve conter no minimo 8 Caracteres.',
            'password.max'=>'O campo Senha deve conter no máximo 60 Caracteres',
            'password.required'=> 'O campo Senha é obrigatório!'
        ];
    }
}