<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('promo_expires_at');
            $table->date('expiry_date')->nullable()->after('wholesale_price');
            $table->date('promo_start_date')->nullable()->after('promo_price');
            $table->date('promo_end_date')->nullable()->after('promo_start_date');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['expiry_date', 'promo_start_date', 'promo_end_date']);
            $table->date('promo_expires_at')->nullable()->after('promo_price');
        });
    }
};
