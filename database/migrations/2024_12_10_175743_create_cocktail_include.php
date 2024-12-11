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
        Schema::create('cocktail_include', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('include_id')->constrained('includes');   //参照先のテーブル名を
            $table->foreignId('cocktail_id')->constrained('cocktails');    //constrainedに記載
            $table->primary(['include_id', 'cocktail_id']); //primaryは主キーを決める関数
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocktail_include');
    }
};
