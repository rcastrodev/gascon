<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('beginning')->nullable();
            $table->string('work_pressure')->nullable();
            $table->string('maximum_temperature')->nullable();
            $table->string('polished_stem')->nullable();
            $table->string('lower_connection')->nullable();
            $table->string('reference_height')->nullable();
            $table->string('approximate_weight')->nullable();
            $table->string('body_material')->nullable();
            $table->string('video1')->nullable();
            $table->string('video2')->nullable();
            $table->text('training')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
