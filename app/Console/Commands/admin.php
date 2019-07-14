<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $name = $this->ask('What is your name?');
       $email = $this->ask('Type your email');
       $password = $this->ask('Type your password');
       $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'is_admin' => 1,
    ]);
       if($user){
        $this->info('Success, user created .');
    } else {
        $this->error('Error!');
    }
}
}
