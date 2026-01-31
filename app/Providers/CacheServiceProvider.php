<?php

namespace App\Providers;

use App\Jobs\SitemapVinograd;
use App\Models\Shop\Category;
use App\Models\Shop\Country;
use App\Models\Shop\Currency;
use App\Models\Shop\DeliveryMethod;
use App\Models\Shop\Modification;
use App\Models\Shop\Order\Order;
use App\Models\Shop\Product;
use App\Models\Shop\Selection;
use App\Models\Shop\Slider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->orderEvent ();
        $this->productEvent ();
        $this->modificationEvent ();
        $this->categoryEvent ();
        $this->sliderEvent ();
        $this->currencyEvent ();
        $this->deliveryMethodEvent ();
    }

    private function productEvent ()
    {
        $func = function() {
            dispatch(new SitemapVinograd());
            cache()->delete('siteMapHTML');
            cache()->delete('priceListHTML');
            cache()->delete('categorys_category');
            cache()->delete('categorys_selection');
            cache()->delete('categorys_country');
            cache()->forget('home_page');
        };

        Product::created($func);
        Product::updated($func);
        Product::deleted($func);
    }

    private function modificationEvent ()
    {
        $func = function() {
            cache()->delete('priceListHTML');
        };

        Modification::created($func);
        Modification::updated($func);
        Modification::deleted($func);
    }

    private function categoryEvent ()
    {
        $func = function() {
            dispatch(new SitemapVinograd());
            cache()->delete('siteMapHTML');
            cache()->delete('categorys_category');
            cache()->delete('categorys_selection');
            cache()->delete('categorys_country');
            cache()->forget('home_page');
            cache()->forget('all_categories');
        };

        Category::created($func);
        Category::updated($func);
        Category::deleted($func);

        Country::created($func);
        Country::updated($func);
        Country::deleted($func);

        Selection::created($func);
        Selection::updated($func);
        Selection::deleted($func);
    }

    private function sliderEvent ()
    {
        $func = function() {
            cache()->delete('slider');
        };

        Slider::created($func);
        Slider::updated($func);
        Slider::deleted($func);
    }

    private function orderEvent ()
    {
        $func = function() {
            cache()->delete('quantity_orders_by_status');
        };

        Order::created($func);
        Order::updated($func);
        Order::deleted($func);
    }

    private function currencyEvent ()
    {
        $func = function() {
            cache()->delete('currencies');
        };

        Currency::created($func);
        Currency::updated($func);
        Currency::deleted($func);
    }

    private function deliveryMethodEvent ()
    {
        $func = function() {
            cache()->delete('deliverys_to_array');
        };

        DeliveryMethod::created($func);
        DeliveryMethod::updated($func);
        DeliveryMethod::deleted($func);
    }
}
