<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills_details extends Model
{
    //
    protected $fillable = [
        'id_bills',
        'bills_number',
        'product',
        'section',
        'status',
        'Value_Status',
        'Payment_Date',
        'note',
        'user'
    ];
}
