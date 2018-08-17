<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selectedDistance = 0;
        $search = "";
        $distances = Service::getDistances();
        $metric = Service::getMetric();
        return view('web', compact('selectedDistance', 'distances', 'search', 'metric'));
    }

    /**
     * Search service
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $selectedDistance = $request->input('distance');
        $search = $request->input('search');

        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        if ($selectedDistance != 0) {
            $query = Service::geofence($latitude, $longitude, 0, $selectedDistance);
        } else {
            $query = Service::distance($latitude, $longitude);
        }

        if (!is_null($search)) {
            $query->where('title', 'like', "%$search%");
            $query->orWhere('description', 'like', "%$search%");
        }

        $result = $query->orderBy('distance', 'ASC')->get();

        $distances = Service::getDistances();
        $metric = Service::getMetric();

        return view('web', compact('result', 'selectedDistance', 'distances', 'search', 'metric'));
    }

}
