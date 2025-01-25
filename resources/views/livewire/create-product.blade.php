

<form wire:submit="save" class="mt-6 space-y-6 bg-white dark:bg-gray-800 w-1/2">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" model="form.name" type="text" class="mt-1 block w-full"
            autocomplete="name" />
        <x-input-error :messages="$errors->get('form.name')" class="mt-2" />

    </div>

    <div class="flex">
        <div class="me-2">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" name="quantity" model="form.quantity" type="number" class="mt-1 block w-full"
                autocomplete="quantity" />
            <x-input-error :messages="$errors->get('form.quantity')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="unit" :value="__('Unit')" />
            <x-text-input id="unit" name="unit" model="form.unit" type="text" class="mt-1 block w-full"
                autocomplete="unit" />
            <x-input-error :messages="$errors->get('form.unit')" class="mt-2" />
        </div>
    </div>


    <div>
        <x-input-label for="price" :value="__('Price')" />
        <x-text-input id="price" name="price" model="form.price" type="text" class="mt-1 block w-full"
            autocomplete="price" />
        <x-input-error :messages="$errors->get('form.price')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description" name="description" model="form.description" type="textarea" class="mt-1 block w-full"
            autocomplete="description">
            {{ $this->form->description }}
        </x-text-input>
        <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="image" :value="__('Image')" />
        @if ($this->form->image)
            <img src="{{ $this->form->image->temporaryUrl() ?? '' }}">
        @endif
        <x-text-input id="image" name="image" model="form.image" type="file" accept="image/png, image/jpeg, image/jpg" class="mt-1 block w-full"
            autocomplete="image" />
        <x-input-error :messages="$errors->get('form.image')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>