<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public string $dashboardView = 'dashboard.home.';
    public function index()
    {
        $dashboardView = $this->dashboardView;
        return \view($dashboardView . 'index');
    }
}