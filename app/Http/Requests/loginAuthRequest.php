<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginAuthRequest extends FormRequest
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
            'email' => 'required',
            'password' =>'required|min:6|max:60'
            
           
        ];
    }

    public function messages(){
        return[
            //Exceções ID
            'email.required' => 'O campo Email é obrigatório!',
            'password.min'=> 'O campo Senha deve conter no minimo 6 caracteres.',
            'password.max'=>'O campo Senha deve conter no máximo 60 Caracteres',
            'password.required'=> 'O campo Senha é obrigatório!'
        ];
    }
}
