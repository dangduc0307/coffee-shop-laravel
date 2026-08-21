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
        Schema::table('products', function (Blueprint $table) {
            $table->string('file')->nullable()->after('status');
            $table->string('file_size', 50)->nullable()->after('file');
            $table->string('demo_url')->nullable()->after('file_size');
            $table->string('documentation_url')->nullable()->after('demo_url');
            $table->text('requirements')->nullable()->after('documentation_url');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'file',
                'file_size',
                'demo_url',
                'documentation_url',
                'requirements',
            ]);
        });
    }
};
