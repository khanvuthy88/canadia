<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    public function District()
    {
    	return $this->hasMany(District::class);
    }

    public function Commune()
    {
    	return $this->hasMany(Commune::class);
    }

    public function Village()
    {
    	return $this->hasMany(Village::class);
    }

    public function Customers()
    {
        return $this->hasMany(Customer::class);
    }
}
