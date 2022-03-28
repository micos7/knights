<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    use HasFactory;

    const ROUNDS = 4;

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
