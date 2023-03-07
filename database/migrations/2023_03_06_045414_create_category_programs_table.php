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
        Schema::create('category_programs', function (Blueprint $table) {
            $table->id();
            $table->string('categoryNameAr');
            $table->string('categoryNameEn');
            $table->text('desctriptionAr');
            $table->text('desctriptionEn');
            $table->binary('image');
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
        Schema::dropIfExists('category_programs');
    }
};
