<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up()
        {
            Schema::table('penulis', function (Blueprint $table) {
                $table->integer('id_penulis')->unique()->nullable(false);
            });
        }
        /**
         * Reverse the migrations.
         */
        public function down()
        {
            Schema::table('penulis', function (Blueprint $table) {
                $table->dropColumn('id_penulis');
            });
        }
    };
