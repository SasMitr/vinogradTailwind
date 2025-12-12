@extends('auth._layout')

@section('title', 'Регистрация на сайте' . config('app.name'))
@section('key', '')
@section('desc', '')

@section('auth-title', 'Зарегистрироваться')

@section('auth-content')
    @include('auth.partials._register-form')
@endsection
