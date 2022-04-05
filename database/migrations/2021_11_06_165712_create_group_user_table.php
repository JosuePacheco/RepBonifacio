<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("group_user", function (Blueprint $table) {
            $table
                ->foreignId("user_id")
                ->references("id")
                ->on("users");
            $table
                ->foreignId("group_id")
                ->references("id")
                ->on("groups");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("group_users");
    }
}
