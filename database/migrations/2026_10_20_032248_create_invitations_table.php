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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theme_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('groom_nickname');
            $table->string('groom_fullname');
            $table->string('groom_parents');
            $table->string('bride_nickname');
            $table->string('bride_fullname');
            $table->string('bride_parents');
            $table->dateTime('event_date');
            $table->string('akad_time');
            $table->string('resepsi_time');
            $table->string('venue_name');
            $table->text('venue_address');
            $table->text('map_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_holder')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
