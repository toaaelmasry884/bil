<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    //
    // protected $guarded=[];
    protected $fillable = [
        'bills_number',
        'bills_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'note',
        'Payment_Date'
    ];
    protected $dates = ['deleted_at'];

    public function section()
    {
        return $this->belongsTo('App\sections');
    }
}
