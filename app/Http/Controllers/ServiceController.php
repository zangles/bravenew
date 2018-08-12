<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServiceRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreServiceRequest $request)
    {
        $fields = $request->all();

        $service = factory(Service::class)->create([
            'title' => $fields['title'],
            'description' => ($fields['description']) ?: "",
            'address' => $fields['street_name'] . ' ' . $fields['street_number'],
            'state' => ($fields['state']) ?: "",
            'zipcode' => ($fields['zipcode']) ?: "",
            'latitude' => $fields['latitude'],
            'longitude' => $fields['longitude'],
        ]);

        $request->session()->flash('status', 'Service created');

        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service $service
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceRequest $request
     * @param Service $service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $fields = $request->all();
        $fields['address'] = $fields['street_name'] . ' ' . $fields['street_number'];

        $service->title = $fields['title'];
        $service->description = ($fields['description']) ?: "";
        $service->address = $fields['address'];
        $service->zipcode = ($fields['zipcode']) ?: "";
        $service->latitude = ($fields['latitude']) ?: "";
        $service->longitude = $fields['longitude'];
        $service->save();

        $request->session()->flash('status', 'Service updated');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Service $service
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, Service $service)
    {
        $service->delete();

        $request->session()->flash('status', 'Service deleted');
        return redirect()->route('services.index');
    }
}
