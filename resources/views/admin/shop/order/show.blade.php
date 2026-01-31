@extends('admin.layouts.base')

@section('title', 'Заказ № ' . $order->id)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">
    <div class="lg:col-span-2">
        <div class="bg-white border border-gray-300 p-5">
            <div class="flex justify-between items-center mb-5">
                <div class="space-y-1">
                    <p class="font-bold flex">
                        @if($order->isCreatedByAdmin())
                            <span class="text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                  <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                        @endif
                        <span>Заказ № {{$order->id}}</span>
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">

                    <button type="button"
                            class="w-10 h-10 flex items-center justify-center text-green-500 transition-all duration-300 hover:text-white hover:bg-green-500 bg-green-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v8.25A2.25 2.25 0 0 0 6 16.5h2.25m8.25-8.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-7.5A2.25 2.25 0 0 1 8.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 0 0-2.25 2.25v6" />
                        </svg>

                    </button>
                    <button type="button"
                            class="w-10 h-10 flex items-center justify-center text-yellow-500 transition-all duration-300 hover:text-white hover:bg-yellow-500 bg-yellow-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                        </svg>

                    </button>
                    <form method="POST" action="#" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="Zx93jxGc1RtktBLkkmUOIbymUvvBwtWigTAcmaCz">
                        <button type="button"
                                class="w-10 h-10 flex items-center justify-center text-red-500 transition-all duration-300 hover:text-white hover:bg-red-500 bg-red-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </button>
                    </form>
                </div>
            </div>
            @if($order->note)
                <div class="p-4 mx-[-20] border-b border-t border-gray-300 bg-gray-100">
                    <h5>Примечание к заказу:</h5>
                    <p class="text-gray-500 font-normal">{{$order->note}}</p>
                </div>
            @endif
            <div class="mt-5 grid grid-cols-1 xl:grid-cols-2 gap-5">
                <div>
                    <div class="space-y-2 mt-4">
                        <p>{{$order->customer['name']}}</p>
                        <p class="text-gray-500 font-normal flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>

                            {{formatPhone($order->customer['phone'])}}
                        </p>
                        @if(isset($order->customer['other_phone']) AND $order->customer['other_phone'])
                            <p class="text-gray-500 font-normal flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>

                                {{formatPhone($order->customer['other_phone'])}}
                            </p>
                        @endif
                        <p class="text-gray-500 font-normal flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            {{$order->customer['email']}}
                        </p>
                        <p class="text-gray-500 font-normal flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>
                            {{$order->delivery['index']}} {{$order->delivery['address']}}

                        </p>
{{--                                <p class="text-gray-500 font-normal">--}}
{{--                                    {{$order->delivery['address']}}--}}
{{--                                </p>--}}
                    </div>
                </div>
                <div>
                    <div class="space-y-2 mt-4">
                        <p>Создан: <span class="text-gray-500 font-normal">{{getRusDate($order->created_at)}}</span> </p>
                        <p>Закрыт: <span class="text-gray-500 font-normal">{{$order->completed_at}}</span> </p>
                    </div>
                </div>
            </div>
            <div class="mt-10" id="order-table">
                @include('admin.shop.order.partials.order-table')
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-2 border border-gray-300">
        <div class="bg-white">
            <div class=" border-b border-gray-300 p-5">
                <h3>Примечание</h3>
            </div>
            <div class="admin_note border-b border-gray-300 p-5 cursor-pointer text-gray-500 font-normal" data-url="{{route('admin.orders.ajax.admin-note', $order)}}">
                {{$order->admin_note}}
            </div>
        </div>
        <div class="statuses bg-white">
            <div class=" border-b border-gray-300 p-5">
                <h3>Текущий статус</h3>
            </div>
            <div class="border-b border-gray-300 p-5">
                @include('admin.shop.order.partials.status_select')
            </div>
            <div class=" border-b border-gray-300 p-5">
                <h3>История статусов</h3>
            </div>
            <div class="status-history border-b border-gray-300 p-5">
                @include('admin.shop.order.partials.status_history')
            </div>
        </div>
        @if($order->track_code)
            @include('admin.shop.order.partials.track_code')
        @endif
        <div class="bg-white">
            <div class="border-b border-gray-300 p-5">
                <h3>Валюта</h3>
            </div>
            <div class="border-b border-gray-300 p-5 text-gray-500 font-normal">
{{--                            <h4 class="font-semibold text-dark dark:text-white">{{$currencys[$order->currency]}}</h4>--}}
                    <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                        <a href="javaScript:;" class="h-3 items-center" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                            {{$order->cost->currencyList()[$order->currency]}}
                        </a>
                        <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="left-0 whitespace-nowrap" style="display: none;">
                            @foreach($order->cost->currencyList() as $sign => $name)
                                @continue($order->currency == $sign)
                                <li><a class="update-currency" href="{{route('admin.orders.ajax.currency', $order)}}" data-currency="{{$sign}}">{{$name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
@if($other_orders)
    <div class="grid grid-cols-1 bg-white border border-gray-300 mb-5" x-data="{ current: null }">
        <button type="button" class="p-4 w-full flex items-center text-gray-500 bg-white" :class="{'text-gray-800' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
            Предыдущие заказы: {{$other_orders->count()}}
            <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 1}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                    <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                </svg>
            </div>
        </button>
        <div x-show="current === 1" x-collapse="" style="height: auto;" class="overflow-auto">
{{--                <div class="overflow-auto">--}}
                    <table class="min-w-[640px]">
                        <tbody>
                        @foreach($other_orders as $other_order)
                            <tr>
                                <td>
                                    {{$other_order->id}}
                                    @if($order->isCreatedByAdmin())
                                        <span class="text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                                 class="main-grid-item-icon" fill="none" stroke="currentColor"
                                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                              <polyline points="20 6 9 17 4 12"/>
                                            </svg>
                                        </span>
                                    @endif
                                </td>
                                <td>{{$other_order->delivery['method_name']}}</td>
                                <td>{{getRusDate($other_order->created_at)}}</td>
                                <td> {{$other_order->cost}}</td>
                                <td>{{$other_order->customer['name']}}</td>
                                <td>{{$other_order->admin_note}}</td>
                                <td>{!! $other_order->statuses->name($other_order->current_status) !!}</td>
                                <td>
                                    <div class="btn-group" id="nav">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{route('admin.orders.order', $other_order)}}" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>

                                        </a>
                                        @if($other_order->isNew() AND $order->isNew())
                                            <a class="btn" href="#">
{{--                                            <a class="btn" href="{{route('orders.merge', ['order_id' => $order->id, 'merge_order_id' => $other_order->id])}}">--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                                                </svg>

                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                </div>--}}
        </div>
</div>
@endif

@endsection

@section('style')
    <link rel="stylesheet" href="/css/datepicker/air-datepicker.css">
    <link rel="stylesheet" href="/css/datatable.css">
@endsection

@section('scripts')
    <script src="/js/datepicker/air-datepicker.js"></script>
    <script src="/js/simple-datatables.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {

            //  Генерируем событие 'change' для ДатаПикера
            let picker = document.querySelector('.date-build');
            let item = new AirDatepicker(picker, {
                buttons: ['clear'],
                onSelect({}) {
                    picker.dispatchEvent(new Event('change', {bubbles: true, cancelable: true}));
                    item.hide();
                }
            });

        });
    </script>
@endsection

