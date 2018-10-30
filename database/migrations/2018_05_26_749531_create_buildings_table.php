<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_title');
            $table->longtext('ad_description');
            $table->longtext('ad_space');
            $table->longtext('ad_room_count');
            $table->longtext('ad_bathroom_count');
            $table->longtext('ad_kitchen_count');
            $table->longtext('ad_reseption_count');
            $table->string('ad_main_photo')->nullable();
            $table->string('ad_other_photo')->nullable();
            $table->string('ad_status');
            $table->integer('ad_owner')->unsigned();
            $table->foreign('ad_owner')->references('id')->on('users')->onDelete('cascade');
            $table->string('ad_town');
            $table->string('ad_owner_phone');
            $table->string('ad_price');
            $table->string('ad_sort');
            $table->enum('ad_furnished', ['yes', 'no']);
            $table->string('ad_keywords')->nullable();
            $table->enum('active', [0,1]);
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
        Schema::dropIfExists('buildings');
    }
}