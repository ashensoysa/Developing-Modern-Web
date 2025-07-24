<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function club() {
    return $this->belongsTo(Club::class);
    }

    protected $fillable = ['title', 'club_id', 'date', 'venue', 'description'];

}
