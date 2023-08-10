<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
{
    return [
        'nameProd' => 'required|string',
        'imageProd' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'prixProd' => 'required|numeric',
        'stockProd' => 'required|integer',
        'transport' => 'required|string',
        'delaiCloture' => 'required|date',
        'details' => 'required|string',
    ];
}

    public function messages()
    {
        return [
            'nameProd.required' => 'Le champ nom du produit est obligatoire.',
            'nameProd.string' => 'Le champ nom du produit doit être une chaîne de caractères.',
            'imageProd.required' => 'Le champ image du produit est obligatoire.',
            'imageProd.image' => 'Le champ image du produit doit être une image.',
            'imageProd.mimes' => 'Le champ image du produit doit être au format jpeg, png, jpg, gif ou svg.',
            'imageProd.max' => 'Le champ image du produit ne doit pas dépasser 2048 kilo-octets.',
            'prixProd.required' => 'Le champ prix du produit est obligatoire.',
            'prixProd.numeric' => 'Le champ prix du produit doit être un nombre.',
            'stockProd.required' => 'Le champ stock du produit est obligatoire.',
            'stockProd.integer' => 'Le champ stock du produit doit être un entier.',
            'transport.required' => 'Le champ transport du produit est obligatoire.',
            'transport.string' => 'Le champ transport du produit doit être une chaîne de caractères.',
            'delaiCloture.required' => 'Le champ délai de clôture du produit est obligatoire.',
            'delaiCloture.date' => 'Le champ délai de clôture du produit doit être une date.',
            'details.string' => 'Le champ détails du produit doit être une chaîne de caractères.',
            'details.required' => 'Le champ détails du produit est obligatoire.',
        ];
    }
}
