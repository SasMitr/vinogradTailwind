@extends('admin.layouts.base')

@section('title', 'Заказы - Админка')

@section('content')
    <div class="mb-5" x-data="{ current: null }">
        <div class="border border-gray-300 overflow-hidden">
            <button type="button" class="p-4 w-full flex items-center text-gray bg-gray-100 !text-dark"
                    :class="{'text-gray-800' : current === 1}"
                    x-on:click="current === 1 ? current = null : current = 1">
                Поиск и сортировка
                <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 1}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                        <path fill="currentColor"
                              d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                    </svg>
                </div>
            </button>
            <div x-show="current === 1" x-collapse="">
                <div class="space-y-2 p-4 text-lightgray text-sm font-normal border-t-2 border-gray-300">
                    <form class="mt-5 grid grid-cols-1 sm:grid-cols-4 gap-5" action="?" method="GET">
                        <input type="text" class="form-input pl-2 h-14 placeholder:text-dark" name="id" autocomplete="off"
                               placeholder="№ Заказа">
{{--                        <x-admin.forms.input--}}
{{--                            name="id"--}}
{{--                            title='№ Заказа'--}}
{{--                            value=""--}}
{{--                            autocomplete="off"--}}
{{--                        />--}}
                        <input type="text" class="form-input pl-2 h-14 placeholder:text-dark" placeholder="Email"
                               name="email">
                        <input type="text" class="form-input pl-2 h-14 placeholder:text-dark" placeholder="Телефон"
                               name="phone" autocomplete="off">
                        <label>
                            <input type="text" class="search-date-build form-input pl-2 h-14 placeholder:text-dark" placeholder="Дата"
                                   autocomplete="off" name="build">
                            <div class="mt-5">
                                <button type="submit"
                                        class="py-2 px-3 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white">
                                    Найти
                                </button>
                            </div>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-auto border border-gray-300">

        <div class="flex justify-between m-2">
            <div class="flex items-center">
                <h4 class="px-4">Показать заказы:</h4>
                <div x-data="{ dropdown: false}" class="dropdown">
                    <button @class([
                                'px-3 py-2 flex items-center justify-center gap-1.5 cursor-pointer hover:underline',
                                'text-'. statusColor(request('status')) .'-400' => request('status'),
                                'text-gray-400' => !request('status'),
                            ]) @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                        @if(request('status'))
                            {{statusList()[request('status')]}}
                        @else
                            Все
                        @endif

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path
                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms=""
                        class="right-0 whitespace-nowrap">
                        @foreach(statusList() as $status => $name)
                            <li>
                                <a href="{{route('admin.orders.index', ['status' => $status])}}"
                                   class="text-{{statusColor($status)}}-400 flex justify-between">
                                    <span>{{$name}}</span>
                                    @isset($quantity_orders[$status])
                                        <span class="ml-5">{{$quantity_orders[$status]}}</span>
                                    @endisset
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="#" class="flex p-2.5 text-green-400 transition-all duration-300 hover:text-green-600 hover:underline">+ Новый</a>
                <a href="#" class="flex p-2.5 text-yellow-400 transition-all duration-300 hover:text-yellow-600 hover:underline">+ Предварительный</a>
            </div>
        </div>

        <table class="min-w-[640px] bg-white product-table table-striped">
            <thead>
            <tr class="text-left">
                <th>№</th>
                <th>Доставка</th>
                <th>Создан</th>
                <th>Стоимость</th>
                <th>Заказчик</th>
                <th>Примечание</th>
                <th>Статус/Дата</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)

                <tr>
                    <td>
                        {{$order->id}}
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
                    <td>
                        <div class="">{{$order->delivery['method_name']}}</div>
                    </td>
                    <td>
                        <div class="">{{getRusDate($order->created_at)}}</div>
                    </td>
                    <td>
                        {{$order->cost}}
                        @if(!$order->isPickup())
                            <br>{{$order->getTotalCost() }}
                        @endif
                    </td>
                    <td>
                        <div class="">{{$order->customer['name']}}</div>
                    </td>
                    <td class="admin_note" data-url="{{route('admin.orders.ajax.admin-note', $order)}}" style="padding: 0">
                        {{$order->admin_note}}
                    </td>

                    <td style="min-width: 200px">
                        @include('admin.shop.order.partials.status_select')
                    </td>
                    <td>
                        <div class="flex items-center justify-center">
                            @if(!$order->isCompleted())
                                @if($order->isPreliminsry())
                                    <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white"
                                       href="#" role="button">
                                        1
                                    </a>
                                @else
                                    <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white"
                                       href="#" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                             height="16" class="main-grid-item-icon" fill="none" stroke="currentColor"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                    </a>
                                @endif
                            @endif
                            <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white"
                               href="{{route('admin.orders.order', $order)}}" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                                     class="main-grid-item-icon" fill="none" stroke="currentColor"
                                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </a>
                            @if($order->isSent() && $order->isTrackCode() && !$order->isBoxberrySent())
                                <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white"
                                   href="#" role="button" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                                         class="main-grid-item-icon" fill="none" stroke="currentColor"
                                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <rect height="13" width="15" x="1" y="3"/>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                                        <circle cx="5.5" cy="18.5" r="2.5"/>
                                        <circle cx="18.5" cy="18.5" r="2.5"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            @if(request('build'))
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-info print">
                            Распечатать
                            {{--                                    <i class="fa fa-print"></i>--}}
                            {{--                                    {{request('build')}}--}}
                        </button>
                    </td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    {{$orders->onEachSide(1)->links('admin.components.pagination.tailwind')}}
@endsection

@section('style')
    <link rel="stylesheet" href="/css/datepicker/air-datepicker.css">
@endsection

@section('scripts')
    <script src="/js/datepicker/air-datepicker.js"></script>

    <script>
        let pickers = document.querySelectorAll('.date-build');
        pickers.forEach(picker => {
            let item = new AirDatepicker(picker, {
                buttons: ['clear'],
                onSelect ({}) {
                    picker.dispatchEvent(new Event('change',{bubbles:true,cancelable: true}));
                    item.hide();
                }
            });
        });

        new AirDatepicker('.search-date-build', {
            autoClose: true
        });
    </script>
@endsection
