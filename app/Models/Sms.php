<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;


    protected $fillable = [
        'aws_sent_sms_id', 'status', 'retry_count', 'applicationId', 'message', 'sourceAddress', 'requestId', 'created_at'
    ];
}
