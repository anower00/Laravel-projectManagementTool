<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taskName');
            $table->string('taskCode');
            $table->integer('project_id');
            $table->integer('user_id');
            $table->string('assigned_by');
            $table->string('description')->nullable();
            $table->date('dueDate');
            $table->string('status');
            $table->string('priority')->nullable();
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
        Schema::dropIfExists('assign_tasks');
    }
}
