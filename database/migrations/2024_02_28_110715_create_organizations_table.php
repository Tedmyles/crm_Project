<?php namespace Database\Migrations;

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

Schema::create('organizations', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('organization_id');
    $table->string('industry');
    $table->string('size');
    $table->foreignId('location_id')->constrained('locations');
    $table->timestamps();
});

Schema::dropIfExists('organizations');

    }
};
