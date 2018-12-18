<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const PRODUCTO_ACTIVO = true;
    const PRODUCTO_INACTIVO = false;

    protected $fillable = [
        'name', 'description', 'stock', 'price', 'status'
    ];


    protected $dates = ['deleted_at'];



    public function categories() {
        return $this->belongsToMany(Category::class);
    }
    public function sales_details() {
        return $this->belongsTo(SalesDetail::class);
    }
}
