<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    const PAGADO = 1;
    const PENDIENTE = 0;

    protected $fillable = [
         'customer_id', 'price_plan', 'total_paid', 'total', 'debt', 'status'
    ];


    protected $dates = ['deleted_at'];


    public function customers() {
        return $this->belongsTo(Customer::class);
    }
    public function debts_payments() {
        return $this->belongsTo(Debt_payment::class);
    }

}
