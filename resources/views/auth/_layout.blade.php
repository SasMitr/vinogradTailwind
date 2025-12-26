@extends('web.layouts.base')

@section('content')
    <section class="md:h-screen py-36 flex items-center bg-orange-500/10 dark:bg-orange-500/20 bg-[url('../../assets/images/hero/bg-shape.png')] bg-center bg-no-repeat bg-cover">
{{--        <div class="container relative">--}}

            <div class="grid grid-cols-1 mx-2">
                <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                    <div class="grid md:grid-cols-2 grid-cols-1 items-center h-1/2">
                        <div class="relative md:shrink-0">
                            <img class="w-full object-cover md:h-[34rem]" src="{{Storage::url('pics/img/login.jpg')}}" alt="">
                        </div>

                        <div class="p-8 lg:px-20">
{{--                            <x-auth-session-status class="p-4 border border-red-400" :status="session('status')" />--}}
                            <div class="text-center mb-5">
                                <h2 class="text-lg">@yield('auth-title')</h2>
                            </div>
                            @yield('auth-content')
                        </div>
                    </div>
                </div>
            </div>
{{--        </div>--}}
    </section>
@endsection
