<nav class="sidebar fixed z-50 flex-none w-[226px] transition-all duration-300">
    <div class="bg-gray-950 h-full">
        <div class="p-3.5">
            <a href="{{route('shop.home')}}">
                <img src="{{Storage::url('admin/images/logo/logo.svg')}}" class="h-8 mx-auto" alt="">
            </a>
        </div>
        <div class="flex items-center gap-2.5 py-2.5 pe-2.5">
            <div class="h-[2px] bg-gray-600 block flex-1"></div>
            <button type="button" class="shrink-0 text-white btn-toggle hover:text-sky-500 duration-300" @click="$store.app.toggleSidebar()">
                <svg class="w-3.5" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z" fill="currentColor" />
                    <path d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z" fill="currentColor" />
                </svg>
            </button>
        </div>

        <div class="h-[calc(100vh-93px)] overflow-y-auto overflow-x-hidden space-y-16 px-4 pt-2 pb-4">
            <ul class="relative flex flex-col gap-1 text-sm" x-data="{ activeMenu: '{{$adminSidebar->getActiveRazdel()}}' }">
                {!! $adminSidebar->menuHTML() !!}
            </ul>
        </div>
    </div>
</nav>
