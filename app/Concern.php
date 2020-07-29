<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concern extends Model
{
    protected $primaryKey = 'concern_id';

    protected $fillable = [
                        'concern_tenant_id',
                        'concern_personnel_id',
                        'concern_type',
                        'date_reported',
                        'is_warranty',
                        'concern_urgency',

                        'concern_item',
                        'concern_qty',
                        'concern_desc',
                        'concern_status',
                        'concern_amt',
                        'is_paid',
                        'rating'

    ];

    public function tenant()
    {
    return $this->belongsTo('App\Tenant', 'concern_tenant_id');
    }

    public function personnel()
    {
    return $this->belongsTo('App\Personnel', 'concern_personnel_id');
    }
}
