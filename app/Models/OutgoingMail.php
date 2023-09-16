<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingMail extends Model
{
    use HasFactory;

    protected $table = 'outgoing_mail';
    protected $fillable = [
        'mail_date',
        'mail_number',
        'mail_to',
        'mail_subject',
        'notes',
    ];
}