<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function space_type() {
        return $this->belongsTo(SpaceType::class);
    }
}
