<?php

namespace App\Services;

use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProvinceService
 * @package App\Services
 */
class ProvinceService
{
    private Province $province;
    public ?string $oldImage = null;
    public ?string $newImage = null;

    public function __construct()
    {
        $this->province = new Province();
    }

    public function index(Request $request)
    {
        try {
            $province = $this->province->query();

            return $province;
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function store(StoreProvinceRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('province/image', 'public');
                $data['image'] = $this->newImage;
            }
            $province = $this->province->create($data);
            DB::commit();

            return $province;
        } catch (\Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function update(UpdateProvinceRequest $request, Province $province)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->oldImage = $province->image;
                $this->newImage = $request->file('image')->store('province/image', 'public');
                $data['image'] = $this->newImage;
            }
            $province->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $province;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function delete(Province $province)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $province->image;
            $province->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $province;
        } catch (Exception $e) {
        }
    }
}