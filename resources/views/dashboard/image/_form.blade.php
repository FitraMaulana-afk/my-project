<div class="flex my-2 justify-between">
    <x-form.label value="Title" for="title" />
    <div class="flex flex-col w-3/4">
        <x-form.input type="text" name="title" id="title" class="w-full" :value="old('title', $image ?? null)" :disabled="request()->routeIs('dashboard.image.show')" />
        @error('title')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Destination" for="destination" />
    <div class="flex flex-col w-3/4 z-0">
        <x-form.select name="destination_id" id="destination_id" :disabled="request()->routeIs('dashboard.image.show')">
            <option disabled hidden {{ old('destination_id') != null ?: 'selected' }}>
                {{ __('Select Destination') }}
            </option>
            @foreach ($destinations as $destination)
                <option class="z-0" value="{{ $destination->id }}" @selected(!empty($image) && $destination->id == $image->destination_id)>
                    {{ $destination->title }}
                </option>
            @endforeach
        </x-form.select>
        @error('destination_id')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
@if (!request()->routeIs('dashboard.image.create'))
    <div class="flex my-2 justify-between">
        @if (request()->routeIs('dashboard.image.edit'))
            <x-form.label value="Old Image" for="image" />
        @else
            <x-form.label value="Image" for="image" />
        @endif
        <div class="w-3/4">
            <img src="{{ asset('storage/' . $image->image) }}" class="w-60" />
        </div>
    </div>
@endif
@if (!request()->routeIs('dashboard.image.show'))
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
    @if (!request()->routeIs('dashboard.image.show'))
        <x-button variant="success" class=" " type="submit">
            Save
        </x-button>
    @endif

    <x-button variant="danger" class=" " href="{{ route('dashboard.image.index') }}">
        Back
    </x-button>
</div>
