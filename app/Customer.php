<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function BranchLocation()
    {
    	return $this->belongsTo(BranchLocation::class);
    }

    public function Province()
    {
    	return $this->belongsTo(Province::class);
    }

    public function District()
    {
    	return $this->belongsTo(District::class);
    }

    public function Commune()
    {
    	return $this->belongsTo(Commune::class);
    }

    public function Village()
    {
    	return $this->belongsTo(Village::class);
    }
}
