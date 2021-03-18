<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills_attachements', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->string('bills_number', 50);
            $table->string('Created_by', 999);
            $table->unsignedBigInteger('bills_id')->nullable();
            $table->foreign('bills_id')->references('id')->on('bills')->onDelete('cascade');
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
        Schema::dropIfExists('bills_attachements');
    }
}
