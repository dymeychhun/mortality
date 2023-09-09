<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'Patient_ID',
        // Add other columns you want to allow mass assignment for here
        'DOB',
        'Sex',
        'Province',
        'Date_Time_Of_Adminssion',
        'Date_Time_Of_Death',
        'Ward',
        'Dead_on_Arrival',
        'Cause_of_Death',
        'Chronic_Illness',
        'What_Chronic_Illness',
        'HCAI',
        'HCAI_From_Where',
        'Late_Presentation',
        'Palliative_Care',
        'Medical_Error',
        'What_Medical_Error',
        'Ventilation',
        'Ventilated_Days',
        'Inotropes',
        'Inotropes_Hours',
        'Surgery',
        'Date_of_Surgery',
        'Type_of_Surgery',
        'Gestation',
        'Birthweight',
    ];
}
