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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        $table->enum('status', ['todo', 'in_progress', 'done'])->default('todo');
        $table->date('due_date')->nullable();
        $table->foreignId('creator_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
        $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamps();
    });
}





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
