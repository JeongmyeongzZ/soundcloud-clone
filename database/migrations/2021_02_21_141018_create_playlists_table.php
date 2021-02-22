<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('플레이리스트 제목');
            $table->string('genre', 60)->comment('장르');
            $table->string('artwork_url')->comment('썸네일 이미지 경로');
            $table->string('description')->comment('썸네일 이미지 경로');
            $table->boolean('is_private')->comment('공개 여부');
            $table->json('tags')->comment('태그 목록');
            $table->json('track_ids')->comment('트랙 목록');
            $table->date('release_date');
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
        Schema::dropIfExists('playlists');
    }
}
