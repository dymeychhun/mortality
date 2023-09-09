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
            $table->string('Patient_ID');
            $table->date('DOB');
            $table->string('Sex');
            $table->string('Province');
            $table->dateTime('Date_Time_Of_Adminssion');
            $table->dateTime('Date_Time_Of_Death');
            $table->string('Ward');
            $table->string('Dead_on_Arrival');
            $table->longText('Cause_of_Death');
            $table->string('Chronic_Illness');
            $table->string('What_Chronic_Illness')->nullable();
            $table->string('HCAI');
            $table->string('HCAI_From_Where')->nullable();
            $table->string('Late_Presentation');
            $table->string('Palliative_Care');
            $table->string('Medical_Error');
            $table->string('What_Medical_Error')->nullable();
            $table->string('Ventilation');
            $table->string('Ventilated_Days')->nullable();
            $table->string('Inotropes');
            $table->string('Inotropes_Hours')->nullable();
            $table->string('Surgery');
            $table->date('Date_of_Surgery')->nullable();
            $table->string('Type_of_Surgery')->nullable();
            $table->integer('Gestation')->nullable();
            $table->decimal('Birthweight', 5, 2)->nullable();
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
