<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->bigInteger('user_id');
            $table->string('project_name');
            $table->string('keyword_project');
            $table->string('des_project');
            $table->string('facebook');
            $table->string('email');
            $table->string('phone');
            $table->bigInteger('type_id');
            $table->bigInteger('genre_id');
            $table->bigInteger('category_id');
            $table->bigInteger('branch_id');
            $table->string('status_m');
            $table->string('logo');
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
        Schema::dropIfExists('projects');
    }
}
