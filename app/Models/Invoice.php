<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['account_id', 'contact_id', 'quote_id', 'invoice_number', 'invoice_date', 'due_date', 'total'];
}
