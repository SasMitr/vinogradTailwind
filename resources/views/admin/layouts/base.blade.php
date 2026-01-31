<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{Storage::url('pics/img/logo/admin-favicon.ico')}}">

    @yield('style')

    {{ Vite::useBuildDirectory('/build/admin') }}
    @vite(['resources/admin/css/app.css', 'resources/admin/js/app.js'])
</head>

<body x-data="main" class="font-inter text-base antialiased font-medium relative vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">

    <div x-cloak class="fixed inset-0 bg-dark/90 backdrop-blur-sm z-40 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

    <div class="main-container flex mx-auto">

        @include('admin.layouts.shared.sidebar')

        <div class="main-content bg-gray-100 flex-1 min-h-screen">
            <div class="h-[60px] bg-white  justify-between border-b-2 border-gray-300 flex items-center gap-2.5 px-7">
                <div class="flex-auto flex items-center gap-2.5">
                    <div class="lg:hidden">
                        <button type="button" class="hover:text-primary" @click="$store.app.toggleSidebar()">
                            <svg width="13" height="12" class="rotate-180" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2" d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z" fill="currentColor" />
                                <path d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z" fill="currentColor" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
            @include('admin.layouts._errors')
            <div class="p-5" id="admin-content">
                @yield('content')
            </div>
        </div>
    </div>

@include('admin.layouts.shared._toastr')

@yield('scripts')

</body>
</html>
