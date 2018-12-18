<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesMaster extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status', 'customer_id', 'discount', 'sub_total', 'total_paid', 'total', 'debt'
    ];
    const PAGADO = true;
    const PENDIENTE = false;


    protected $dates = ['deleted_at'];


    public function customers() {
        return $this->belongsTo(Customer::class);
    }
    public function debts_payments() {
        return $this->belongsTo(Debt_payment::class);
    }
    public function sales_details() {
        return $this->hasMany(SalesDetail::class);
    }
}
