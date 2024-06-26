<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'from_id',
        'to_id',
        'read_at',
        'is_decrypted',
        'encryption_iv',
    ];
}
