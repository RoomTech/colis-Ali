<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pack extends Model
{
    use HasFactory;
    protected $fillable = [
        'serialNumber',
        'senderFirstName',
        'senderLastName',
        'senderContact',
        'recipientFirstName',
        'recipientLastName',
        'recipientContact',
        'recipientAddress',
        'description',
        'isDelivered',
        'user_id',
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
