<?php

namespace App\Jobs;

use App\Models\UserSubscription;
use App\Services\UserSubscriptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserSubscription $userSubscription;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userSubscription)
    {
        $this->userSubscription = $userSubscription;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserSubscriptionService $service)
    {
        $service->verifyAndSendEmail($this->userSubscription);
    }
}
