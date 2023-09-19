<?php

namespace App\Services;

/**
 * Class DestinationService
 * @package App\Services
 */
class DestinationService
{
    private Destination $destination;
    public ?string $oldImage = null;
    public ?string $newImage = null;

    public function __construct()
    {
        $this->destination = new Destination();
    }

    public function index(Request $request)
    {
        try {
            $country = $this->country->query()->with('user');

            return $country;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}