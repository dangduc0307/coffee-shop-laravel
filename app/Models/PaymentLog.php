<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'status',
        'message',
        'response',
    ];

    protected $casts = [
        'response' => 'array',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
