<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
	public function District()
	{
		return $this->belongsTo(District::class);
	}
    public function Province()
    {
    	return $this->belongsTo(Province::class);
    }

    public function Villages()
    {
    	return $this->hasMany(Village::class);
    }
}
