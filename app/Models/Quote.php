<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'deal_id',
        'account_id',
        'contact_id',
        'quote_date',
        'expiry_date',
        'total',
        'status',
    ];

    public function account()
    {
        return $this->belongsTo(Organization::class, 'account_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
