<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sales", function (Blueprint $table) {
            $table->id();
            $table->string("customer_name", 50)->nullable();
            $table->string("telephone_number")->nullable();
            $table
                ->integer("client_id")
                ->nullable()
                ->unsigned();
            $table
                ->foreignId("seller_id")
                ->references("id")
                ->on("users");
            $table
                ->foreignId("branch_id")
                ->references("id")
                ->on("branches");
            $table->double("total", 9, 2);
            $table->double("income", 9, 2);
            $table->double("paid_out");
            $table->double("change", 9, 2);
            $table->integer("folio");
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
        Schema::dropIfExists("sales");
    }
}
