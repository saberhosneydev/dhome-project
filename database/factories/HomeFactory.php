<?php


use App\Home;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Home::class, function (Faker $faker) {
	$location = $faker->address;
	$city = $faker->city;
    return [
        'user_id' => 53,
        'location' => $location,
        'city' => $city,
        'slug' => Str::slug($city, '-').'-'.Str::slug($location, '-').'-'.Str::slug(53+1024),
        'image' => 'photos/4yfc3bpj4Pjg6ymlEyumRyl6CRLVrQaKX0zO5U48.jpeg',
        'saleprice' => $faker->numberBetween($min = 10000, $max = 90000),
        'rentprice' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->sentences($nb = 3, $asText = true),
        'sold' => false
    ];
});
