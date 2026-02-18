@foreach ($items as $item)
@php $item->setRelation('order', $order) @endphp

{{$loop->iteration}}. {{$item->product_name}}
   {{$item->modification_name}}     {{$item->quantity}}шт x {{$item->price}} = {{$item->getCost()}}
@endforeach
----------------------------------

Общее количество:
@foreach ($quantityByModifications as $name => $value)
    {{$name}}: {{$value}}шт
@endforeach
----------------------------------

Стоимость заказа:  {{$order->cost}}
{{$order->delivery['method_name']}}: Вес- {{$order->delivery['weight'] / 1000}}кг.   {{$order->getDeliveryCost()}}

Итоговая стоимость: {{$order->getTotalCost()}}
