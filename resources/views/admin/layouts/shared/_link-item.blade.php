@if(gettype($items) == 'string')
    <li class="menu nav-item">
        <a href="{{$items}}" class="nav-link group justify-between" :class="{'active' : activeMenu === '{{$section}}'}">
            <div class="flex items-center">
                @if($icon = $menu->icon($section))
                    {!! $icon !!}
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                @endif
                <span class="pl-1.5">{{$name}}</span>
            </div>

            @if($menu->badges->exists($items))
                <div class="flex items-center text-xs">
                    {!! $menu->badges->badge($items) !!}
                </div>
            @endif
        </a>
    </li>
@else
    @include('admin.layouts.shared._dropdown-item')
@endif
