<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->string('thread_title')->unique();
            $table->string('thread_device_id')->nullable();
            $table->text('note');
            $table->date('created_date')->default(null)->change();
            $table->time('created_time')->default(null)->change();
            $table->engine = 'InnoDB';
        });
    }

// id
// thread_title
// thread_device_id
// note

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
