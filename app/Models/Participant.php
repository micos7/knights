<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    use HasFactory;

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function knight()
    {
        return $this->belongsTo(Knight::class);
    }
}
