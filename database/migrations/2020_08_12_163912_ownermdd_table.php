<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OwnermddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_projectmdd', function (Blueprint $table) {
            $table->id('owner_m_id');
            $table->string('owner_m_name');
            $table->string('facebook_m');
            $table->string('email_m');
            $table->string('phone_m');
            $table->string('advisor_m');
            $table->integer('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_projectmdd');
    }
}
