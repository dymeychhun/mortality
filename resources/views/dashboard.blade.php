@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
<div class="col-md-12">
    <div class="alert alert-info" role="alert">
        <i class="fas fa-sync fa-spin"></i> Last updated: 08.08.2023
      </div>
</div>
</div>
    <h1>Dashboard</h1>
@stop

@section('content')

{{-- Add Modal --}}
@php
    $yns = ['Y','N'];
    $sex = ['Male' => 'M','Female' => 'F'];
    $provinces = [
            'Banteay Meanchey',
            'Battambang',
            'Kampong Cham',
            'Kampong Chhnang',
            'Kampong Speu',
            'Kampong Thom',
            'Kandal',
            'Kep',
            'Koh Kong',
            'Kratie',
            'Mondulkiri',
            'Oddar Meanchey',
            'Pailin',
            'Phnom Penh',
            'Preah Sihanouk',
            'Preah Vihear',
            'Prey Veng',
            'Pursat',
            'Ratanakiri',
            'Siem Reap',
            'Sihanoukville',
            'Stung Treng',
            'Takeo',
            'Tboung Khmum',
        ];
@endphp
<div class="modal fade" id="modal_add" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Add New</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="{{ route('dashboard') }}" method="POST" id="fmdata" novalidate="novalidate">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
        <label>Patient ID</label>
        <input type="text" class="form-control @error('province') is-invalid @enderror" id="pid" name="pid" required>
        </div>
        <div class="form-group col-md-4">
        <label>DOB</label>
        <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group col-md-4">
            <label>Sex</label>
            <select name="sex" id="sex" class="form-control">
                <option selected="selected"></option>
                @foreach ($sex as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Province</label>
            <select name="province" id="province" class="form-control">
                <option selected="selected"></option>
                @foreach ($provinces as $province)
                <option value="{{ $province }}">{{ $province }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Date/Time of admission</label>
            <input type="datetime-local" class="form-control" id="doa" name="doa">
        </div>
        <div class="form-group col-md-4">
            <label>Date/Time of Death</label>
            <input type="datetime-local" class="form-control" id="dod" name="dod">
        </div>
        <div class="form-group col-md-4">
            @php
                $ward = ['ER','PICU','NICU','SCBU','ICU'];
            @endphp
            <label>Ward</label>
            <select name="ward" id="ward" class="form-control">
                <option selected="selected"></option>
                @foreach ($ward as $wards)
                <option value="{{ $wards }}">{{ $wards }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Dead on arrival?</label>
            <select name="deoa" id="deoa" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Cause of death</label>
            <input type="text" class="form-control" id="cod" name="cod">
        </div>
        <div class="form-group col-md-4">
            <label>Chronic illness?</label>
            <select name="cil" id="cil" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>What chronic illness?</label>
            <input type="text" class="form-control" id="whci" name="whci">
        </div>
        <div class="form-group col-md-4">
            <label>HCAI</label>
            <select name="hcai" id="hcai" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>HCAI from where?</label>
            <input type="text" class="form-control" id="hcaiw" name="hcaiw">
        </div>
        <div class="form-group col-md-4">
            <label>Late presentation?</label>
            <select name="lap" id="lap" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Palliative care?</label>
            <select name="pac" id="pac" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Medical error?</label>
            <select name="mede" id="mede" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>What medical error?</label>
            <input type="text" class="form-control" id="whmede" name="whmede">
        </div>
        <div class="form-group col-md-4">
            <label>Ventilation?</label>
            <select name="ven" id="ven" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Ventilated (days)</label>
            <input type="text" class="form-control" id="vent" name="vent">
        </div>
        <div class="form-group col-md-4">
            <label>Inotropes?</label>
            <select name="inot" id="inot" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Inotropes (hours)</label>
            <input type="text" class="form-control" id="inoth" name="inoth">
        </div>
        <div class="form-group col-md-4">
            <label>Surgery?</label>
            <select name="surg" id="surg" class="form-control">
                <option selected="selected"></option>
                @foreach ($yns as $yn)
                <option value="{{ $yn }}">{{ $yn }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Date of surgery</label>
            <input type="date" class="form-control" id="dos" name="dos">
        </div>
        <div class="form-group col-md-4">
            <label>Type of surgery</label>
            <input type="text" class="form-control" id="tos" name="tos">
        </div>
        <div class="form-group col-md-6">
            <label>Gestation (weeks): neonates only</label>
            <input type="text" class="form-control" id="ges" name="ges">
        </div>
        <div class="form-group col-md-6">
            <label>Birthweight (Kg): neonates only</label>
            <input type="number" class="form-control" id="birthw" name="birthw">
        </div>
    </div>
</form>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-outline-success" form="fmdata">Save</button>
    </div>
    </div>
    
    </div>
    
    </div>
{{-- End Add Modal --}}

{{-- Edit Modal --}}
@php
    $yns = ['Y','N'];
    $sex = ['Male' => 'M','Female' => 'F'];
    $provinces = [
            'Banteay Meanchey',
            'Battambang',
            'Kampong Cham',
            'Kampong Chhnang',
            'Kampong Speu',
            'Kampong Thom',
            'Kandal',
            'Kep',
            'Koh Kong',
            'Kratie',
            'Mondulkiri',
            'Oddar Meanchey',
            'Pailin',
            'Phnom Penh',
            'Preah Sihanouk',
            'Preah Vihear',
            'Prey Veng',
            'Pursat',
            'Ratanakiri',
            'Siem Reap',
            'Sihanoukville',
            'Stung Treng',
            'Takeo',
            'Tboung Khmum',
        ];
@endphp
<div class="modal fade" id="modal_edit" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Update</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="{{ route('dashboard') }}" method="POST" id="fmupdate" novalidate="novalidate">
    @method('PUT')
    @csrf
    <div class="row">
    <div class="form-group col-md-12">
      <input type="hidden" name="uid" id="uid" class="form-control">
    </div>
    <div class="form-group col-md-4">
        <label>Patient ID</label>
        <input type="text" class="form-control" id="upid" name="upid">
    </div>
    <div class="form-group col-md-4">
        <label>DOB</label>
        <input type="date" class="form-control" id="udob" name="udob">
    </div>
    <div class="form-group col-md-4">
        <label>Sex</label>
        <select name="usex" id="usex" class="form-control">
            <option selected="selected"></option>
            @foreach ($sex as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Province</label>
        <select name="uprovince" id="uprovince" class="form-control">
            <option selected="selected"></option>
            @foreach ($provinces as $province)
            <option value="{{ $province }}">{{ $province }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Date/Time of admission</label>
        <input type="datetime-local" class="form-control" id="udoa" name="udoa">
    </div>
    <div class="form-group col-md-4">
        <label>Date/Time of Death</label>
        <input type="datetime-local" class="form-control" id="udod" name="udod">
    </div>
    <div class="form-group col-md-4">
        @php
            $ward = ['ER','PICU','NICU','SCBU','ICU'];
        @endphp
        <label>Ward</label>
        <select name="uward" id="uward" class="form-control">
            <option selected="selected"></option>
            @foreach ($ward as $wards)
            <option value="{{ $wards }}">{{ $wards }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Dead on arrival?</label>
        <select name="udeoa" id="udeoa" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Cause of death</label>
        <input type="text" class="form-control" id="ucod" name="ucod">
    </div>
    <div class="form-group col-md-4">
        <label>Chronic illness?</label>
        <select name="ucil" id="ucil" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>What chronic illness?</label>
        <input type="text" class="form-control" id="uwhci" name="uwhci">
    </div>
    <div class="form-group col-md-4">
        <label>HCAI</label>
        <select name="uhcai" id="uhcai" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>HCAI from where?</label>
        <input type="text" class="form-control" id="uhcaiw" name="uhcaiw">
    </div>
    <div class="form-group col-md-4">
        <label>Late presentation?</label>
        <select name="ulap" id="ulap" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Palliative care?</label>
        <select name="upac" id="upac" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Medical error?</label>
        <select name="umede" id="umede" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>What medical error?</label>
        <input type="text" class="form-control" id="uwhmede" name="uwhmede">
    </div>
    <div class="form-group col-md-4">
        <label>Ventilation?</label>
        <select name="uven" id="uven" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Ventilated (days)</label>
        <input type="text" class="form-control" id="uvent" name="uvent">
    </div>
    <div class="form-group col-md-4">
        <label>Inotropes?</label>
        <select name="uinot" id="uinot" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Inotropes (hours)</label>
        <input type="text" class="form-control" id="uinoth" name="uinoth">
    </div>
    <div class="form-group col-md-4">
        <label>Surgery?</label>
        <select name="usurg" id="usurg" class="form-control">
            <option selected="selected"></option>
            @foreach ($yns as $yn)
            <option value="{{ $yn }}">{{ $yn }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Date of surgery</label>
        <input type="date" class="form-control" id="udos" name="udos">
    </div>
    <div class="form-group col-md-4">
        <label>Type of surgery</label>
        <input type="text" class="form-control" id="utos" name="utos">
    </div>
    <div class="form-group col-md-6">
        <label>Gestation (weeks): neonates only</label>
        <input type="text" class="form-control" id="uges" name="uges">
    </div>
    <div class="form-group col-md-6">
        <label>Birthweight (Kg): neonates only</label>
        <input type="number" class="form-control" id="ubirthw" name="ubirthw">
    </div>
</div>
</form>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-outline-success" form="fmupdate">Update</button>
    </div>
    </div>
    
    </div>
    
    </div>
{{-- End Edit Modal --}}

{{-- Del Modal --}}
<!-- Modal for deleting patient data -->
<div class="modal fade" id="modal_del" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST" name="fmdel" id="fmdel">
          @method('DELETE')
          @csrf
          <input type="hidden" name="patient_id" id="patient_id">
        </form>
        <div class="text-center">
          <h4>Are you sure?</h4>
          <b>You won't be able to revert this!</b>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" form="fmdel">OK</button>
      </div>
    </div>
  </div>
</div>
{{-- End Del Modal --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal_add"><i class="fas fa-plus-circle"></i> Create New</button>
            </div>
        </div>
        <div class="card-body">
            <div id="btn_plugin" class="dataTables_wrapper dt-bootstrap4">
                <table class="table table-bordered table-striped dataTable dtr-inline table-responsive" style="width: 100%" id="tblData">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Patient_ID</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Province</th>
                            <th scope="col">Date_Time_Of_Adminssion</th>
                            <th scope="col">Date_Time_Of_Death</th>
                            <th scope="col">Ward</th>
                            <th scope="col">Dead_on_Arrival</th>
                            <th scope="col">Cause_of_Death</th>
                            <th scope="col">Chronic_Illness</th>
                            <th scope="col">What_Chronic_Illness</th>
                            <th scope="col">HCAI</th>
                            <th scope="col">HCAI_From_Where</th>
                            <th scope="col">Late_Presentation</th>
                            <th scope="col">Palliative_Care</th>
                            <th scope="col">Medical_Error</th>
                            <th scope="col">What_Medical_Error</th>
                            <th scope="col">Ventilation</th>
                            <th scope="col">Ventilated_Days</th>
                            <th scope="col">Inotropes</th>
                            <th scope="col">Inotropes_Hours</th>
                            <th scope="col">Surgery</th>
                            <th scope="col">Date_of_Surgery</th>
                            <th scope="col">Type_of_Surgery</th>
                            <th scope="col">Gestation</th>
                            <th scope="col">Birthweight</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="patientTableBody">
                      @foreach($patients as $i => $patient)
                      <tr>
                          <td>{{ $i + 1 }}</td>
                          <td>{{ $patient->Patient_ID }}</td>
                          <td>{{ $patient->DOB }}</td>
                          <td>{{ $patient->Sex }}</td>
                          <td>{{ $patient->Province }}</td>
                          <td>{{ $patient->Date_Time_Of_Adminssion }}</td>
                          <td>{{ $patient->Date_Time_Of_Death }}</td>
                          <td>{{ $patient->Ward }}</td>
                          <td>{{ $patient->Dead_on_Arrival }}</td>
                          <td>{{ $patient->Cause_of_Death }}</td>
                          <td>{{ $patient->Chronic_Illness }}</td>
                          <td>{{ $patient->What_Chronic_Illness }}</td>
                          <td>{{ $patient->HCAI }}</td>
                          <td>{{ $patient->HCAI_From_Where }}</td>
                          <td>{{ $patient->Late_Presentation }}</td>
                          <td>{{ $patient->Palliative_Care }}</td>
                          <td>{{ $patient->Medical_Error }}</td>
                          <td>{{ $patient->What_Medical_Error }}</td>
                          <td>{{ $patient->Ventilation }}</td>
                          <td>{{ $patient->Ventilated_Days }}</td>
                          <td>{{ $patient->Inotropes }}</td>
                          <td>{{ $patient->Inotropes_Hours }}</td>
                          <td>{{ $patient->Surgery }}</td>
                          <td>{{ $patient->Date_of_Surgery }}</td>
                          <td>{{ $patient->Type_of_Surgery }}</td>
                          <td>{{ $patient->Gestation }}</td>
                          <td>{{ $patient->Birthweight }}</td>
                          <td>        
                          <a href="#" class="btn btn-outline-primary btn-sm mt-2" title="View"><i class="fas fa-eye"></i></a>
                          <button class="btn btn-outline-success btn-sm mt-2 btn_edit" title="Edit" value="{{ $patient->id }}"><i class="fas fa-edit"></i></button>
                          <button type="submit" class="btn btn-outline-danger btn-sm mt-2 btn_del" title="Delete" value="{{ $patient->id }}"><i class="fas fa-trash-alt"></i></button>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
<script>

$(document).ready(function() {

   // Toastr Plugin
   toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
      }

    // DataTables Javascript
    // $('#tblData').DataTable({
    //   "paging": true,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });

    var table = $("#tblData").DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    buttons: ["copy", "csv", "excel"]
    });

    // Move the buttons container to the specified element
    table.buttons().container().appendTo('#btn_plugin .col-md-6:eq(0)');

 
    // Check the validition of the form
    $('#fmdata').validate({
    rules: {
      pid: {
        required: true,
      },
      dob: {
        required: true,
        date: true,
      },
      sex: {
        required: true,
      },
      province: {
        required: true,
      },
      doa: {
        required: true,
        date: true,
      },
      dod: {
        required: true,
        date: true,
      },
      ward: {
        required: true,
      },
      deoa: {
        required: true,
      },
      cod: {
        required: true,
      },
      cil: {
        required: true,
      },
      whci: {
        required: function(element) {
          return $('#cil').val() === 'Y';
        }
      },
      hcai: {
        required: true,
      },
      hcaiw: {
        required: function(element) {
          return $('#hcai').val() === 'Y';
        }
      },
      lap: {
        required: true,
      },
      pac: {
        required: true,
      },
      mede: {
        required: true,
      },
      whmede: {
        required: function(element) {
          return $('#mede').val() === 'Y';
        }
      },
      ven: {
        required: true,
      },
      vent: {
        required: function(element) {
          return $('#ven').val() === 'Y';
        }
      },
      inot: {
        required: true,
      },
      inoth: {
        required: function(element) {
          return $('#inot').val() === 'Y';
        }
      },
      surg: {
        required: true,
      },
      dos: {
        required: function(element) {
          return $('#surg').val() === 'Y';
        },
        date: true,
      },
      tos: {
        required: function(element) {
          return $('#surg').val() === 'Y';
        },
      },
      ges: {
        integer: true,
      },
      birthw: {
        number: true,
      },
    },
    messages: {
      pid: {
        required: "Please enter a Patient ID",
      },
      dob: {
        required: "Please enter a Date of Birth",
        date: "Please enter a valid date",
      },
      sex: {
        required: "Please select a Sex",
      },
      province: {
        required: "Please select a Province",
      },
      doa: {
        required: "Please enter a Date/Time of Admission",
        date: "Please enter a valid date/time",
      },
      dod: {
        required: "Please enter a Date/Time of Death",
        date: "Please enter a valid date/time",
      },
      ward: {
        required: "Please select a Ward",
      },
      deoa: {
        required: "Please select an option for Dead on Arrival",
      },
      cod: {
        required: "Please enter a Cause of Death",
      },
      cil: {
        required: "Please select an option for Chronic Illness",
      },
      whci: {
        required: "Please enter the Chronic Illness",
      },
      hcai: {
        required: "Please select an option for HCAI",
      },
      hcaiw: {
        required: "Please enter the source of HCAI",
      },
      lap: {
        required: "Please select an option for Late Presentation",
      },
      pac: {
        required: "Please select an option for Palliative Care",
      },
      mede: {
        required: "Please select an option for Medical Error",
      },
      whmede: {
        required: "Please enter the Medical Error",
      },
      ven: {
        required: "Please select an option for Ventilation",
      },
      vent: {
        required: "Please enter the number of days ventilated",
      },
      inot: {
        required: "Please select an option for Inotropes",
      },
      inoth: {
        required: "Please enter the number of hours on Inotropes",
      },
      surg: {
        required: "Please select an option for Surgery",
      },
      dos: {
        required: "Please enter the Date of Surgery",
        date: "Please enter a valid date",
      },
      tos: {
        required: "Please enter the Type of Surgery",
      },
      ges: {
        integer: "Please enter a valid integer value for Gestation",
      },
      birthw: {
        number: "Please enter a valid numeric value for Birthweight",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  $('#cil').change(function() {
    if ($('#cil').val() === 'N') {
      $('#whci').removeClass('is-invalid');
    }
  });
  $('#hcai').change(function() {
    if ($('#hcai').val() === 'N') {
      $('#hcaiw').removeClass('is-invalid');
    }
  });
  $('#mede').change(function() {
    if ($('#mede').val() === 'N') {
      $('#whmede').removeClass('is-invalid');
    }
  });
  $('#ven').change(function() {
    if ($('#ven').val() === 'N') {
      $('#vent').removeClass('is-invalid');
    }
  });
  $('#inot').change(function() {
    if ($('#inot').val() === 'N') {
      $('#inoth').removeClass('is-invalid');
    }
  });
  $('#surg').change(function() {
    if ($('#surg').val() === 'N') {
      $('#dos').removeClass('is-invalid');
      $('#tos').removeClass('is-invalid');
    }
  });


  // Submit the data if the form is valid
  $('#fmdata').submit(function(e) {
    e.preventDefault();

    if ($('#fmdata').valid()) {
      $.ajax({
        url: "{{ route('store.data') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
          // Handle the success response
          $('#fmdata')[0].reset();
          $('#modal_add').modal('hide');
          if (response.success) {
            toastr.success(response.message);
          }
        },
        error: function(xhr) {
          // Handle the error response
          var errors = xhr.responseJSON.errors;
          toastr.error(errors);
        }
      });
    }
  });

  $('.btn_edit').click(function (e) {
    e.preventDefault();
    var id = $(this).val();
    $('#modal_edit').modal('show');
    $.ajax({
      type: "GET",
      url: "/dashboard/" + id,
      success: function (response) {
        console.log(response);
        if(response.success) {
            // Declare variables
            let data = response.patient;

            // Set the value of #uid to data.id
            $('#uid').val(data.id);

            // Set the value of #upid to data.Patient_ID
            $('#upid').val(data.Patient_ID);

            // Set the value of #udob to data.DOB
            $('#udob').val(data.DOB);

            // Set the value of #usex to data.Sex
            $('#usex').val(data.Sex);

            // Set the value of #uprovince to data.Province
            $('#uprovince').val(data.Province);

            // Set the value of #udoa to data.Date_Time_Of_Adminssion
            $('#udoa').val(data.Date_Time_Of_Adminssion);

            // Set the value of #udod to data.Date_Time_Of_Death
            $('#udod').val(data.Date_Time_Of_Death);

            // Set the value of #uward to data.Ward
            $('#uward').val(data.Ward);

            // Set the value of #udeoa to data.Dead_on_Arrival
            $('#udeoa').val(data.Dead_on_Arrival);

            // Set the value of #ucod to data.Cause_of_Death
            $('#ucod').val(data.Cause_of_Death);

            // Set the value of #ucil to data.Chronic_Illness
            $('#ucil').val(data.Chronic_Illness);

            // Set the value of #uwhci to data.What_Chronic_Illness
            $('#uwhci').val(data.What_Chronic_Illness);

            // Set the value of #uhcai to data.HCAI
            $('#uhcai').val(data.HCAI);

            // Set the value of #uhcaiw to data.HCAI_From_Where
            $('#uhcaiw').val(data.HCAI_From_Where);

            // Set the value of #ulap to data.Late_Presentation
            $('#ulap').val(data.Late_Presentation);

            // Set the value of #upac to data.Palliative_Care
            $('#upac').val(data.Palliative_Care);

            // Set the value of #umede to data.Medical_Error
            $('#umede').val(data.Medical_Error);

            // Set the value of #uwhmede to data.What_Medical_Error
            $('#uwhmede').val(data.What_Medical_Error);

            // Set the value of #uven to data.Ventilation
            $('#uven').val(data.Ventilation);

            // Set the value of #uvent to data.Ventilated_Days
            $('#uvent').val(data.Ventilated_Days);

            // Set the value of #uinot to data.Inotropes
            $('#uinot').val(data.Inotropes);

            // Set the value of #uinoth to data.Inotropes_Hours
            $('#uinoth').val(data.Inotropes_Hours);

            // Set the value of #usurg to data.Surgery
            $('#usurg').val(data.Surgery);

            // Set the value of #udos to data.Date_of_Surgery
            $('#udos').val(data.Date_of_Surgery);

            // Set the value of #utos to data.Type_of_Surgery
            $('#utos').val(data.Type_of_Surgery);

            // Set the value of #uges to data.Gestation
            $('#uges').val(data.Gestation);

            // Set the value of #ubirthw to data.Birthweight
            $('#ubirthw').val(data.Birthweight);
        }
      }
    });
  });

  // Check the update validition of the form
  $('#fmupdate').validate({
    rules: {
      upid: {
        required: true,
      },
      udob: {
        required: true,
        date: true,
      },
      usex: {
        required: true,
      },
      uprovince: {
        required: true,
      },
      udoa: {
        required: true,
        date: true,
      },
      udod: {
        required: true,
        date: true,
      },
      uward: {
        required: true,
      },
      udeoa: {
        required: true,
      },
      ucod: {
        required: true,
      },
      ucil: {
        required: true,
      },
      uwhci: {
        required: function(element) {
          return $('#ucil').val() === 'Y';
        }
      },
      uhcai: {
        required: true,
      },
      uhcaiw: {
        required: function(element) {
          return $('#uhcai').val() === 'Y';
        }
      },
      ulap: {
        required: true,
      },
      upac: {
        required: true,
      },
      umede: {
        required: true,
      },
      uwhmede: {
        required: function(element) {
          return $('#umede').val() === 'Y';
        }
      },
      uven: {
        required: true,
      },
      uvent: {
        required: function(element) {
          return $('#uven').val() === 'Y';
        }
      },
      uinot: {
        required: true,
      },
      uinoth: {
        required: function(element) {
          return $('#uinot').val() === 'Y';
        }
      },
      usurg: {
        required: true,
      },
      udos: {
        required: function(element) {
          return $('#usurg').val() === 'Y';
        },
        date: true,
      },
      utos: {
        required: function(element) {
          return $('#usurg').val() === 'Y';
        },
      },
      uges: {
        integer: true,
      },
      ubirthw: {
        number: true,
      },
    },
    messages: {
      upid: {
        required: "Please enter a Patient ID",
      },
      udob: {
        required: "Please enter a Date of Birth",
        date: "Please enter a valid date",
      },
      usex: {
        required: "Please select a Sex",
      },
      uprovince: {
        required: "Please select a Province",
      },
      udoa: {
        required: "Please enter a Date/Time of Admission",
        date: "Please enter a valid date/time",
      },
      udod: {
        required: "Please enter a Date/Time of Death",
        date: "Please enter a valid date/time",
      },
      uward: {
        required: "Please select a Ward",
      },
      udeoa: {
        required: "Please select an option for Dead on Arrival",
      },
      ucod: {
        required: "Please enter a Cause of Death",
      },
      ucil: {
        required: "Please select an option for Chronic Illness",
      },
      uwhci: {
        required: "Please enter the Chronic Illness",
      },
      uhcai: {
        required: "Please select an option for HCAI",
      },
      uhcaiw: {
        required: "Please enter the source of HCAI",
      },
      ulap: {
        required: "Please select an option for Late Presentation",
      },
      upac: {
        required: "Please select an option for Palliative Care",
      },
      umede: {
        required: "Please select an option for Medical Error",
      },
      uwhmede: {
        required: "Please enter the Medical Error",
      },
      uven: {
        required: "Please select an option for Ventilation",
      },
      uvent: {
        required: "Please enter the number of days ventilated",
      },
      uinot: {
        required: "Please select an option for Inotropes",
      },
      uinoth: {
        required: "Please enter the number of hours on Inotropes",
      },
      usurg: {
        required: "Please select an option for Surgery",
      },
      udos: {
        required: "Please enter the Date of Surgery",
        date: "Please enter a valid date",
      },
      utos: {
        required: "Please enter the Type of Surgery",
      },
      uges: {
        integer: "Please enter a valid integer value for Gestation",
      },
      ubirthw: {
        number: "Please enter a valid numeric value for Birthweight",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  $('#ucil').change(function() {
    if ($('#ucil').val() === 'N') {
      $('#uwhci').removeClass('is-invalid');
    }
  });
  $('#uhcai').change(function() {
    if ($('#uhcai').val() === 'N') {
      $('#uhcaiw').removeClass('is-invalid');
    }
  });
  $('#umede').change(function() {
    if ($('#umede').val() === 'N') {
      $('#uwhmede').removeClass('is-invalid');
    }
  });
  $('#uven').change(function() {
    if ($('#uven').val() === 'N') {
      $('#uvent').removeClass('is-invalid');
    }
  });
  $('#uinot').change(function() {
    if ($('#uinot').val() === 'N') {
      $('#uinoth').removeClass('is-invalid');
    }
  });
  $('#usurg').change(function() {
    if ($('#usurg').val() === 'N') {
      $('#udos').removeClass('is-invalid');
      $('#utos').removeClass('is-invalid');
    }
  });


  // Submit the update data if the form is valid
  $('#fmupdate').submit(function(e) {
    e.preventDefault();

    if ($('#fmupdate').valid()) {
      $.ajax({
        url: "{{ route('update.data') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response) {
          // Handle the success response
          $('#modal_edit').modal('hide');
          if (response.success) {
            toastr.success(response.message);
          }
        },
        error: function(xhr) {
          // Handle the error response
          var errors = xhr.responseJSON.errors;
          toastr.error(errors);
        }
      });
    }
  });

  
  $('.btn_del').click(function (e) {
    console.log('buttons clicked'); 
    e.preventDefault();
    let id = $(this).val();
    // Set the form action URL with the patient ID
    $('#fmdel').attr('action', '/dashboard/' + id);
    $('#modal_del').modal('show');
    $('#patient_id').val(id);
  });

  //Submit the delete data
  $('#fmdel').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'), // Get the action URL from the form
        type: "POST",
        data: $(this).serialize(), // Serialize the form data
        success: function(response) {
            // Handle the success response
            $('#modal_del').modal('hide');
            if (response.success) {
                toastr.success(response.message);
            }
        },
        error: function(xhr) {
            toastr.error('Error deleting. Please try again!');
        }
    }); 
  });

});

</script>
@stop
@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
@section('plugins.Jquery-validation', true)
@section('plugins.datatables-plugins', true)


