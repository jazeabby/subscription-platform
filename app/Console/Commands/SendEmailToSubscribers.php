<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailToUser;
use App\Models\UserSubscription;
use Illuminate\Console\Command;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subscribed users';

    /**
     * Execute the console command.
     * 
     * @return int
     */
    public function handle()
    {
        // get all subscribed users
        $subscribedUsers = UserSubscription::all();

        // schedule a job to send the user an email with the subscribed website
        $subscribedUsers->each(function($userSubscription) {
            SendEmailToUser::dispatch($userSubscription)->onQueue('emails');
            return;
        });
    }
}
