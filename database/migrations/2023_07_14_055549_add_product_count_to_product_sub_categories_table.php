<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductCountToProductSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_sub_categories', function (Blueprint $table) {
            $table->integer('product_count')->nullable()->after('category_id');
            $table->integer('status')->default(0)->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_sub_categories', function (Blueprint $table) {
            $table->dropColumn('product_count');
            $table->dropColumn('status');
        });
    }
}
