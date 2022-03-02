<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cms_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('key');
            $table->text('content');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cms_entries');
    }
};