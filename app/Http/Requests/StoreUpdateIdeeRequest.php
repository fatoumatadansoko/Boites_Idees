<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateIdeeRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email',
            'status' => 'required|in:approuvee,refusee',
            'categorie_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est requis.',
            'description.required' => 'La description est requise.',
            'auteur_nom_complet.required' => 'Le nom complet de l\'auteur est requis.',
            'auteur_email.required' => 'L\'email de l\'auteur est requis.',
            'status.required' => 'Le statut est requis.',
            'categorie_id.required' => 'La catégorie est requise.',
            'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
        ];
    }
}
