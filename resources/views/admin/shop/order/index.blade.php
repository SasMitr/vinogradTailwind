@extends('admin.layouts.base')

@section('title', 'Заказы - Админка')

@section('content')
        <div class="mb-5" x-data="{ current: null }">
            <div class="border overflow-hidden">
                <button type="button" class="p-4 w-full flex items-center text-gray bg-gray-100 !text-dark" :class="{'text-gray-800' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                    Поиск и сортировка
                    <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 1}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                        </svg>
                    </div>
                </button>
                <div x-show="current === 1" x-collapse="">
                    <div class="space-y-2 p-4 text-lightgray text-sm font-normal border-t-2">
                        <form class="mt-5 grid grid-cols-1 sm:grid-cols-4 gap-5" action="?" method="GET">
                            <input type="text" class="form-input h-14 placeholder:text-dark" name="id" autocomplete="off" placeholder="№ Заказа">
                            <input type="text" class="form-input h-14 placeholder:text-dark" placeholder="Email" name="email">
                            <input type="text" class="form-input h-14 placeholder:text-dark" placeholder="Телефон" name="phone" autocomplete="off">
                            <label>
                                <input type="date" class="form-input h-14 placeholder:text-dark" placeholder="Дата" autocomplete="off" name="build">
                                <div class="mt-5">
                                    <button type="submit" class="py-2 px-3 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white">Найти</button>
                                </div>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-auto border">

            <div class="flex justify-between mt-5">
                <div class="flex items-center">
                    <h4 class="px-4">Показать заказы:</h4>
                    <div x-data="{ dropdown: false}" class="dropdown">
                        <button @class([
                                'px-3 py-2 border border-sky-500 flex items-center justify-center gap-1.5',
                                'text-'. statusColor(request('status')) .'-400' => request('status'),
                                'text-gray-400' => !request('status'),
                            ]) @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                            @if(request('status'))
                                {{statusList()[request('status')]}}
                            @else
                                Все
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                            @foreach(statusList() as $status => $name)
                            <li>
                                <a href="{{route('admin.order.index', ['status' => $status])}}" class="text-{{statusColor($status)}}-400 ">
                                    {{$name}}
                                    {{--                                @if($quantity_orders[$status])--}}
                                    {{--                                    <span class="badge badge-light">{{$quantity_orders[$status]}}</span>--}}
                                    {{--                                @endif--}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="">
                    <h4>Создать заказ:</h4>
                    <a href="#" class="p-2.5 text-blue-400 transition-all duration-300 hover:bg-blue-300 hover:text-white">Новый</a>
                    <a href="#" class="p-2.5 text-blue-400 transition-all duration-300 hover:bg-blue-300 hover:text-white">Предварительный</a>
                </div>
            </div>

            <table class="min-w-[640px] product-table table-striped">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                      <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                            @endif
                        </td>
                        <td><div class="text-wrap w-full">{{$order->delivery['method_name']}}</div></td>
                        <td><div class="text-wrap w-full">{{getRusDate($order->created_at)}}</div></td>
                        <td>
                            {{$order->cost}} бел. руб
                            @if($order->currency !== 'BYN')
                                <br>
                                {{mailCurr($currency[$order->currency], $order->getTotalCost()) }} {{ $currency[$order->currency]->sign}}
                            @endif
                        </td>
                        <td><div class="text-wrap w-full">{{$order->customer['name']}}</div></td>

                        <td data-name="admin_note" data-order_id="{{$order->id}}">
                            <div class="text-wrap w-full">{{$order->admin_note}}</div>
                        </td>

                        <td style="min-width: 200px">
                            @if($statusesList[$order->id])
                                <label class="flex mb-1 w-60">
                                    <div class="flex items-center justify-center border-r-0 border border-gray-300 bg-gray-100">
                                        <span class="text-nowrap">{!! $order->statuses->name($order->current_status) !!}</span>
                                    </div>
                                    <select name="status" class="text-sm w-full border-gray-300" id="">
                                        <option selected disabled hidden value="">Изменить</option>
                                        @foreach($statusesList[$order->id] as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <div class="flex items-center justify-center border-l-0 border border-gray-300 bg-gray-100">
                                        <button type="submit" class="p-2.5 text-blue-400 transition-all duration-300 hover:bg-blue-300 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <polyline points="23 4 23 10 17 10"></polyline>
                                                <polyline points="1 20 1 14 7 14"></polyline>
                                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </label>

                                @if($order->isAllowedDateBuild())
                                    <label class="flex">
                                        <div @class([
                                                'flex items-center border border-gray-300 border-r-0 justify-center text-gray-500 px-3.5',
                                                'bg-warning' => $order->isDateBuild()
                                            ])>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                  <rect height="18" rx="2" ry="2" width="18" x="3" y="4" />
                                                  <line x1="16" x2="16" y1="2" y2="6" />
                                                  <line x1="8" x2="8" y1="2" y2="6" />
                                                  <line x1="3" x2="21" y1="10" y2="10" />
                                                </svg>
                                            </span>
                                        </div>
                                        <input value="{{$order->getDateBuild()}}" data-build="build" data-order_id="{{$order->id}}" class="h-9 w-full border border-gray-300" type="text">
                                    </label>



{{--                                    <div class="form-group mb-0">--}}
{{--                                        <div class="input-group input-group-sm">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <span @class([--}}
{{--                                                    'input-group-text',--}}
{{--                                                    'bg-warning' => $order->isDateBuild()--}}
{{--                                                ])>--}}
{{--                                                <i class="fa fa-calendar"></i>--}}
{{--                                              </span>--}}
{{--                                            </div>--}}
{{--                                            <input value="{{$order->getDateBuild()}}" class="form-control float-right" data-build="build" data-order_id="{{$order->id}}" name="" type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endif
                            @else
                                {!! $order->statuses->name($order->current_status) !!}
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center justify-center">
                                @if(!$order->isCompleted())
                                    @if($order->isPreliminsry())
                                        <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white" href="#" role="button">
                                            1
                                        </a>
                                    @else
                                        <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white" href="#" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </a>
                                    @endif
                                @endif
                                <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white" href="#" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </a>
                                @if($order->isSent() && $order->isTrackCode() && !$order->isBoxberrySent())
                                    <a class="p-2.5 mr-1 border text-blue-400 border-blue-400 transition-all duration-300 hover:bg-blue-400 hover:text-white" href="#" role="button" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <rect height="13" width="15" x="1" y="3" />
                                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                                            <circle cx="5.5" cy="18.5" r="2.5" />
                                            <circle cx="18.5" cy="18.5" r="2.5" />
                                        </svg>
                                    </a>
                                @endif
                                {{--                                    {{Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'delete'])}}--}}
                                {{--                                    <button onclick="return confirm('Подтвердите удаление заказа!')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-remove"></i></button>--}}
                                {{--                                    {{Form::close()}}--}}
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
        {{$orders->links()}}
@endsection
