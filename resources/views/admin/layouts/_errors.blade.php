@if ($errors->any())
    <div class="p-3 bg-red-100 text-red-500 border border-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
