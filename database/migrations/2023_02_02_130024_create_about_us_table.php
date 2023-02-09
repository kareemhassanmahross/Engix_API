<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->binary('image');
            $table->string('whoWeAreAr');
            $table->string('whoWeAreEn');
            $table->string('ourVisionAr');
            $table->string('ourVisionEn');
            $table->string('ourMissionAr');
            $table->string('ourMissionEn');
            $table->string('locationAr');
            $table->string('locationEn');
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
        Schema::dropIfExists('about_us');
    }
};
