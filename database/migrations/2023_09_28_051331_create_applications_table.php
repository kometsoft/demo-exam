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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('icno', 12)->nullable();
            $table->text('address')->nullable();
            $table->integer('state_id')->nullable(); //data lookup
            $table->integer('grade_id')->nullable(); //data lookup
            $table->date('appointed_at')->nullable()->comment('Tarikh Lantikan ke jawatan sekarang');
            $table->string('hod_name')->nullable();
            $table->string('hod_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
