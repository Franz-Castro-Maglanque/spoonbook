<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAdditionalFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user',function($table){
            $table->integer('mobilenumber');
            $table->string('address');
            $table->string('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user',function($table){
            $table->dropColumn('mobilenumber');
            $table->dropColumn('address');
            $table->dropColumn('company');
        });
    }
}
