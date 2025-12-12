<div class="relative" id="{{Str::replace('[', '_', Str::remove(']', $name))}}-block">
    <textarea name="{{$name}}" rows="3" class="peer py-4 px-0 ti-form-input rounded-none bg-transparent !border-t-transparent border-b !border-x-transparent border-b-gray-200 placeholder:!text-transparent focus:!border-t-transparent focus:!border-x-transparent focus:!border-b-blue-400 focus:!ring-0 focus:!ring-offset-0 !shadow-none
        focus:pt-6
        focus:pb-2
        [&:not(:placeholder-shown)]:pt-6
        [&:not(:placeholder-shown)]:pb-2
        autofill:pt-6
        autofill:pb-2" placeholder="{{$title}}" style="min-height: 83px;">{{$value}}
    </textarea>
    <label for="{{$name}}" class="absolute top-0 start-0 py-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
        peer-focus:text-xs
        peer-focus:-translate-y-1.5
        peer-focus:text-blue-400
        peer-[:not(:placeholder-shown)]:text-xs
        peer-[:not(:placeholder-shown)]:-translate-y-1.5
        peer-[:not(:placeholder-shown)]:text-blue-400">
        {{$title}}
    </label>
</div>
