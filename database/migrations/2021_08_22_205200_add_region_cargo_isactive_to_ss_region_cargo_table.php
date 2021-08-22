<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionCargoIsactiveToSsRegionCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ss_region', function (Blueprint $table) {
            $table->string('is_active');
        });
        Schema::table('ss_cargo', function (Blueprint $table) {
            $table->string('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ss_region', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
        Schema::table('ss_cargo', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
