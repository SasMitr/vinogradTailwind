<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use Illuminate\Support\Facades\DB;

class ProductResetCatalogController extends Controller
{
    public function __invoke()
    {

        try {
            if(Order::query()->whereIn('current_status', [1, 8])->exists()){
                throw new \Exception('Еще есть не закрытые заказы!');
            }

            DB::table('vinograd_product_modifications')->update(['quantity' => 0, 'in_stock' => 0]);
            return redirect()->back()->with('status', 'База очищена.');

        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
