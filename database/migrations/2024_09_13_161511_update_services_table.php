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
        Schema::table('services', function (Blueprint $table) {
            $table->string('price')->nullable()->change();
            $table->string('duration')->nullable()->change();

            $table->after('description', function (Blueprint $table) {
                $table->string('button_label')->nullable();
                $table->string('button_action')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('price')->nullable(false)->change();
            $table->string('duration')->nullable(false)->change();

            $table->dropColumn('button_label');
            $table->dropColumn('button_action');
        });
    }
};
