<?php

namespace App\Events;

use App\Models\Payment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payment;

    public function __construct(Payment $payment)
    {
        // Eager load các mối quan hệ để gửi sang JS đầy đủ data
        $this->payment = $payment->load('order.user');
    }

    public function broadcastOn()
    {
        return new Channel('payments');
    }

    public function broadcastAs()
    {
        return 'PaymentCreated';
    }
}
