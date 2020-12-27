<?php

namespace App\Jobs;

use App\Mail\CongratulationEmail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $templateName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($templateName)
    {
        $this->templateName = $templateName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach(User::activeUsers()->get()->chunk(100) as $users){
            foreach($users as $user){
                Mail::to($user->email)->send(new CongratulationEmail($this->templateName));
            }
        }
    }
}