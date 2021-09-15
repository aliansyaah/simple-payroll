<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInventoryNameToInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Karena keyword bikin migrationnya "add", maka isinya berbeda dengan "create"
        // Kita akan menambahkan kolom "inventory_name" ke tabel "inventory"
        Schema::table('inventory', function (Blueprint $table) {
            // Tambahkan kolom "inventory_name", setelah kolom "inventory_kode"
            $table->string('inventory_name', 100)->after('inventory_kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory', function (Blueprint $table) {
            $table->dropColumn('inventory_name');
        });
    }
}
