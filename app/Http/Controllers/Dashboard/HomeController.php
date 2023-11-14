<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public string $dashboardView = 'dashboard.home.';
    public Destination $destination;
    public Province $province;
    public Country $country;

    public function __construct()
    {
        $this->destination = new Destination();
        $this->province = new Province();
        $this->country = new Country();
    }

    public function index()
    {
        $dashboardView = $this->dashboardView;
        $destination = $this->destination->query()->count();
        $province = $this->province->query()->count();
        $country = $this->country->query()->count();
        return \view($dashboardView . 'index',\compact('destination','province','country'));
    }
}