<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class destroyProductRequest extends FormRequest
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
            //Regras de Validação
            'Prodid'=>'required|min:1|max:5' ,
        ];
    }

    public function messages(){
        return[
            //Exceções ID
            'Prodid.required' => 'O campo ID é obrigatório!',
            'Prodid.min'=> 'O campo ID deve conter no minimo 1 caracteres.',
            'Prodid.max'=>'O campo ID deve conter no máximo 5 Caracteres',
        ];
    }

}
