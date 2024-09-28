<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'type',
        'photo',
        'demande_id'
    ];



    public function demande() 
    {
        return $this->belongsTo(Demande::class,'demande_id');
    }
}
