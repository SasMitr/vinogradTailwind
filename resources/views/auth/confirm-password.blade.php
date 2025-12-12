@extends('auth._layout')

@section('title', 'Подтвердить пароль')
@section('key', '')
@section('desc', '')

@section('auth-title', 'Подтвердить пароль')

@section('auth-content')
    @include('auth.partials._confirm-password-form')
@endsection
