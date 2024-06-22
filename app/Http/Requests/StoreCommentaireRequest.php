<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentaireRequest extends FormRequest
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
            'libelle' => 'required|string',
            'nom_complet_auteur' => 'required|string|max:255',
            'idee_id' => 'required|exists:idees,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'libelle.required' => 'Le libelle est requis.',
            'nom_complet_auteur.required' => 'Le nom complet de l\'auteur est requis.',
            'idee_id.required' => 'L\'identifiant de l\'idée est requis.',
            'idee_id.exists' => 'L\'idée sélectionnée n\'existe pas.',
        ];
    }
}
