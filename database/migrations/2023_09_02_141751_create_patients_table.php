<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('pid');
            $table->date('dob');
            $table->string('sex');
            $table->string('province');
            $table->dateTime('doa');
            $table->dateTime('dod');
            $table->string('ward');
            $table->string('deoa');
            $table->string('cod');
            $table->string('cil');
            $table->string('whci')->nullable();
            $table->string('hcai');
            $table->string('hcaiw')->nullable();
            $table->string('lap');
            $table->string('pac');
            $table->string('mede');
            $table->string('whmede')->nullable();
            $table->string('ven');
            $table->string('vent')->nullable();
            $table->string('inot');
            $table->string('inoth')->nullable();
            $table->string('surg');
            $table->date('dos')->nullable();
            $table->string('tos')->nullable();
            $table->integer('ges')->nullable();
            $table->decimal('birthw', 5, 2)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
