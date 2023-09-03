<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
public function storeData(Request $request)
{
    // Validate the request data
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
        'whci' => 'required_if:cil,Y',
        'hcai' => 'required',
        'hcaiw' => 'required_if:hcai,Y',
        'lap' => 'required',
        'pac' => 'required',
        'mede' => 'required',
        'whmede' => 'required_if:mede,Y',
        'ven' => 'required',
        'vent' => 'required_if:vens,Y',
        'inot' => 'required',
        'inoth' => 'required_if:inot,Y',
        'surg' => 'required',
        'dos' => 'required_if:surg,Y|date',
        'tos' => 'required_if:surg,Y',
        'ges' => 'required_if:sex,female|numeric',
        'birthw' => 'required_if:sex,female|numeric',
    ]);

    // Store the validated data in the database
    // Your code to store the data goes here
    $patient = new patient;
    $patient->pid = $validatedData['pid'];
    $patient->dob = $validatedData['dob'];
    $patient->sex = $validatedData['sex'];
    $patient->province = $validatedData['province'];
    $patient->doa = $validatedData['doa'];
    $patient->dod = $validatedData['dod'];
    $patient->ward = $validatedData['ward'];
    $patient->deoa = $validatedData['deoa'];
    $patient->cod = $validatedData['cod'];
    $patient->cil = $validatedData['cil'];
    $patient->whci = $validatedData['whci'];
    $patient->hcai = $validatedData['hcai'];
    $patient->hcaiw = $validatedData['hcaiw'];
    $patient->lap = $validatedData['lap'];
    $patient->pac = $validatedData['pac'];
    $patient->mede = $validatedData['mede'];
    $patient->whmede = $validatedData['whmede'];
    $patient->ven = $validatedData['ven'];
    $patient->vent = $validatedData['vent'];
    $patient->inot = $validatedData['inot'];
    $patient->inoth = $validatedData['inoth'];
    $patient->surg = $validatedData['surg'];
    $patient->dos = $validatedData['dos'];
    $patient->tos = $validatedData['tos'];
    $patient->ges = $validatedData['ges'];
    $patient->birthw = $validatedData['birthw'];
    $patient->save();
    // Return a response
    return response()->json(['message' => 'Data stored successfully']);
}

}
