<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Slider', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->Text('img_path');
            // $table->string('update_at');
            // $table->rememberToken();
            $table->timestamps();
            // $timestamp=false();+
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
