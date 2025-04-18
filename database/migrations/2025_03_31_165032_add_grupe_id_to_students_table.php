<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('grupe_id')->nullable();
            $table->foreign('grupe_id')->references('id')->on('groups')->onDelete('set null');
            $table->date('gim_data')->nullable();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['grupe_id']);
            $table->dropColumn(['grupe_id', 'gim_data']);
        });
    }
};
