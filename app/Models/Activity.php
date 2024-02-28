<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['user_id', 'type', 'subject_title', 'due_date', 'date', 'duration', 'notes', 'status'];
}
