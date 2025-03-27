<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Domaine;

class Etablissement extends Model {
    use HasFactory;

    protected $fillable = ['nom', 'adresse', 'telephone', 'image', 'localisation','description'];


    public function domaines()
    {
        return $this->belongsToMany(Domaine::class, 'domaine_etablissement');
    }
}