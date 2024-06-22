<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'nom_complet_auteur',
        'idee_id'
    ];

    public function idee()
    {
        return $this->belongsTo(Idee::class);
    }
    }