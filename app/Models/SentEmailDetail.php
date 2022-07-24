<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentEmailDetail extends Model
{
    use HasFactory;

    protected $table = 'sent_email_details';

    protected $fillable = [
        'user_id', 'post_id'
    ];
}
