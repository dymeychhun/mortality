@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>   
@endif

<div class="card">
    <div class="card-header">
        <h5>Import Data from Excel file</h5>
    </div>
<div class="card-body">
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file">
              <label class="custom-file-label">Choose file</label>
            </div>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="sumbit" id="btnUpload">Upload</button>
            </div>
          </div>
    </form>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
<script></script>
@stop