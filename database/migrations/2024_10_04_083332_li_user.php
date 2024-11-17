<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('user_info_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->index();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('age')->nullable();
            $table->float('height', 5, 2)->nullable();
            $table->float('weight', 5, 2)->nullable();
            $table->float('bmi', 5, 2)->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_pic')->default('assets/images/placeholder.png');
            $table->timestamps(); //created and updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
