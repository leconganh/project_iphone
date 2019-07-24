<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            //id cua nguoi dung mang xa hoi 
            $table->string('social_id')->nullable();
            //lay avatar cua nguoi dung mang xa hoi
            $table->string('avatar')->nullable();
            //phan quyen 0 la khach hang 
            $table->integer('role')->default(0);
            // tai khoan chua kick hoat, khi kich hoat thi gui ve email bam kick hoat de thay doi status
            $table->integer('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
