<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'formation_id',
        'number_personne'
    ];
    
    /**
     * Get the user that owns the inscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the formation that this inscription is for.
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
