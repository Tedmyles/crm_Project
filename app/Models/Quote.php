<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['deal_id', 'account_id', 'contact_id', 'quote_date', 'expiry_date', 'total', 'status'];
}
