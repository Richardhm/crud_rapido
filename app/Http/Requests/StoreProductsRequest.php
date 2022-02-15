<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            "name" => "required|unique:products|min:3",
            "description" => "required|max:200",
            "price" => "required",
            "stock" => "required|integer"        
        ];
    }

    public function messages()
    {
        return [
            "required" => "Esse campo :attribute e obrigatorio",
            "name.unique" => "Já existe este nome cadastrado",
            "name.min" => "Nome deve ter no minimo 3 caracteres",
            "description.max" => "Descricao deve ter no maximo 200 caracteres",
            "stock.integer" => "Estoque deve ser numero inteiro"
        ];
    }














}
