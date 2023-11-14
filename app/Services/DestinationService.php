<?php

namespace App\Services;

use App\Enums\PublishStatusEnum;
use App\Http\Requests\Destination\StoreDestinationRequest;
use App\Http\Requests\Destination\UpdateDestinationRequest;
use App\Models\Destination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $destination = $this->destination->query()->with('user')->orderBy('created_at');

            $destination->when(\request()->routeIs('landing.home', 'destination.index', 'landing.province'), function ($query) {
                $query->where('status', PublishStatusEnum::STATUS['Yes']);
            });

            $destination->when(\request()->routeIs('landing.province'), function ($query) use ($request) {
                $query->whereHas('province', function ($query) use ($request) {
                    $query->where('slug', $request->province);
                });
            });

            $destination->when(\request()->routeIs('landing.search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            });

            return $destination;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function store(StoreDestinationRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->newImage = $request->file('image')->store('destination/image', 'public');
                $data['image'] = $this->newImage;
            }
            $data['user_id'] = \auth()->id();
            $destination = $this->destination->create($data);
            DB::commit();

            return $destination;
        } catch (\Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $this->oldImage = $destination->image;
                $this->newImage = $request->file('image')->store('destination/image', 'public');
                $data['image'] = $this->newImage;
            }
            $destination->update($data);
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $destination;
        } catch (Exception $e) {
            DB::rollBack();
            $e->getMessage();
        }
    }

    public function delete(Destination $destination)
    {
        DB::beginTransaction();
        try {
            $this->oldImage = $destination->image;
            $destination->delete();
            DB::commit();
            DB::afterCommit(function () {
                if (!empty($this->oldImage) && (Storage::disk('public'))->exists($this->oldImage)) {
                    Storage::disk('public')->delete($this->oldImage);
                }
            });

            return $destination;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
