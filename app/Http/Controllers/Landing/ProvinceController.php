<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Services\DestinationService;
use App\Services\ProvinceService;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public DestinationService $destinationService;
    public ProvinceService $provinceService;

    public function __construct()
    {
        $this->destinationService = new DestinationService;
        $this->provinceService = new ProvinceService;
    }

    public function __invoke(Request $request)
    {
        $id = $request->id;
        $destinations = $this->destinationService->index($request)->get();
        $province = Province::find($id);

        return \view('landing.province.index', \compact('destinations', 'province'));
    }
}
