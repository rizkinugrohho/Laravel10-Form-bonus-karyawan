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
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('total_bonus');
            $table->string('employee1');
            $table->decimal('percentage1', 5, 2);
            $table->integer('bonus1');
            $table->string('employee2');
            $table->decimal('percentage2', 5, 2);
            $table->integer('bonus2');
            $table->string('employee3');
            $table->decimal('percentage3', 5, 2);
            $table->integer('bonus3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};
