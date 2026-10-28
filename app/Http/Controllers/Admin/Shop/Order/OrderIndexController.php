<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Currency;
use App\Models\Shop\Order\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderIndexController extends Controller
{
    public function __invoke(Request $request, $status = false)
    {

//        // 2. Делаем GET-запрос к API Метрики
//        $response = Http::withHeaders([
//            'Authorization' => 'OAuth ' . ' AgAAAAAG6A33AAYBULcb3tP6V09YkgVZ5gweOaU',
//        ])->get('https://yandex.net', [
//            'ids' => 54737767,  //54737767
//            'metrics' => 'ym:s:visits,ym:s:pageviews', // Метрики: визиты и просмотры
//            'date1' => '7daysAgo',                     // Начальная дата
//            'date2' => 'today',                         // Конечная дата
//        ]);
//        dd($response->json(), $response->status(), $response->successful(), $response->json()['data']);









        $orders = Order::query()->getFilterOrders($request, $status);
//        dd($orders);
        return view('admin.shop.order.index', [
            'orders' => $orders,
            'currency' => Currency::all()->keyBy('code')->all(),
            'statusesList' => OrderService::getArrayStasusesList($orders)
        ]);
    }
}
