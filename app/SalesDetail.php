<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sales_master_id', 'product_id', 'product_price', 'quantity', 'total'
    ];


    protected $dates = ['deleted_at'];


    public function products() {
        return $this->hasMany(Product::class);
    }
    public function sales_master() {
        return $this->belongsTo(SalesMaster::class);
    }
}
