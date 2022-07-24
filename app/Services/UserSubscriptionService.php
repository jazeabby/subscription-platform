<?php

namespace App\Services;

use App\Events\SubscribedEmailSentToUser;
use App\Mail\SubscribedWebsite;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class UserSubscriptionService
{

    public function verifyAndSendEmail($userSubscription): void
    {
        $user = $userSubscription->user;
        $websiteId = $userSubscription->website_id;

        // get all posts without sent posts
        $sentPosts = $userSubscription->user->sentPosts()->pluck('post_id');
        $posts = Post::where('website_id', $websiteId)->whereNotIn('id', $sentPosts)->get();
        
        if($posts->isEmpty()) return;

        //sent email
        Mail::to($user->email)->send(new SubscribedWebsite($posts, $user));
        
        // dispatch event to update db with posts sent
        SubscribedEmailSentToUser::dispatch($user, $posts);
    }
}