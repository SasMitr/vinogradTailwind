<label class="!py-2 !px-0 label text-blue-400 text-sm">{{$title}}</label>
<select name="{{$name}}" id="{{$name}}">
    <option value="">Выбрать</option>
    @foreach($items as $id => $value)
        <option value="{{$id}}" @selected( $id == old($name, isset($product) ?  $product->$name : false)) >{{$value}}</option>
    @endforeach
</select>
