<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId("category_id")->nullable();
            $table->string("media_path")->nullable();
            $table->string("slug")->unique();
            $table->string("title");
            $table->string("excerpt");
            $table->text("body");
            $table->string("meta_keywords")->nullable();
            $table->string("meta_description")->nullable();
            $table->enum("status", ['DRAFT', 'ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->enum("type", ['PAGE', 'POST'])->default('PAGE');
            $table->integer("count_like")->default(0)->unsigned();
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
        Schema::dropIfExists('posts');
    }
}
