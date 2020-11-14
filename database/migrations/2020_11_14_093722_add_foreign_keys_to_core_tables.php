<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCoreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {

            // FOREIGN KEY CONSTRAINTS
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    

        Schema::table('songs', function (Blueprint $table) {
            // FOREIGN KEY CONSTRAINTS
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {

            // FOREIGN KEY CONSTRAINTS
            $table->dropForeign(['artist_id']);
            $table->dropForeign(['genre_id']);
        });

        Schema::table('songs', function (Blueprint $table) {
            // FOREIGN KEY CONSTRAINTS
            $table->dropForeign(['album_id']);
        });
    }
}
