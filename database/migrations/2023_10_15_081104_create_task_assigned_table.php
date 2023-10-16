<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_assigned', function (Blueprint $table) {
            $table->id('task_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('add_users');
            $table->string('project_name');
            $table->string('project_title');
            $table->string('descripation');
            $table->string('Progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assigned');
    }
};
