<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['account_id', 'contact_id', 'stage', 'value', 'probability', 'expected_close_date', 'notes'];
}
