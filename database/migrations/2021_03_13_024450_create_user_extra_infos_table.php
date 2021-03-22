<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExtraInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extra_infos', function (Blueprint $table) {
            $table->id();
            $table->string('img_url');
            $table->string('gender');
            $table->json('interet');
            $table->json('education');
            $table->json('skills');
            $table->text('summary');
            $table->text('address');
            $table->json('experience');
            $table->string('phone');
            $table->json('languages');
            $table->json('certifications');
            $table->integer('user_id');
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
        Schema::dropIfExists('user_extra_infos');
    }
}
