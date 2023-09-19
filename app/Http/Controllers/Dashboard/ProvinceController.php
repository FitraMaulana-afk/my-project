<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;
use App\Models\Country;
use App\Models\Province;
use App\Services\ProvinceService;
use Exception;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public string $provinceView = 'dashboard.province.';
    public ProvinceService $provinceService;
    public Country $country;

    public function __construct()
    {
        $this->provinceService = new ProvinceService;
        $this->country = new Country();
    }

    public function index(Request $request)
    {
        try {
            $provinceView = $this->provinceView;
            $provinces = $this->provinceService->index($request)->paginate(10);

            return view($provinceView . 'index', \compact('provinces'));
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function create()
    {
        $provinceView = $this->provinceView;
        $countries = $this->country->query()->get();

        return view($provinceView . 'create', \compact('countries'));
    }

    public function store(StoreProvinceRequest $request)
    {
        try {
            $provinceView = $this->provinceView;
            $provinces = $this->provinceService->store($request);

            return \to_route($provinceView . 'index');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function show(Province $province)
    {
        $provinceView = $this->provinceView;
        $countries = $this->country->query()->get();

        return view($provinceView . 'show', \compact('province','countries'));
    }

    public function edit(Province $province)
    {
        $provinceView = $this->provinceView;
        $countries = $this->country->query()->get();
        
        return view($provinceView . 'edit', \compact('province','countries'));
    }

    public function update(UpdateProvinceRequest $request, Province $province)
    {
        try {
            $provinceView = $this->provinceView;
            $province = $this->provinceService->update($request, $province);

            return \to_route($provinceView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function destroy(Province $province)
    {
        try {
            $provinceView = $this->provinceView;
            $province = $this->provinceService->delete($province);

            return \to_route($provinceView . 'index');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}