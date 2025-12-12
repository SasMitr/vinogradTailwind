@extends('auth._layout')

@section('title', 'Подтвердить Email')
@section('key', '')
@section('desc', '')

@section('auth-title', 'Подтвердить Email')

@section('auth-content')
    @include('auth.partials._verify-email')
@endsection
