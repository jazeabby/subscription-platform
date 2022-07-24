<?php

namespace App\Listeners;

use App\Events\SubscribedEmailSentToUser;
use App\Models\SentEmailDetail;
use Illuminate\Support\Facades\Log;

class SubscribedEmailSendListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SubscribedEmailSentToUser  $event
     * @return void
     */
    public function handle(SubscribedEmailSentToUser $event)
    {
        $user = $event->user;
        $posts = $event->posts;

        Log::error("in listener");
        $posts->each(function($post) use($user) {
            SentEmailDetail::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
        });
    }
}
