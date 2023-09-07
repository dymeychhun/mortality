<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
public function index()
    {
        $patients = Patient::all();
        return view('dashboard', compact('patients'));
    }


public function store(Request $request)
{

    // Create a new patient record
    $patient = new Patient;
    $patient->Patient_ID = $request->input('pid');
    $patient->DOB = $request->input('dob');
    $patient->Sex = $request->input('sex');
    $patient->Province = $request->input('province');
    $patient->Date_Time_Of_Adminssion = $request->input('doa');
    $patient->Date_Time_Of_Death = $request->input('dod');
    $patient->Ward = $request->input('ward');
    $patient->Dead_on_Arrival = $request->input('deoa');
    $patient->Cause_of_Death = $request->input('cod');
    $patient->Chronic_Illness = $request->input('cil');
    $patient->What_Chronic_Illness = $request->input('whci');
    $patient->HCAI = $request->input('hcai');
    $patient->HCAI_From_Where = $request->input('hcaiw');
    $patient->Late_Presentation = $request->input('lap');
    $patient->Palliative_Care = $request->input('pac');
    $patient->Medical_Error = $request->input('mede');
    $patient->What_Medical_Error = $request->input('whmede');
    $patient->Ventilation = $request->input('ven');
    $patient->Ventilated_Days = $request->input('vent');
    $patient->Inotropes = $request->input('inot');
    $patient->Inotropes_Hours = $request->input('inoth');
    $patient->Surgery = $request->input('surg');
    $patient->Date_of_Surgery = $request->input('dos');
    $patient->Type_of_Surgery = $request->input('tos');
    $patient->Gestation = $request->input('ges');
    $patient->Birthweight = $request->input('birthw');

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

public function destroy($id) {

    $patient = patient::findOrFail($id);
    $patient->delete();

    return response()->json(['success' => true,'message' => 'Patient record deleted successfully.']);
}

}
