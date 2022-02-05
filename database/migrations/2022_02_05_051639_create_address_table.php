<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('address', function (Blueprint $table) {
                $table->id('id');
                $table->string('address_name');
                $table->unsignedBigInteger("person_id");
                $table->foreign("person_id")->references("person_id")->on('persons')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('address');
    }
}
