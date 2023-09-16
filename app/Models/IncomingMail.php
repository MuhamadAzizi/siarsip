<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMail extends Model
{
    use HasFactory;

    protected $table = 'incoming_mail';
    protected $fillable = [
        'mail_date',
        'mail_number',
        'mail_from',
        'mail_subject',
        'date_received',
        'notes',
    ];
}