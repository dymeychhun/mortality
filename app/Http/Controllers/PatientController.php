<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
public function edit($id){
    $patientId = patient::findOrFail($id);
    return response()->json(['success' => true, 'patient' => $patientId]);
}

public function update(Request $request){

    $patient_id = $request->input('uid');
    $patient = Patient::findOrFail($patient_id);
    $patient->Patient_ID = $request->input('upid');
    $patient->DOB = $request->input('udob');
    $patient->Sex = $request->input('usex');
    $patient->Province = $request->input('uprovince');
    $patient->Date_Time_Of_Adminssion = $request->input('udoa');
    $patient->Date_Time_Of_Death = $request->input('udod');
    $patient->Ward = $request->input('uward');
    $patient->Dead_on_Arrival = $request->input('udeoa');
    $patient->Cause_of_Death = $request->input('ucod');
    $patient->Chronic_Illness = $request->input('ucil');
    $patient->What_Chronic_Illness = $request->input('uwhci');
    $patient->HCAI = $request->input('uhcai');
    $patient->HCAI_From_Where = $request->input('uhcaiw');
    $patient->Late_Presentation = $request->input('ulap');
    $patient->Palliative_Care = $request->input('upac');
    $patient->Medical_Error = $request->input('umede');
    $patient->What_Medical_Error = $request->input('uwhmede');
    $patient->Ventilation = $request->input('uven');
    $patient->Ventilated_Days = $request->input('uvent');
    $patient->Inotropes = $request->input('uinot');
    $patient->Inotropes_Hours = $request->input('uinoth');
    $patient->Surgery = $request->input('usurg');
    $patient->Date_of_Surgery = $request->input('udos');
    $patient->Type_of_Surgery = $request->input('utos');
    $patient->Gestation = $request->input('uges');
    $patient->Birthweight = $request->input('ubirthw');

    $patient->update();

    // Redirect or return a response
    return response()->json(['success' => true,'message' => 'Patient record updated successfully.']);
}

}
