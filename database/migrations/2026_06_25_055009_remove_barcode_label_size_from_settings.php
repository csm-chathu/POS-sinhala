<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->where('key', 'barcode_label_size')->delete();
    }

    public function down(): void
    {
        DB::table('settings')->insertOrIgnore([
            'key'   => 'barcode_label_size',
            'value' => '40x25',
        ]);
    }
};
