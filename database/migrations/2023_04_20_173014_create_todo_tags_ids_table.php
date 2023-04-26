<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTagsIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_tags_ids', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('todo_id');
            $table->unsignedBigInteger('tag_id');

            $table->index('todo_id', 'todo_tag_todo_ids');
            $table->index('tag_id', 'todo_tag_tag_ids');

            $table->foreign('todo_id', 'todo_tag_todo_fk')->on('todos')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id', 'todo_tag_tag_fk')->on('todo_tags')->references('id')->onUpdate('cascade')->onDelete('cascade');

//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_tags_ids');
    }
}
