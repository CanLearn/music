<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name_persion');
            $table->string('name_english');
            $table->string('name_music_persion');
            $table->string('name_music_english');
            $table->string('image');
            $table->string('album');
            $table->string('file_320');
            $table->string('file_120');
            $table->string('file_wav');
            $table->string('title');
            $table->string('slug');
            $table->longText('caption');
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
        Schema::dropIfExists('files');
    }
}
