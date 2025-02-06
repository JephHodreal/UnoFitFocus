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
        Schema::create('parq_answers', function (Blueprint $table) {
            $table->bigIncrements('parq_id');
            $table->unsignedBigInteger('fk_userparq_id');
            $table->foreign('fk_userparq_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('heart_condition')->index();
            $table->string('chest_pain_phys')->index();
            $table->string('chest_pain_non_phys')->index();
            $table->string('balance_loss')->index();
            $table->string('bone_joint_problem')->index();
            $table->string('drug_prescrip')->index();
            $table->string('other_reason')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parq_answers');
    }
};
