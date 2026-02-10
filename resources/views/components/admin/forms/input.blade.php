@props(['type' => 'text', 'name', 'title', 'value', 'requared' => false])

<div {{ $attributes->merge(['class' => 'relative']) }} id="{{Str::replace('[', '_', Str::remove(']', $name))}}-block">
    <label for="{{$name}}" class="text-gray-400">
        {{$title}}
        {!! $requared !!}
    </label>
    <input type="{{$type}}" name="{{$name}}" class="border border-gray-300 bg-gray-50 w-full px-3 py-2 text-gray-700 text-lg font-normal" value="{{$value}}" id="{{$name}}">
</div>
