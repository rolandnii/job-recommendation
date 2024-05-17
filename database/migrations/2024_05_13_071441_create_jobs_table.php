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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('salary')->nullable();
            $table->foreignId('created_by')->constrained(
                table: 'users' , column: 'id'
            );
            $table->string('categories')->nullable();
            $table->string('job_type')->nullable();
            $table->text('description')->nullable();
            $table->text('qualification')->nullable();
            $table->text('skill')->nullable();
            $table->text('location')->nullable();
            $table->boolean('is_published');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
