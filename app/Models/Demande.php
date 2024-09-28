<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrondissement',
        'numero_du_titre_foncier',
        'superficie',
        'destination',
        'departement',
        'localite',
        'budget',
        'client_id',
        'statut',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
