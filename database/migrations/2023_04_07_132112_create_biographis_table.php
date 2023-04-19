<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiographisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biographis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('images_title');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->longText('coption_music');
            $table->string('first_image');
            $table->string('title_image');
            $table->string('coption_two_music');
            $table->string('seconde_image');
            $table->string('title_two_image');
            $table->string('license');
            $table->string('concert_image');
            $table->string('title_concert_image');
            $table->string('list_album');
            $table->string('list_music');
            $table->string('tags');
            $table->softDeletes();
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
        Schema::dropIfExists('biographis');
    }
}
