<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'domain_id', 'team_id', 'image_path'];

    // Relation avec une équipe
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Relation avec un membre
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}