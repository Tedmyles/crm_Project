<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('stage'); // Change data type to unsignedBigInteger
            $table->decimal('value', 10, 2);
            $table->decimal('probability', 10, 2);
            $table->date('expected_close_date');
            $table->text('notes');
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('stage')->references('id')->on('deal_stages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
