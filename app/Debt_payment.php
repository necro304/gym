<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debt_payment extends Model
{
    use SoftDeletes;

    const PAGO = 1;
    const DEUDA = 0;

    protected $fillable = [
        'id_process', 'total', 'status', 'customer'
    ];


    protected $dates = ['deleted_at'];

    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function sales_master() {
        return $this->hasMany(SalesMaster::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

}
