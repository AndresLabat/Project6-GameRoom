<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->string('nickname', 100)->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('photo')->default("https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png");
            $table->string('role')->default("user");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
