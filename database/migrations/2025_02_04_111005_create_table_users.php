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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('phone', 20)->nullable();
                $table->dateTime('brithday')->nullable();
                $table->string('image')->nullable();
                $table->string('description')->nullable();
                $table->string('ward_code', 20);
                $table->string('province_code', 20);
                $table->string('district_code', 20);
                $table->string('email')->unique();
                $table->string('password');
                $table->enum('role', ['admin', 'customer', 'contributor'])->default('customer');
                $table->timestamps();

                // Relationships
                $table->foreign('ward_code')->references('code')->on('wards')->onDelete('cascade');
                $table->foreign('province_code')->references('code')->on('provinces')->onDelete('cascade');
                $table->foreign('district_code')->references('code')->on('districts')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
