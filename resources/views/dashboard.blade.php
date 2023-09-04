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
<div class="modal fade" id="modal-xl" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Add New</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="/dashboard" method="POST" id="fmdata" novalidate="novalidate">
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
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-xl"><i class="fas fa-plus-circle"></i> Create New</button>
            </div>
        </div>
        <div class="card-body">
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
                <tbody>
                    @foreach($patient_info as $i => $patient)
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
                        <button class="btn btn-outline-success btn-sm mt-2" title="Edit" id="edit"><i class="fas fa-edit"></i></button>
                       <form action="/" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm mt-2" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
<script>
$(document).ready(function() {

    // DataTables Javascript
    $('#tblData').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    // SweetAlert2
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

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
          $('#modal-xl').modal('hide');
          if (response.success) {
            Toast.fire({
            icon: 'success',
            title: response.message,
            });
          }
        },
        error: function(xhr) {
          // Handle the error response
          var errors = xhr.responseJSON.errors;
        }
      });
    }
  });
});

</script>
@stop
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Jquery-validation', true)

