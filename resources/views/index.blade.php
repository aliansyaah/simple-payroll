@extends('layouts.master')
@section('title', 'Laravel')
@section('content')
<div class="section-body">
    {{-- 
        Insert component 
        Atribut "type" akan dikirim ke Alert.php
    --}}
    <x-alert type="success" title="Information" :content="$alert_content" />
    {{-- <x-alert type="success" title="Information" content="{{ $alert_content }}" /> --}}

    {{-- Ini isi content <br> --}}
    {{-- Halo {{ Auth::user()->name }} <br>
    Email Anda {{ Auth::user()->email }} --}}
</div>
@endsection

{{-- @push('page-scripts')

@endpush --}}