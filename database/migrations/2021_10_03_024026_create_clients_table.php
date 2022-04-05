<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("clients", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("first_lastname");
            $table->string("second_lastname");
            $table->string("telephone_number");
            $table->integer("credit");
            $table->double("positive_balance");
            $table
                ->foreignId("branch_id")
                ->references("id")
                ->on("branches");
            $table->enum("type", [Client::WHOLESALE, Client::PUBLIC_SALE]);
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
        Schema::dropIfExists("clients");
    }
}
