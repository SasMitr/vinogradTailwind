@extends('admin.layouts.base')

@section('title', 'Админка: Юзеры')

@section('content')
    <div class="overflow-auto">
        <table class="border-collapse border border-gray-300 w-full product-table">
            <thead>
            <tr class="text-left">
                <th class="border-b border-b-gray-300">ID</th>
                <th class="border-b border-b-gray-300">Имя</th>
                <th class="border-b border-b-gray-300">Email</th>
                <th class="border-b border-b-gray-300">Адрес</th>
                <th class="border-b border-b-gray-300">Статус</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr id="row_{{$user->id}}">
                    @include('admin.shop.user.partials._tr')
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
    <div class="mb-10">
        {{ $users->onEachSide(1)->links('admin.components.pagination.tailwind') }}
    </div>

@endsection
