<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = ['quote_id', 'item_name', 'quantity', 'price'];
}
