<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_surname');
            $table->string('user_email')->unique();
            $table->string('user_contact');
            $table->boolean('user_flag')->default(1);
            $table->string('user_adresse');
            $table->enum('user_gender',['male','female','other']);
            $table->string('user_function')->nullable();
            $table->string('user_reference')->nullable();
            $table->string('user_description')->nullable();
            $table->string('user_password');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
