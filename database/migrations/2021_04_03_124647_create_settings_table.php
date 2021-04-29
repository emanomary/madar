<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name',255);
            $table->string('phone',20);
            $table->string('mobile',20);
            $table->string('email')->unique();
            $table->text('address');
            $table->string('favicon');
            $table->string('logo');
            $table->string('facebook_url');
            $table->string('telegram_url');
            $table->string('twitter_url');
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
        Schema::dropIfExists('settings');
    }
}
