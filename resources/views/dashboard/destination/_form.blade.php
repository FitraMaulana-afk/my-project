<div class="flex my-2 justify-between">
    <x-form.label value="Title" for="title" />
    <div class="flex flex-col w-3/4">
        <x-form.input type="text" name="title" id="title" class="w-full" placeholder="Enter Title" :value="old('title', $destination ?? null)"
            :disabled="request()->routeIs('dashboard.destination.show')" />
        @error('title')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Country" for="country" />
    <div class="flex flex-col w-3/4 z-0">
        <x-form.select name="country_id" id="country_id" :disabled="request()->routeIs('dashboard.destination.show')">
            <option disabled hidden {{ old('country_id') != null ?: 'selected' }}>
                {{ __('Select Country') }}
            </option>
            @foreach ($countries as $country)
                <option class="z-0" value="{{ $country->id }}" @selected(!empty($destination) && $country->id == $destination->country_id)>{{ $country->name }}
                </option>
            @endforeach
        </x-form.select>
        @error('country_id')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Province" for="province" />
    <div class="flex flex-col w-3/4 z-0">
        <x-form.select name="province_id" id="province_id" :disabled="request()->routeIs('dashboard.destination.show')">
            <option disabled hidden {{ old('province_id') != null ?: 'selected' }}>
                {{ __('Select Province') }}
            </option>
            @foreach ($provincies as $province)
                <option class="z-0" value="{{ $province->id }}" @selected(!empty($destination) && $province->id == $destination->province_id)>
                    {{ $province->name }}
                </option>
            @endforeach
        </x-form.select>
        @error('province_id')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Status" :required="request()->routeIs('dashboard.destination.create')" for="status" />
    <div class="flex flex-col w-3/4 z-0">
        <x-form.select :disabled="request()->routeIs('dashboard.destination.show')" name="status" id="status">
            <option disabled hidden {{ old('status') != null ?: 'selected' }}>
                {{ __('Select Publish Status') }}
            </option>
            @foreach (\App\Enums\PublishStatusEnum::STATUS as $key => $value)
                <option value="{{ $value }}"
                    @if (request()->routeIs('dashboard.destination.edit') || request()->routeIs('dashboard.destination.show')) {{ old('status', $destination->status) != $value ?: 'selected' }} @endif>
                    {{ $key }}
                </option>
            @endforeach
        </x-form.select>
        @error('status')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Description" />
    <div class="flex flex-col w-3/4">
        <x-form.textarea class="w-full" name="description" id="description" :text="$destination->description ?? null" :disabled="request()->routeIs('dashboard.destination.show')" />
        @error('description')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
@if (!request()->routeIs('dashboard.destination.create'))
    <div class="flex my-2 justify-between">
        @if (request()->routeIs('dashboard.destination.edit'))
            <x-form.label value="Old Image" for="image" />
        @else
            <x-form.label value="Image" for="image" />
        @endif
        <div class="w-3/4">
            <img src="{{ asset('storage/' . $destination->image) }}" class="w-60" />
        </div>
    </div>
@endif
@if (!request()->routeIs('dashboard.destination.show'))
    <div class="flex my-2 justify-between">
        <x-form.label value="Image" for="image" />
        <div class="flex flex-col w-3/4">
            <x-form.file-input class="w-ful" name="image" id="image" />
            @error('image')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
@endif

<div class="float-right my-2">
    @if (!request()->routeIs('dashboard.destination.show'))
        <x-button variant="success" class=" " type="submit">
            Save
        </x-button>
    @endif

    <x-button variant="danger" class=" " href="{{ route('dashboard.destination.index') }}">
        Back
    </x-button>
</div>
