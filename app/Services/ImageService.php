<?php

namespace App\Services;

use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImageService
 * @package App\Services
 */
class ImageService
{
    private Image $image;
    public ?string $oldImage = null;
    public ?string $newImage = null;

    public function __construct()
    {
        $this->image = new Image();
    }

    public function index(Request $request)
    {
        try {
            $image = $this->image->query()->with('destination');

            return $image;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function store(StoreImageRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('image/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = \auth()->id();
            $image = $this->image->create($data);
            DB::commit();

            return $image;
        } catch (\Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->oldImage = $image->image;
                $this->newImage = $request->file('image')->store('image/image', 'public');
                $data['image'] = $this->newImage;
            }
            $image->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $image;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function delete(Image $image)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $image->image;
            $image->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $image;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
