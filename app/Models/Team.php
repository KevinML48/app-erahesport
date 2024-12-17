<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'domain_id'];

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
