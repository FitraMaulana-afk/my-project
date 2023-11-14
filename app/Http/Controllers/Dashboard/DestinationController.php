<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Http\Requests\Destination\UpdateDestinationRequest;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Province;
use App\Services\DestinationService;
use Exception;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public string $destinationView = 'dashboard.destination.';
    public DestinationService $destinationService;
    public Country $country;
    public Province $province;

    public function __construct()
    {
        $this->destinationService = new DestinationService;
        $this->country = new Country();
        $this->province = new Province();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $destinationView = $this->destinationView;
        $destinations = $this->destinationService->index($request)->paginate(10);

        return \view($destinationView . 'index', \compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinationView = $this->destinationView;
        $countries = $this->country->query()->get();
        $provincies = $this->province->query()->get();

        return view($destinationView . 'create', \compact('countries', 'provincies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        try {
            $destinationView = $this->destinationView;
            $this->destinationService->store($request);

            return \to_route($destinationView . 'index');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destinationView = $this->destinationView;
        $countries = $this->country->query()->get();
        $provincies = $this->province->query()->get();

        return view($destinationView . 'show', \compact('countries', 'provincies', 'destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $destinationView = $this->destinationView;
        $countries = $this->country->query()->get();
        $provincies = $this->province->query()->get();

        return view($destinationView . 'edit', \compact('countries', 'provincies', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        try {
            $destinationView = $this->destinationView;
            $this->destinationService->update($request, $destination);

            return \to_route($destinationView . 'index');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        try {
            $destinationView = $this->destinationView;
            $this->destinationService->delete($destination);

            return \to_route($destinationView . 'index');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
