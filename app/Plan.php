<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price'
    ];


    protected $dates = ['deleted_at'];


    public function customers() {
        return $this->hasMany(Customer::class);
    }

}
