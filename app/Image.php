<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ['home_id', 'image_name'];
    public function  home() {
		return $this->belongsTo(Home::class);
	}
}
