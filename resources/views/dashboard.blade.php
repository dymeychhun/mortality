@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
{{-- Add Modal --}}
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
    <p>One fine body…</p>
    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-outline-success">Save</button>
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

</script>
@stop
@section('plugins.Datatables', true)