<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function club() {
    return $this->belongsTo(Club::class);
    }

    public function assignee() {
    return $this->belongsTo(User::class, 'assigned_to');
    }

    protected $fillable = [
    'title',
    'description',
    'club_id',
    'assigned_to',
    'deadline',
    'status'
    ];

}
