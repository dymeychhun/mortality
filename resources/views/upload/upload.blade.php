@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   <!-- upload.blade.php -->
<form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="form-control">
    <button type="submit">Upload</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
<script></script>
@stop