<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('subtitle')->nullable();
            $table->string('title1');
            $table->string('title2')->nullable();
            $table->string('link_name');
            $table->string('link');
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
        Schema::dropIfExists('home_banners');
    }
}
