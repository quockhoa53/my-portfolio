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
        Schema::create('knowledge', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowledge_type_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->foreign('knowledge_type_id')
                  ->references('id')
                  ->on('knowledge_type')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge');
    }
};
