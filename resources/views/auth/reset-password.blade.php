@extends('auth._layout')

@section('title', 'Сброс пароля/' . config('app.name'))
@section('key', '')
@section('desc', '')

@section('auth-title', 'Сброс пароля')

@section('auth-content')
    @include('auth.partials._reset-password-form')
@endsection
