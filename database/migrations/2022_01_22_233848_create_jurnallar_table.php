<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateJurnallarTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnallar', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('authors');
            $table->text('abstr_content')->nullable();
            $table->string('abstraksiya_pdf')->nullable();
            $table->text('abiut_cite_article')->nullable();
            $table->string('full_journal_pdf');
            $table->unsignedBigInteger('created_user_id')->index();
            $table->unsignedBigInteger('send_user_id')->index();
            $table->unsignedBigInteger('volume_journal_id')->index();
            $table->boolean('status')->nullable();
            $table->integer('views_count')->nullable();
            $table->integer('down_count_abstr')->nullable();
            $table->integer('down_count_fulls')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('send_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('volume_journal_id')->references('id')->on('jurnal_toplamlari')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jurnallar');
    }
}
