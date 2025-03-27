<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Etablissement;

class Domaine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'image',
        'trend',
        'icon'
    ];
    
    public function etablissements()
    {
        return $this->belongsToMany(Etablissement::class, 'domaine_etablissement');
    }
}
