<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'domain_id'];

    // Relation avec les joueurs
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    // Relation avec le domaine
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
