<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('short_text')->nullable();
            $table->boolean('button');
            $table->string('button_text')->nullable();
            $table->string('button_route')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('short_text');
            $table->dropColumn('button');
            $table->dropColumn('button_text');
            $table->dropColumn('button_route');
        });
    }
}
