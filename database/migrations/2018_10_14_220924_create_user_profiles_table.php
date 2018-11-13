<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nickname');
            $table->string('phone_number');
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('city_id')->nullable()->unsigned();
            $table->integer('education_level_id')->nullable()->unsigned();
            $table->timestamps();
        });
            
            Schema::table('user_profiles', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('city_id')->references('id')->on('cities');
                $table->foreign('education_level_id')->references('id')->on('education_levels');
            });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['education_level_id']);
        });
            
            Schema::dropIfExists('user_profiles');
    }
}