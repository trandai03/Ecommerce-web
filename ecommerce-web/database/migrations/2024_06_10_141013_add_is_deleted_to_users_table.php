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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('is_deleted')->default(0)
                ->comment('0:not, 1: deleted')
                ->after('updated_at');
            $table->tinyInteger('status')->default(0)
                ->comment('0: active 1: inactive')
                ->after('is_admin');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_deleted');
            $table->dropColumn('status');
        });
    }

};
