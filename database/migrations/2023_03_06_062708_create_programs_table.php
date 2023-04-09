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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->text('descriptionAr');
            $table->text('descriptionEn');
            $table->binary('image');
            $table->text('youtupe');
            $table->text('test');
            $table->string('nameProgramAr');
            $table->string('nameProgramEn');
            $table->string('userName');
            $table->string('password');
            $table->float('priceBefore');
            $table->float('priceAfter');
            $table->integer('commition');
            $table->foreignId("category_program_id")->nullable()
                ->constrained("category_programs")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->json('Meduol')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
