<?php

use App\Home;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Home::disableSearchSyncing();
        $this->call(HomesTableSeeder::class);
    }
}
