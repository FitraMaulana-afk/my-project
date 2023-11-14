<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Models\Destination;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public string $imageView = 'dashboard.image.';
    public ImageService $imageService;
    private Destination $destination;

    public function __construct()
    {
        $this->imageService = new ImageService;
        $this->destination = new Destination();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $imageView = $this->imageView;
        $images = $this->imageService->index($request)->paginate(10);

        return view($imageView . 'index', \compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $imageView = $this->imageView;
        $destinations = $this->destination->query()->get();

        return view($imageView . 'create', \compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        try {
            $imageView = $this->imageView;
            $this->imageService->store($request);

            return \to_route($imageView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        $imageView = $this->imageView;
        $destinations = $this->destination->query()->get();

        return view($imageView . 'show', \compact('destinations', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        $imageView = $this->imageView;
        $destinations = $this->destination->query()->get();

        return view($imageView . 'edit', \compact('destinations', 'image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        try {
            $imageView = $this->imageView;
            $this->imageService->update($request, $image);

            return \to_route($imageView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        try {
            $imageView = $this->imageView;
            $this->imageService->delete($image);

            return \to_route($imageView . 'index');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
