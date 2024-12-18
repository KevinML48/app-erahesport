<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'status', 
        'position_id', 
        'domain_id'
    ];

    // Relation avec Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Relation avec Domain
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}