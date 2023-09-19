<?php

namespace App\Services;

use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;

/**
 * Class CountryService
 * @package App\Services
 */
class CountryService
{
    private Country $country;
    public ?string $oldImage = null;
    public ?string $newImage = null;

    public function __construct()
    {
        $this->country = new Country();
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

    public function store(StoreCountryRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('country/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = \auth()->id();
            $country = $this->country->create($data);
            DB::commit();

            return $country;
        } catch (\Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->oldImage = $country->image;
                $this->newImage = $request->file('image')->store('country/image', 'public');
                $data['image'] = $this->newImage;
            }
            $country->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $country;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function delete(Country $country)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $country->image;
            $country->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $country;
        } catch (Exception $e) {
        }
    }
}