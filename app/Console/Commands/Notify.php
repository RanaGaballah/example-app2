<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all users every day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$users = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        

        foreach($emails as $email){
            // how to send email in laravel
            Mail::To($email)->send(new NotifyEmail());
        }
    }
}
