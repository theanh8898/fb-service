<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderService extends BaseService
{

    /**
     * @param $request
     * @param $service
     * @return bool
     */
    public function store($request, $service)
    {
        DB::beginTransaction();
        try {
            $orderData = [
                'link' => $request->link,
                'number_up' => $request->number_up,
                'content' => $request->content,
                'note' => $request->note,
                'service_id' => $service,
                'status' => Order::STATUS_PENDING,
                'user_id' => Auth::user()->id,
                'amount' => $request->amount
            ];

            $order = Order::create($orderData);

            if ($order->save()) {
                Auth::user()->update([
                    'amount' => Auth::user()->amount - $request->amount
                ]);
            }

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request, $service, $orderID)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($orderID);
            $orderData = [
                'status' => $request->status,
            ];

            $order->update($orderData);

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the product.'));
        }

    }

    public function search(Request $request)
    {
        $serviceID = Service::where('code_type', $request->type)->pluck('id')->first();
        $ordersData = Order::all();
        if ($serviceID != null) {
            $ordersData = $ordersData->where('service_id', $serviceID);
        }

        if ($request->status != 'all') {
            $ordersData = $ordersData->where('status', $request->status);
        }

        return $ordersData;
    }
}
