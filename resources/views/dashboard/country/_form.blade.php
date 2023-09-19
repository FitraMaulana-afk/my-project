<div class="flex my-2 justify-between">
    <x-form.label value="Name" for="name" />
    <div class="flex flex-col w-3/4">
        <x-form.input type="text" name="name" id="name" class="w-full" :value="old('name', $country ?? null)" :disabled="request()->routeIs('dashboard.country.show')" />
        @error('name')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="flex my-2 justify-between">
    <x-form.label value="Description" />
    <div class="flex flex-col w-3/4">
        <x-form.textarea class="w-full" name="description" id="description" :text="$country->description ?? null" :disabled="request()->routeIs('dashboard.country.show')" />
        @error('description')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
@if (!request()->routeIs('dashboard.country.create'))
    <div class="flex my-2 justify-between">
        @if (request()->routeIs('dashboard.country.edit'))
            <x-form.label value="Old Image" for="image" />
        @else
            <x-form.label value="Image" for="image" />
        @endif
        <div class="w-3/4">
            <img src="{{ asset('storage/' . $country->image) }}" class="w-60" />
        </div>
    </div>
@endif
@if (!request()->routeIs('dashboard.country.show'))
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
    @if (!request()->routeIs('dashboard.country.show'))
        <x-button variant="success" class=" " type="submit">
            Save
        </x-button>
    @endif

    <x-button variant="danger" class=" " href="{{ route('dashboard.country.index') }}">
        Back
    </x-button>
</div>
