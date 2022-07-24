<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribedWebsite extends Mailable
{
    use Queueable, SerializesModels;

    public Collection $posts;

    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $posts, User $user)
    {
        $this->posts = $posts;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.posts');
    }
}
