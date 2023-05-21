<?php

namespace App\Console\Commands;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'users:create_admin {--email} {--password}';

    public function handle()
    {
        $arguments = $this->arguments();

        $email = $arguments['email'] ?? null;

        if (!$email) {
            $email = $this->ask('Email');
        }

        $password = $arguments['password'] ?? null;

        if (!$password) {
            $password = $this->secret('Password');
        }

        User::unguard();
        $user = User::create([
            'name' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
            'role_as' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        User::reguard();

        $user->save();

        $this->info('Admin user created successfully');
    }   
}