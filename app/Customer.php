<?php

namespace App;

use App\Scopes\CustomerScope;
use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CustomerScope());
    }

    public function management() {
        return $this->hasMany(Management::class);
    }
    public function sales_master() {
        return $this->hasMany(SalesMaster::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function plans() {
        return $this->belongsTo(Plan::class);
    }
    public function debts() {
        return $this->hasMany(Debt_payment::class);
    }
}
