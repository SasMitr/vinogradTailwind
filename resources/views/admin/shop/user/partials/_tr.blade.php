<td class="border-b border-b-gray-300">{{$user->id}}</td>
<td class="border-b border-b-gray-300">
    <div class="text-wrap">{{$user->name}}</div>
</td>
<td class="border-b border-b-gray-300">
    <div class="text-wrap">{{$user->email}}</div>
</td>
<td class="border-b border-b-gray-300">
    @if($user->delivery)
    <div class="text-wrap">
        ФИО: {{$user->delivery['first_name']}}<br>
        Индекс:{{$user->delivery['index']}}<br>
        Адрес: {{$user->delivery['address']}}<br>
        Тел: {{$user->delivery['phone']}}<br>
    </div>
    @endif
</td>
<td class="border-b border-b-gray-300">
{{--    <x-admin.forms.badge :color="$user->getColor()" :title="$user->getRole()"/>--}}

    <div x-data="{ dropdown: false}" class="dropdown">
        <button class="flex items-center bg-{{$user->getColor()}}-400 border border-{{$user->getColor()}}-400 text-white">
            <span class="px-2.5">{{$user->getRole()}}</span>
            <p class="bg-gray-50/80 hover:bg-gray-100/60 text-gray-500 hover:text-gray-700 w-10 h-8 py-2 align-middle" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto">
                    <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                </svg>
            </p>
        </button>
        <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
            @foreach($user->roles() as $key => $value)
                <li><a href="{{$key}}">{{$value}}</a></li>
            @endforeach
        </ul>
    </div>

</td>

