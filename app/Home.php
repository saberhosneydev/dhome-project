<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
	public function getRouteKeyName()
	{
		return 'slug';
	}
	protected $fillable = [
		'user_id','location','description','city','image','saleprice','slug','rentprice','sold'
	];
	public function  user() {
		return $this->belongsTo(User::class);
	}
	public function  images() {
		return $this->hasMany(Image::class);
	}
}
