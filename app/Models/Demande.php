<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrondissement',
        'numero_du_titre_foncier',
        'superficie',
        'destination',
        'client_id',
        'statut',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
