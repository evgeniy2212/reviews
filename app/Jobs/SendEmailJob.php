<?php

namespace App\Jobs;

use App\Mail\CongratulationEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $templateName;
    private $subjectContent;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($templateName, $subject = '')
    {
        Log::info(__METHOD__);
        $this->templateName = $templateName;
        $this->subjectContent = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info(__METHOD__, User::activeUsers()->get());
        foreach(User::activeUsers()->get()->chunk(100) as $users){
            foreach($users as $user){
                Mail::to($user->email)->send(new CongratulationEmail($this->templateName, $this->subjectContent));
            }
        }
    }
}
