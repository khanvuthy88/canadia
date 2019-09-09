<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function Commune()
    {
    	return $this->belongsTo(Commune::class);
    }

    public function Customer()
    {
    	return $this->hasMany(Customer::class);
    }
}
