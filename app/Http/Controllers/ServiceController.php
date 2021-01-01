<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @param ServiceService $serviceService
     */
    public function __construct(ServiceService $serviceService)
    {
        $this->service = $serviceService;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $services = Service::all();

        return view('backend.service.index', compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create()
    {
        return view('backend.service.create');
    }


    public function store(UpdateServiceRequest $request)
    {
        $updated = $this->service->store($request);

        return redirect()->route('service.index');
    }

    public function edit($id)
    {
        $service = Service::find($id);

        return view('backend.service.edit', compact(['service']));
    }

    public function update(UpdateServiceRequest $request, $service)
    {
        $updated = $this->service->update($request, $service);

        return redirect()->route('service.index');
    }

    public function destroy($service)
    {
        $deleted = $this->service->delete($service);

        return redirect()->route('service.index');
    }
}
