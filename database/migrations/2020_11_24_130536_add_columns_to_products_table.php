<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            /**
             * El ->after('id'); lo ponemos para indicar que el campo se debe crear de un campo en especifico.
             */
            $table->bigInteger('idUser')->unsigned();
            $table->string('name')->nullable($value = false)->after('id');
            $table->text('description')->nullable($value = false)->after('name');
            $table->integer('value')->nullable($value = false)->after('description');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->after('value');
            $table->foreign('idUser')
                ->references('id')
                ->on('users');
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
            $table->dropColumn(['name', 'description', 'value', 'status']);
        });
    }
}
