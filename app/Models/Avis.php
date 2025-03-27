<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Mosels\Formation;

class Avis extends Model
{
    protected $table = 'avis';
    protected $fillable = ['user_id', 'formation_id', 'note', 'commentaire'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
