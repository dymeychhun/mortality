<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Read the Excel file and retrieve the data
        $data = Excel::toArray([], $file)[0];

        // Loop through each row and save the data to the database
        foreach ($data as $row) {
            patient::create([
                'Patient_ID' => $row[0],
                'DOB' => $row[1],
                'Sex' => $row[2],
                'Province' => $row[3],
                'Date_Time_Of_Adminssion' => $row[4],
                'Date_Time_Of_Death' => $row[5],
                'Ward' => $row[6],
                'Dead_on_Arrival' => $row[7],
                'Cause_of_Death' => $row[8],
                'Chronic_Illness' => $row[9],
                'What_Chronic_Illness' => $row[10],
                'HCAI' => $row[11],
                'HCAI_From_Where' => $row[12],
                'Late_Presentation' => $row[13],
                'Palliative_Care' => $row[14],
                'Medical_Error' => $row[15],
                'What_Medical_Error' => $row[16],
                'Ventilation' => $row[17],
                'Ventilated_Days' => $row[18],
                'Inotropes' => $row[19],
                'Inotropes_Hours' => $row[20],
                'Surgery' => $row[21],
                'Date_of_Surgery' => $row[22],
                'Type_of_Surgery' => $row[23],
                'Gestation' => $row[24],
                'Birthweight' => $row[25],
            ]);
        }

        // Redirect back with a success message
        return back()->with('success', 'Data uploaded successfully.');
    }
}
