<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        try {
            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            foreach (array_slice($rows, 1) as $row) {
                $data = [
                    'Patient_ID' => $row[0],
                    'DOB' => date('Y-m-d', strtotime($row[1])), // Convert "DOB" to Y-m-d format
                    'Sex' => $row[2],
                    'Province' => $row[3],
                    'Date_Time_Of_Adminssion' => date('Y-m-d H:i:s', strtotime($row[4])), // Example format: "2023-09-06 11:00:00"
                    'Date_Time_Of_Death' => date('Y-m-d H:i:s', strtotime($row[5])), // Example format: "2023-09-06 14:00:00"
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
                    'Date_of_Surgery' => date('Y-m-d H:i:s', strtotime($row[22])), // Example format: "2023-09-06 10:30:00"
                    'Type_of_Surgery' => $row[23],
                    'Gestation' => $row[24],
                    'Birthweight' => $row[25],
                ];

                // Save the data to the database using Eloquent
                Patient::create($data);
            }

            return redirect()->back()->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
}
