<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\DestinationService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public string $homeView = 'landing.home.';
    public DestinationService $destinationService;

    public function __construct()
    {
        $this->destinationService = new DestinationService;
    }

    public function index(Request $request)
    {
        $homeView = $this->homeView;
        $destinations = $this->destinationService->index($request)->get();
        return \view($homeView . 'index', \compact('destinations'));
    }

    public function search(Request $request)
    {
        $homeView = $this->homeView;
        $destinations = $this->destinationService->index($request)->get();
        return \view($homeView . 'search', \compact('destinations'));
    }
}