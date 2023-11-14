<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Models\Country;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private CountryService $countryService;
    private Country $country;

    public function __construct()
    {
        $this->countryService = new CountryService;
        $this->country = new Country();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $response = $this->countryService->index($request);
        if (!$response) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $country = $response
            ->with('user')
            ->paginate(10)
            ->withQueryString();

        return \responder()
            ->success($country)
            ->respond(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        $country = $this->country->create($request->all());

        return responder()
            ->success($country)
            ->respond(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        $country->load([
            'user:id,username,name,email',
        ]);

        return responder()
            ->success($country)
            ->respond(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
