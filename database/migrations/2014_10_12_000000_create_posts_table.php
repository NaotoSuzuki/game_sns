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
            $table->string('purpose');
            $table->string('thread_device_id')->nullable();
            $table->string('user_device_id_1')->nullable();
            $table->string('user_device_id_2')->nullable();
            $table->string('user_device_id_3')->nullable();
            $table->string('comment');
            $table->date('created_date')->default(null)->change();
            $table->time('created_time')->default(null)->change();

            $table->engine = 'InnoDB';
        });
    }

    // id
    // post_id
    // purpose
    // device_id
    // user_device_id
    // comment

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
