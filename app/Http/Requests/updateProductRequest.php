<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// dar uma olhada sobre autenticação de usuário.
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
            'Prodname'=>'required|min:3|max:200',
            'Prodtype'=>'required|min:3|max:100',
            'Prodvalue'=>'required|min:1|max:7', 
        ];
    }

    public function messages(){
        return[
            //Exceções ID
            'Prodid.required' => 'O campo ID é obrigatório!',
            'Prodid.min'=> 'O campo ID deve conter no minimo 1 caracteres.',
            'Prodid.max'=>'O campo ID deve conter no máximo 5 Caracteres',

            //Exceções Nome
            'Prodname.required'=> 'O campo Nome do produto é obrigatório!',
            'Prodname.min'=>'O campo Nome deve conter no minimo 3 caracteres.',
            'Prodname.max'=>'O campo Nome deve conter no máximo 200 caracteres.',
            
            //Exceções Tipo
            'Prodtype.required' => 'O campo Tipo é obrigatório!',
            'Prodtype.min'=> 'O campo Tipo deve conter no minimo 3 caracteres.',
            'Prodtype.max'=>'O campo Tipo deve conter no máximo 100 Caracteres',

            //Exceções Valor
            'Prodvalue.required' => 'O campo Valor é obrigatório!',
            'Prodvalue.min'=> 'O campo Valor deve conter no minimo 2 caracteres.',
            'Prodvalue.max'=>'O campo Valor deve conter no máximo 7 Caracteres', 
        ];
    }
}
