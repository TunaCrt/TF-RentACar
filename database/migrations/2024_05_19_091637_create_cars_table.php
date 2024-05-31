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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('damage_id');
            $table->unsignedInteger('year');
            $table->string('color');
            $table->unsignedInteger('km');
            $table->boolean('garanti_status')->default(0);
            $table->tinyInteger('vites_turu')->comment('0-manuel 1-otomatik 2-yarı otomatik');
            $table->tinyInteger('yakit_turu')->comment('0-benzin 1-dizel 2-lpg');
            $table->dateTime('announcement_date');
            $table->tinyInteger('status')->comment('0-pasif 1-aktif 2-satıldı');
            $table->integer('fiyat');
            $table->text('description')->nullable();


            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')
                ->on('users')->references('id')->onDelete('cascade');

            $table->foreign('model_id')
                ->on('car_models')->references('id')->onDelete('cascade');

            $table->foreign('damage_id')
                ->on('car_damages')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
