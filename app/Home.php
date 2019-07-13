<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Home extends Model
{
	use Searchable;
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

