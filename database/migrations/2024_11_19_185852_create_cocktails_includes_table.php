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
        Schema::create('cocktails_includes', function (Blueprint $table)
        {
            $table->foreignId('include_id')->constrained('includes');   //参照先のテーブル名を
            $table->foreignId('cocktail_id')->constrained('cocktails');    //constrainedに記載
            $table->primary(['include_id', 'cocktail_id']); //primaryは主キーを決める関数
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocktails_includes');
    }
};
