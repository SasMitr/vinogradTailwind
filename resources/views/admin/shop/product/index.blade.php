@extends('admin.layouts.base')

@section('title', 'Каталог - Админка')

@section('content')
    <div class="p-2 text-2xl">
        @if (request('status') === null)
            <h2>Показаны все сорта из каталога</h2>
        @elseif (request('status') == 1)
            <h2>Показаны <span class="px-2 bg-green-400">только активные</span> сорта</h2>
        @elseif (request('status') == 0)
            <h2>Показаны <span class="px-2 bg-yellow-400">только не активные</span> сорта</h2>
        @endif
    </div>


    <div class="flex justify-between">
        <div class="">
            <a href="{{route('admin.product.index')}}" class="inline-block p-2 border text-gray-400 border-gray-300 transition-all duration-300 hover:bg-gray-300 hover:text-white">Все</a>
            <a href="{{route('admin.product.index',['status' => 1])}}" class="inline-block p-2 border text-green-400 border-green-300 transition-all duration-300 hover:bg-green-300 hover:text-white">Активные</a>
            <a href="{{route('admin.product.index',['status' => 0])}}" class="inline-block p-2 border text-yellow-400 border-yellow-300 transition-all duration-300 hover:bg-yellow-300 hover:text-white">Не активные</a>
        </div>

        {{--                    <a href="{{route('show_by_status', ['status' => 7])}}" class="btn btn-danger btn-sm">Удаленные</a>--}}
        <div class="">
            <a href="{{route('admin.product.create.show')}}" class="open-modal inline-block p-2 border text-blue-400 border-blue-300 transition-all duration-300 hover:bg-blue-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <line x1="12" x2="12" y1="5" y2="19" />
                    <line x1="5" x2="19" y1="12" y2="12" />
                </svg>
            </a>
        </div>
    </div>

    <div class="overflow-auto">
        <table class="border-collapse border w-full product-table" id="myTable">
            <thead>
            <tr class="text-left">
                <th class="border-b">ID</th>
                <th class="border-b">Название</th>
                <th class="border-b">Категория</th>
                <th class="border-b flex justify-between items-center">
                    <span>Цены и количество</span>
                    <a href="{{route('admin.product.reset.catalog')}}" onclick="return confirm('Подтвердите обнуление базы!')" class="py-0.5 px-2 border text-red-400 border-red-400 transition-all duration-300 hover:bg-red-400 hover:text-white" role="button">Обнулить</a>
                </th>
                <th class="border-b">Картинка</th>
                <th class="border-b">Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr id="row_{{$product->id}}">
                    @include('admin.shop.product.partials._tr')
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
    {{$products->links()}}

@endsection

@section('style')
    <link rel="stylesheet" href="/css/choices.min.css">
    <link rel="stylesheet" href="/css/datatable.css">
@endsection

@section('scripts')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/choices.min.js"></script>
    <script src="/js/simple-datatables.js"></script>

    <script>
            new simpleDatatables.DataTable('#myTable', {
                searchable: true,
                perPage: 20,
                perPageSelect: [20, 40, 60, ["Все", -1]],
                fixedColumns: false,
                columns: [
                    {
                        select: 1,
                        sort: "asc"
                    },
                    {
                        select: 3,
                        sortable: false,
                    },
                    {
                        select: 4,
                        sortable: false,
                    },
                    {
                        select: 5,
                        sortable: false,
                    }
                ],
                labels: {
                    placeholder: "Поиск...",
                    perPage: "",
                    info: "",
                    noResults: "Ничего не найдено",
                }
            });

    </script>
@endsection
