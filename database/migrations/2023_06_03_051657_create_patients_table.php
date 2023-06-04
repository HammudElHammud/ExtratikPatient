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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('card_id');
            $table->string('gender');
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->longText('address');
            $table->string('post_code');
            $table->string('contact_number_1');
            $table->string('contact_number_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
