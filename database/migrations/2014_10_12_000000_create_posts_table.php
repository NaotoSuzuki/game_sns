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
            $table->int('game_id');
            $table->int('thread_id');
            $table->string('purpose');
            $table->string('usrName');
            $table->string('user_platform_id_1')->nullable();
            $table->string('user_platform_id_2')->nullable();
            $table->string('user_platform_id_3')->nullable();
            $table->string('comment');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));


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
