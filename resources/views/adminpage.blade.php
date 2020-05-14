@extends('default')

@section('title','Admin Pornhub of VietNamese')
<!-- thêm thư viện -->
@section('addlib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bin\\bootstrap441\\css\\bootstrap.min.css">
    <script src="bin\\jquery341\\jquery.min.js"></script>
    <script src="bin\\bootstrap441\\js\\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\\admin.js"></script>
@endsection

@section('main')
@include('admin_frontend/main')
@endsection