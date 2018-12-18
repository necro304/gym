<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Management extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id', 'm_arm', 'm_leg', 'm_waist', 'weight', 'imc'
    ];


    protected $dates = ['deleted_at'];


    public function customers() {
        return $this->belongsTo(Customer::class);
    }

}
