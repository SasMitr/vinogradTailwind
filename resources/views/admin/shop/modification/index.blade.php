@extends('admin.layouts.base')

@section('title', 'Admin | Добавить модификацию к продукту')

@section('content')

    <div class="overflow-auto">
        <div class="">
{{--            open-modal--}}
            <a href="{{route('admin.modification.create.form')}}" class="open-modal inline-block p-2 border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <line x1="12" x2="12" y1="5" y2="19"></line>
                    <line x1="5" x2="19" y1="12" y2="12"></line>
                </svg>
            </a>
        </div>
        <table class="table-striped" id="myTable">
            <thead>
            <tr class="text-left">
                <th>ID</th>
                <th>Название</th>
                <th>Вес</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($modifications as $modification)
                <tr id="row_{{$modification->id}}">
                    @include('admin.shop.modification.partials._tr', $modification)
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

@endsection
