<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsAddNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('lot_number')->after('generic');
            $table->date('expiry_date')->after('lot_number');
            $table->string('manufacturer')->after('expiry_date');
            $table->string('inventory_code')->after('manufacturer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('lot_number');
            $table->dropColumn('expiry_date');
            $table->dropColumn('manufacturer');
            $table->dropColumn('inventory_code');
        });
    }
}
