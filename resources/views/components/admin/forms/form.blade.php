<form method="POST"
      action="{{$route}}"
      data-modules="{{$modules}}"
      data-id="{{$id}}"
      accept-charset="UTF-8"
      class="space-y-4"
>

    @csrf
    @method($method)

    {{$slot}}

</form>
