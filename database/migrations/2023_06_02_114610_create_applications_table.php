<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->index()->constrained('users')->onDelete('cascade');
            $table->string('content');
            $table->text('comment')->nullable();;
            $table->integer('status')->default(0);
            $table->foreignId('lawyer_id')->nullable()->index()->constrained('users');
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->string('picture_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
