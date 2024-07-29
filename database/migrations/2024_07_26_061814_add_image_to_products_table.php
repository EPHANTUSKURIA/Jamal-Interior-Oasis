<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToProductsTable extends Migration
{
    // database/migrations/2024_07_26_061814_add_image_to_products_table.php
public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('image')->nullable()->after('category_id'); // Add the image column after category_id
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
}

