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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_no');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('departmant_id')->nullable();
            $table->dateTime('wait_time')->nullable();
            $table->longText('remarks')->nullable();
            $table->enum('status', ['PENDING', 'PROCESSING', 'COMPLETED'])->default('PENDING');
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
        Schema::dropIfExists('tickets');
    }
};
