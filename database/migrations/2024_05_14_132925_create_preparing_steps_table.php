<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Recipe;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preparing_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recipe::class)->constrained();
            $table->integer('step_number');
            $table->text('preparing_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparing_steps');
    }
};
