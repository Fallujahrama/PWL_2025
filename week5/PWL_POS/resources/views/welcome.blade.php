@extends('layout.app')

{{-- customise layout --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- content body --}}

@section('content_body')
    <p>Welcome to admin panel</p>
@stop

{{-- push extra css --}}

@push('css')
    {{-- add your extra css here --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- push extra scripts --}}

@push('js')
    <script>console.log("Hallo, saya menggunakan laravel adminlte Package");</script>
@endpush