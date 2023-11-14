<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Models\Destination;
use App\Services\DestinationService;
use Exception;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    private DestinationService $destinationService;

    public function __construct()
    {
        $this->destinationService = new DestinationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $destination = $this->destinationService->index($request);

            $data = $destination
                ->with('user')
                ->paginate(10)
                ->withQueryString();

            return responder()
                ->success($data)
                ->respond(200);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        $destination = $this->destinationService->store($request);

        return responder()
            ->success($destination)
            ->respond(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destination->load([
            'user:id,username,name,email',
            'province:id,name,description,image',
        ]);


        return responder()
            ->success($destination)
            ->respond(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
