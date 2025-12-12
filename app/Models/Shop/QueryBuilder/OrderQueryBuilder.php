<?php

namespace App\Models\Shop\QueryBuilder;

use App\Status\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderQueryBuilder extends Builder
{

    public function getAllUserOrders($user_id)
    {
        return $this->where('user_id', $user_id)
            ->orderBy('current_status')
            ->paginate(30);
    }

    public function quantityOrdersByStatus ()
    {
        $res = $this->
            select('current_status AS status')->
            selectRaw('COUNT(current_status) AS quantity_orders')->
            whereNotIn('current_status', [Status::COMPLETED, Status::CANCELLED, Status::CANCELLED_BY_CUSTOMER])->
            groupBy('status')->
            get()->
            pluck('quantity_orders', 'status')->
            toArray();

        return array_replace(
            array_map(function() {
                return 0;
            }, Status::list()),
        $res);
    }

    public function getFilterOrders(Request $request, $status)
    {
        return
            $this->when($request->query(),
                function (Builder $query) use ($request, $status) {
                    $query->
                        when($request->id, function (Builder $query) use ($request) {
                            $query->orWhere('id', $request->id);
                        })->
                        when($request->email, function (Builder $query) use ($request) {
                            $query->orWhere('customer', 'like', '%' . $request->email . '%');
                        })->
                        when($request->phone, function (Builder $query) use ($request) {
                            $query->orWhere('customer', 'like', '%' . preg_replace("/[^\d]/", '', $request->phone) . '%');
                        })->
                        when($request->build, function (Builder $query) use ($request) {
                            $query->orWhere('date_build', $request->build);
                        });
                },
                function (Builder $query) use ($status) {
                    $query->status($status);
                })->
            orderBy('current_status')->
            orderBy('id', 'desc')->
            paginate(30)->
            appends($request->all());
    }

    public function status($status): Builder
    {
        return $this->when($status, function (Builder $query, string $status) {
            $query->where('current_status', $status);
        });
//        return $status
//            ? $this->where('current_status', $status)
//            : $this;
    }
}
