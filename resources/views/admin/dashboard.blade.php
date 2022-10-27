@extends('layouts.admin')

@section('title')
الرئيسية
@endsection


@section('contentheader')
الرئيسية
@endsection


@section('contentheaderlink')
<a href="{{ route('admin.dashboard') }}">الرئيسية</a>
@endsection


@section('contentheaderactive')
عرض
@endsection


@section('content')
<div class="row"
    style="background-image: url({{ asset('assets/admin/img/back.jpg')}}); background-size:cover;background-repeate:in-repeate;min-height:600px ">
</div>
@endsection