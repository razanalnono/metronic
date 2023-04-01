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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()
                ->constrained('products')
                ->nullOnDelete();
                
            $table->foreignId('product_variants_id')->nullable()
                ->constrained('product_variants')
                ->nullOnDelete();

            $table->unsignedBigInteger('quantity')->nullable();
            $table->enum('movement',['push','pull'])->default('push');
            $table->morphs('refernece');
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
        //
    }
};