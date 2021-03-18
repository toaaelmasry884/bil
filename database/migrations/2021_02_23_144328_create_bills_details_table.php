<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bills');
            $table->string('bills_number', 50);
            $table->foreign('id_bills')->references('id')->on('bills')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('section', 999);
            $table->string('status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
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
        Schema::dropIfExists('bills_details');
    }
}
