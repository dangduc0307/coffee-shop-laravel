<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('payment_method', 50);
            // COD, VNPay, MoMo, Stripe, PayPal...

            $table->decimal('amount', 12, 2);

            $table->string('currency', 10)
                ->default('VND');

            $table->string('status', 30)
                ->default('pending');
            // pending, processing, paid, failed, cancelled, refunded

            $table->string('transaction_id')
                ->nullable()
                ->unique();

            $table->string('gateway')
                ->nullable();
            // VNPay, MoMo...

            $table->longText('gateway_response')
                ->nullable();

            $table->timestamp('paid_at')
                ->nullable();

            $table->timestamps();

            $table->index('order_id');
            $table->index('payment_method');
            $table->index('status');
            $table->index('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
