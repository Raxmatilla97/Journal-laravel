<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalToplamlariTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_toplamlari', function (Blueprint $table) {
            $table->id('jurnal_toplami_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->text('full_content')->nullable();
            $table->string('views_count')->nullable();
            $table->integer('down_count_fulls')->nullable();
            $table->boolean('complite')->default(1);
            $table->boolean('archive')->default(0);
            $table->string('full_pdf_doc')->nullable();
            $table->unsignedBigInteger('user_id')->default(1);            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jurnal_toplamlari');
    }
}
