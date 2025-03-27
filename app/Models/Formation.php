<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etablissement;
use App\Models\Domaine;
use App\Models\Avis;

class Formation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 
        'description',
        'image',
        'etablissement_id',
        'domaine_id',
        'sub_titles',
        'for_whos',
        'requirements',
        'includes',
        'languages',
        'trend'
    ];
    protected $casts = [
        'sub_titles' => 'array',
        'requirements' => 'array',
        'includes' => 'array',
        'for_whos' => 'array',
    ];
    
    // /**
    //  * Get the tags associated with the formation.
    //  */
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }
    
    /**
     * Get the establishment that owns the formation.
     */
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }


    public function reviews()
    {
        return $this->hasMany(Avis::class,'formation_id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'inscriptions', 'formation_id', 'user_id');
    }

    public function recentParticipants()
    {
        return $this->inscriptions()->with('user')->orderBy('created_at', 'desc')->take(3);
    }
    
    // /**
    //  * Get all tags as an array.
    //  * 
    //  * @return array
    //  */
    // public function getTagsAttribute()
    // {
    //     return $this->tags()->pluck('name')->toArray();
    // }
}