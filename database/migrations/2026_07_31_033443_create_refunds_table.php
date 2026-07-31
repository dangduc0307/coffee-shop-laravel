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
        Schema::create('refunds', function (Blueprint $table) {

            $table->id();

            $table->foreignId('payment_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('amount', 12, 2);

            $table->text('reason')
                ->nullable();

            $table->string('status', 30)
                ->default('pending');
            // pending, approved, rejected, completed

            $table->string('refund_transaction_id')
                ->nullable()
                ->unique();

            $table->timestamp('refunded_at')
                ->nullable();

            $table->timestamps();

            $table->index('payment_id');
            $table->index('status');
            $table->index('refunded_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
