@extends('auth._layout')

@section('title', 'Сброс пароля')
@section('key', '')
@section('desc', '')

@section('auth-title', 'Сброс пароля')

@section('auth-content')
    @include('auth.partials._forgot-password-form')
@endsection
