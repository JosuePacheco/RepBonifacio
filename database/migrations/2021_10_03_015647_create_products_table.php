<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('description', 50);
            $table->double('weight')->nullable();
            $table->string('observations', 50)->nullable();
            $table->double('price');
            $table->double('price_purchase');
            $table->double('discount');
            $table->integer('discar_cause')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('line_id')->references('id')->on('lines')->cascadeOnDelete();
            $table->foreignId('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->date('restored_at')->nullable();
            $table->date('discarded_at')->nullable();
            $table->foreignId('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('products');
    }
}
