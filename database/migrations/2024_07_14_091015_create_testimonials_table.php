<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('author');
            $table->timestamps(); // If you have timestamps in your table
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
