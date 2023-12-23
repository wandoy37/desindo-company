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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('address')->nullable()->after('youtube');
            $table->string('email')->nullable()->after('address');
            $table->string('number_phone')->nullable()->after('email');
            $table->text('maps')->nullable()->after('number_phone');
            $table->text('logo')->nullable()->after('maps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('email');
            $table->dropColumn('number_phone');
            $table->dropColumn('maps');
            $table->dropColumn('logo');
        });
    }
};
