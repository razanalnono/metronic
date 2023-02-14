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
        //
        Schema::create('variations_attributes', function (Blueprint $table) {
            //
            $table->foreignId('attributes_id')->nullable()
                  ->constrained('attributes', 'id')
                  ->nullOnDelete();
            $table->foreignId('variation_id')->nullable()
                ->constrained('variations', 'id')
                ->nullOnDelete();
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};