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
    $sex = ['male','female'];
@endphp
<div class="modal fade" id="modal-xl" style="display: none;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header bg-rainbow">
    <h4 class="modal-title">Add New</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
    <div class="modal-body">
    <form action="/dashboard" method="POST" id="fmdata">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
        <label>Patient ID</label>
        <input type="text" class="form-control" id="pid" name="pid">
        </div>
        <div class="form-group col-md-4">
        <label>DOB</label>
        <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group col-md-4">
            <label>Sex</label>
            <select name="sex" id="sex" class="form-control">
                <option selected="selected"></option>
                @foreach ($sex as $sexs)
                <option value="{{ $sexs }}">{{ $sexs }}</option>
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
                        <th scope="col">id</th>
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
                    @for ($i = 1; $i < 50; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>413</td>
                        <td>2023-006964</td>
                        <td>2018-08-22 00:00:00</td>
                        <td>M</td>
                        <td>Phnom Penh</td>
                        <td>2023-04-03(17:30)</td>
                        <td>2023-07-27(05:00)</td>
                        <td>PICU</td>
                        <td>N</td>
                        <td>Severe pneumonia, invasive fungal infection</td>
                        <td>Y</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>ALL</td>
                        <td>         
                        <a href="#" class="btn btn-outline-primary btn-sm mt-2" title="View"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-outline-success btn-sm mt-2" title="Edit"><i class="fas fa-edit"></i></button>
                       <form action="/" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm mt-2" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                        </td>
                    </tr>
                    @endfor
                    
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
<script>
    
  $(function () {
    $('#tblData').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
  });
$(document).ready(function() {
    $('#fmdata').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('store.data') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                // Handle the success response
                $('#fmdata')[0].reset();
                $('#modal-xl').modal('hide');
                alert(response.message);
            },
            error: function(xhr) {
                // Handle the error response
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    alert(value[0]);
                });
            }
        });
    });
});

</script>
@stop
@section('plugins.Datatables', true)