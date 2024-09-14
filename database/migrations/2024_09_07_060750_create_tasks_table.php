<?php

use App\Enums\StatusTask;
use App\Enums\TaskCategory;
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
            $table->string('name')->unique();
            $table->foreignId('kanban_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status', [
                StatusTask::To_do->value,
                StatusTask::In_progres->value,
                StatusTask::Review->value,
                StatusTask::Done->value,
            ])->default(StatusTask::To_do->value);
            $table->enum('category',[
                TaskCategory::UiUx->value,
                TaskCategory::Digmar->value,
                TaskCategory::Frontend->value,
                TaskCategory::Backend->value,
                TaskCategory::Mobile->value,
            ]);
            $table->text('description')->nullable();
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
