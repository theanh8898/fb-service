<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Service;
use App\Services\OrderService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderService;

    /**
     * Create a new controller instance.
     *
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $services = Service::all();
        if (Auth::user()->role == 1) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', Auth::user()->id)->get();
        }
        $params = [
            'type' => 'all',
            'status' => 'all'
        ];

        return view('backend.order.index', ['orders' => $orders, 'services' => $services, 'params' => $params]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id)
    {
        $service = Service::find($id);

        return view('backend.order.create', ['service' => $service]);
    }


    public function store(CreateOrderRequest $request, $service)
    {
        $created = $this->orderService->store($request, $service);

        if($created){
            $response = [
                'error' => false,
                'message' => "Tao moi thanh cong",
            ];
        }

        if (!$created) {
            $response = [
                'error' => true,
                'message' => "Tao moi that bai",
            ];
        }

        session()->flash('response', $response);
        return redirect()->route('order.index', ['response' => $response]);
    }

    public function edit($service, $id)
    {
        $order = Order::find($id);

        return view('backend.order.edit', ['order' => $order]);
    }

    public function update(Request $request, $service, $order)
    {
        $updated = $this->orderService->update($request, $service, $order);

        return redirect()->route('order.index');
    }

    public function search(Request $request)
    {
        $services = Service::all();
        $orders = $this->orderService->search($request);
        $params = [
            'type' => $request->type,
            'status' => $request->status
        ];

        return view('backend.order.index', ['orders' => $orders, 'services' => $services, 'params' => $params]);
    }
}
