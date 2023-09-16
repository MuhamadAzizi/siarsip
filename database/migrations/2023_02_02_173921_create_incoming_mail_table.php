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
        Schema::create('incoming_mail', function (Blueprint $table) {
            $table->id();
            $table->date('mail_date');
            $table->string('mail_number');
            $table->string('mail_from');
            $table->string('mail_subject');
            $table->string('date_received');
            $table->string('notes')->nullabel();
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
        Schema::dropIfExists('incoming_mail');
    }
};