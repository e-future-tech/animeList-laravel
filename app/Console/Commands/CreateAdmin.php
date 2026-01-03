<?php

namespace App\Console\Commands;

use App\Models\User;
use App\traits\GeneratedId;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{

    use GeneratedId;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $user = new User();

        $user->name = $this->ask('Name');
        $user->email = $this->ask('Email?');
        $password = $this->secret('Password Admin');
        $passwordConfirmation = $this->secret('confirm Password Admin');

        if ($passwordConfirmation !== $password) {
            $this->error('Password Tidak sama');

            return Command::FAILURE;
        } else {
            $user->password = Hash::make($password);
        }

        $user->user_id = $this->createAdminId();

        $user->role = 'admin';

        $user->save();
        $this->info('Admin Successfully Created.');
    }
}
