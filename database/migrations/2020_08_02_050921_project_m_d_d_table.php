<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectMDDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectMDD', function (Blueprint $table) {
            $table->id('project_m_id');
            $table->bigInteger('user_id');
            $table->string('project_m_name');
            $table->string('keyword_m_project');
            $table->string('des_m_project');
            $table->string('facebook');
            $table->string('email');
            $table->string('phone');
            $table->string('status_m');
            $table->bigInteger('type_id');
            $table->bigInteger('genre_id');
            $table->bigInteger('category_id');
            $table->bigInteger('branch_id');
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
        Schema::dropIfExists('projectMDD');
    }
}
