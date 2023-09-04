<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

public function index(){
    $patient_info = patient::all();
    return view('dashboard', compact('patient_info'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'pid' => 'required',
        'dob' => 'required|date',
        'sex' => 'required',
        'province' => 'required',
        'doa' => 'required|date',
        'dod' => 'required|date',
        'ward' => 'required',
        'deoa' => 'required',
        'cod' => 'required',
        'cil' => 'required',
        'whci' => 'nullable|required_if:cil,Y',
        'hcai' => 'required',
        'hcaiw' => 'nullable|required_if:hcai,Y',
        'lap' => 'required',
        'pac' => 'required',
        'mede' => 'required',
        'whmede' => 'nullable|required_if:mede,Y',
        'ven' => 'required',
        'vent' => 'nullable|required_if:ven,Y',
        'inot' => 'required',
        'inoth' => 'nullable|required_if:inot,Y',
        'surg' => 'required',
        'dos' => 'nullable|date|required_if:surg,Y',
        'tos' => 'nullable|required_if:surg,Y',
        'ges' => 'nullable|integer',
        'birthw' => 'nullable|numeric',
    ]);

    // Create a new patient record
    $patient = new Patient;
    $patient->Patient_ID = $validatedData['pid'];
    $patient->DOB = $validatedData['dob'];
    $patient->Sex = $validatedData['sex'];
    $patient->Province = $validatedData['province'];
    $patient->Date_Time_Of_Adminssion = $validatedData['doa'];
    $patient->Date_Time_Of_Death = $validatedData['dod'];
    $patient->Ward = $validatedData['ward'];
    $patient->Dead_on_Arrival = $validatedData['deoa'];
    $patient->Cause_of_Death = $validatedData['cod'];
    $patient->Chronic_Illness = $validatedData['cil'];
    $patient->What_Chronic_Illness = $validatedData['whci'];
    $patient->HCAI = $validatedData['hcai'];
    $patient->HCAI_From_Where = $validatedData['hcaiw'];
    $patient->Late_Presentation = $validatedData['lap'];
    $patient->Palliative_Care = $validatedData['pac'];
    $patient->Medical_Error = $validatedData['mede'];
    $patient->What_Medical_Error = $validatedData['whmede'];
    $patient->Ventilation = $validatedData['ven'];
    $patient->Ventilated_Days = $validatedData['vent'];
    $patient->Inotropes = $validatedData['inot'];
    $patient->Inotropes_Hours = $validatedData['inoth'];
    $patient->Surgery = $validatedData['surg'];
    $patient->Date_of_Surgery = $validatedData['dos'];
    $patient->Type_of_Surgery = $validatedData['tos'];
    $patient->Gestation = $validatedData['ges'];
    $patient->Birthweight = $validatedData['birthw'];
    $patient->save();

    // Redirect or return a response
    return response()->json(['success' => true,'message' => 'Patient record created successfully.']);
}

}
