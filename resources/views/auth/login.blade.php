@extends('auth._layout')

@section('title', 'Вход на сайт' . config('app.name'))
@section('key', '')
@section('desc', '')

@section('auth-title', 'Вход на сайт')

@section('auth-content')
    @include('auth.partials._login-form')
@endsection
