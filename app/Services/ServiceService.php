<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceService extends BaseService
{

    /**
     * @param $request
     * @param $service
     * @return bool
     */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $serviceData = [
                'code_type' => $request->code_type,
                'name' => $request->name,
                'price' => $request->price,
                'number_of_price' => $request->number_of_price,
            ];

            $service = Service::create($serviceData);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request, $serviceID)
    {
        DB::beginTransaction();
        try {
            $service = Service::find($serviceID);
            $serviceData = [
                'code_type' => $request->code_type,
                'name' => $request->name,
                'price' => $request->price,
                'number_of_price' => $request->number_of_price,
            ];

            $service->update($serviceData);

            DB::commit();
            return $service;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem updating the product.'));
        }
    }

    public function delete($service)
    {
        if (Service::findOrFail($service)->delete()) {
            return true;
        }
    }


}
