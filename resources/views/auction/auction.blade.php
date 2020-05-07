@extends('default')

@section('title','Đấu giá thôi')

@section('addlib')
<script src="js\\auction.js"></script>
@endsection

@section('header')
    @include('auction/header')
@endsection

@section('content')
    @include('auction/content')
@endsection

@section('main')
    @include('auction/main')
@endsection

@section('footer')
    @include('user_frontend/footer')
@endsection