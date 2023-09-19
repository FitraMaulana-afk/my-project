<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public string $homeView = 'landing.home.';

    public function index()
    {
        $homeView = $this->homeView;
        return \view($homeView . 'index');
    }
}