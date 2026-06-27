<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE sale_items DROP FOREIGN KEY sale_items_product_id_foreign');
        DB::statement('ALTER TABLE sale_items MODIFY COLUMN product_id BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE sale_items ADD CONSTRAINT sale_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE sale_items DROP FOREIGN KEY sale_items_product_id_foreign');
        DB::statement('ALTER TABLE sale_items MODIFY COLUMN product_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE sale_items ADD CONSTRAINT sale_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE');
    }
};
