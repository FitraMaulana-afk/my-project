<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public string $countryView = 'dashboard.country.';
    public CountryService $countryService;

    public function __construct()
    {
        $this->countryService = new CountryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $countryView = $this->countryView;
        $countries = $this->countryService->index($request)->paginate(10);

        return \view($countryView . 'index', \compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countryView = $this->countryView;

        return \view($countryView . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $countryView = $this->countryView;
            $countries = $this->countryService->store($request);

            return \to_route($countryView . 'index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        $countryView = $this->countryView;

        return \view($countryView . 'show', \compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        $countryView = $this->countryView;

        return \view($countryView . 'edit', \compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        try {
            $countryView = $this->countryView;
            $countries = $this->countryService->update($request, $country);

            return \to_route($countryView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        try {
            $countryView = $this->countryView;
            $countries = $this->countryService->delete($country);

            return \to_route($countryView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
