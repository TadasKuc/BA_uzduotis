<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_from_id')->nullable(false);
            $table->unsignedBigInteger('user_to_id')->nullable(false);
            $table->unsignedBigInteger('contact_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_from_id')->references('id')->on('users');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_contacts');
    }
}
