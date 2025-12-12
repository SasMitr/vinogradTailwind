<li class="menu nav-item">
    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === '{{$section}}'}" @click="activeMenu === '{{$section}}' ? activeMenu = null : activeMenu = '{{$section}}'">
        <div class="flex items-center">
            @if($icon = $menu->icon($section))
                {!! $icon !!}
            @else
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
            </svg>
            @endif
            <span class="pl-1.5">{{$name}}</span>
        </div>
        <div class="flex items-center">
            {!! $menu->badges->badgeSection($items) !!}
            <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === '{{$section}}'}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                    <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    </a>
    <ul x-cloak x-show="activeMenu === '{{$section}}'" x-collapse class="sub-menu flex flex-col gap-1">
        @foreach($items as $name => $url)
            <li class="flex items-center">
                <a href="{{$url}}" class="@if($menu->isActive($url)) active @endif">{{$name}}</a>
                @if($menu->badges->exists($url))
                    {!! $menu->badges->badge($url) !!}
                @endif
            </li>
        @endforeach
    </ul>
</li>
