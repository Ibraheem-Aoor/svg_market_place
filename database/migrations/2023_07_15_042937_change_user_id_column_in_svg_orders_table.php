<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('svg_orders', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
            $table->boolean('is_guest')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('svg_orders', function (Blueprint $table) {
            $table->dropColumn(['user_id' , 'is_guest']);
        });
    }
};
