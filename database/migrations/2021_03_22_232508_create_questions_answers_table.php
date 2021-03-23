<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // https://laravel.com/docs/8.x/migrations
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->timestamps();
        });
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained();
            $table->text('body');
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
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
    }
}
