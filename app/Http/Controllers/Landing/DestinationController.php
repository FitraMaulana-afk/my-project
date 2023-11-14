<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Services\DestinationService;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public string $destinationView = 'landing.destination.';
    public DestinationService $destinationService;

    public function __construct()
    {
        $this->destinationService = new DestinationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $destinationView = $this->destinationView;
        $destinations = $this->destinationService->index($request)->get();
        return \view($destinationView . 'index', \compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destinationView = $this->destinationView;

        return \view($destinationView . 'show', \compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
