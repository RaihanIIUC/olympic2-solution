<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('aws_sent_sms_id');
            $table->string('status')->default(0);
            $table->string('retry_count')->default(0);
            $table->string('applicationId')->nullable();
            $table->text('message')->nullable();
            $table->string('sourceAddress')->nullable();
            $table->string('requestId')->nullable();
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
        Schema::dropIfExists('sms');
    }
};
