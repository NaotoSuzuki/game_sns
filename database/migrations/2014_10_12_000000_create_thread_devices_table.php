<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_devices', function (Blueprint $table) {
            $table->id();
            $table->string('thread_device_name')->unique();
            $table->date('created_date')->default(null)->change();
            $table->time('created_time')->default(null)->change();

            $table->engine = 'InnoDB';
        });
    }

//     id
// thread_id
// title
// device_id
// note

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_devices');
    }
}
