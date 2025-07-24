<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function creator() {
    return $this->belongsTo(User::class, 'created_by');
    }

    public function tasks() {
    return $this->hasMany(Task::class);
    }

    public function events() {
    return $this->hasMany(Event::class);
    }

    protected $fillable = ['name', 'description', 'status', 'created_by'];


}
