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
        Schema::create('sub_category_programs', function (Blueprint $table) {
            $table->id();
            $table->string('subCategoryAr');
            $table->string('subCategoryEn');
            $table->text('desctriptionAr');
            $table->text('desctriptionEn');
            $table->foreignId("category_program_id")->nullable()
                ->constrained("category_programs")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('sub_category_products');
    }
};