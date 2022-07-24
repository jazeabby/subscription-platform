<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubscribedEmailSentToUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public Collection $posts;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Collection $posts)
    {
        $this->user = $user;
        $this->posts = $posts;
    }

}
