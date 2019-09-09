<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchLocation extends Model
{
	protected $fillable = [
        'name', 'code', 'address',
    ];
    public function Customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
