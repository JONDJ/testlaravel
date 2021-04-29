<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email as EmailClass;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envío en secuencia';

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
     * @return int
     */
    public function handle()
    {
        $emails = Email::where('status',0)->get();
        $this->info("Pending ".count($emails));
        foreach($emails as $email){
            $user = User::select('email')->find($email->user_id);
            $mailData = [
                'subject' => $email->subject,
                'message' => $email->message,
                'from'    => $user->email,
            ];
            $this->info(json_encode($email));
            Mail::to($email->email)->send(new EmailClass($mailData));
            if (Mail::failures()) {
                $this->error('Ups');
            }
            $email->status = 1;
            $email->save();
        }
        $this->info("Finish");
    }
}
