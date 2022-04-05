<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('name_legal_re')->nullable();
            $table->string('email');
            $table->string('rfc');
            $table->string('telephone_number');
            $table->string('address');
            $table->foreignId('shop_id')->references('id')->on('shops')->cascadeOnDelete();
            $table->foreignId('municipality_id')->references('id')->on('municipalities');
            $table->double('commission');
            $table->softDeletes();
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
        Schema::dropIfExists('branches');
    }
}
