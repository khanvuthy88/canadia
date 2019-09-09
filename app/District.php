<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name', 'code', 'province_id',
    ];
    public function Province()
    {
    	return $this->belongsTo(Province::class);
    }

    public function Communes()
    {
    	return $this->hasMany(Commune::class);
    }

    public function Customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
