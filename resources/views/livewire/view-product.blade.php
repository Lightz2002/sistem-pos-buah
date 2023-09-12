<form wire:submit="{{ auth()->user()->hasRole('admin') ? 'save' : 'addToCart' }}" class="block md:flex bg-white rounded-md p-8" enctype="multipart/form-data">
    <div class="rounded-md w-1/2 h-80 md:flex-shrink-0">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
        class="h-full w-full object-cover mb-4">

        @if($isEdit)
            <x-text-input :readonly="!$isEdit" id="image" name="image" model="form.image" type="file" class="{{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.image')" class="mt-2" />
        @endif


    </div>

    <div class="product-detail md:ml-4 p-4 grid grid-cols-2 justify-start justify-self-start content-start gap-4">
        <h2 class="text-gray-200 dark:text-gray-800 text-lg md:text-xl mb-4 font-bold col-span-2">Product Details</h2>

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-200 dark:text-gray-800 md:text-lg"/>
            <x-text-input :readonly="!$isEdit" id="name" name="name" model="form.name" class="{{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity')" class="text-gray-200 dark:text-gray-800 md:text-lg"/>
            <x-text-input :readonly="!$isEdit" id="quantity" quantity="quantity" model="form.quantity" class="{{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.quantity')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="unit" :value="__('Unit')" class="text-gray-200 dark:text-gray-800 md:text-lg"/>
            <x-text-input :readonly="!$isEdit" id="unit" unit="unit" model="form.unit" class="{{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.unit')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" class="text-gray-200 dark:text-gray-800 md:text-lg"/>
            <x-text-input :readonly="!$isEdit" id="price" price="price" model="form.price" class="{{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.price')" class="mt-2" />
        </div>

        <div class="col-span-2">
            <x-input-label for="description" :value="__('Description')" class="text-gray-200 dark:text-gray-800 md:text-lg" />
            <x-text-input :readonly="!$isEdit"  id="description" description="description"  type="textarea" model="form.description" class="w-full {{ $isEdit ? '' : 'bg-transparent border-none p-0 shadow-none' }} md:text-lg"   />
            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
        </div>

        <div class="flex items-center {{ auth()->user()->hasRole('admin') ? 'justify-end': '' }} w-full col-span-2 gap-4">
            @if (auth()->user()->hasRole('customer'))
                <div class="inline-flex">
                    <svg wire:click="decreaseQuantityToCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 px-2 border border-gray-300 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>
                    <span class="w-14 hover:cursor-not-allowed border p-1 px-4">{{ $quantityToCart }}</span>
                    <svg wire:click="increaseQuantityToCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 px-2 border border-gray-300 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>

                <button class="bg-teal-400 text-white p-2 inline-flex hover:bg-teal-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <p class="ms-2">Add To Cart</p>
                </button>
            @elseif (auth()->user()->hasRole('admin'))
                <x-secondary-button wire:click="$toggle('isEdit')" type="button">
                    {{ $isEdit ? __('Cancel') : __('Edit') }}
                </x-secondary-button>

                @if($isEdit)
                    <x-primary-button>
                    {{ __('Save') }}
                    </x-primary-button>
                @endif
            @endif
        </div>

        <x-input-error :messages="$errors->get('quantityToCart')" class="mt-2" />
    </div>
</form>

<script>


    document.addEventListener('livewire:initialized', () => {
        @this.on('add-to-cart', (event) => {
                Toastify({
                text: "Items added to cart",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #2dd4bf, #00d4ff)",
                },
                onClick: function(){} // Callback after click
                }).showToast();
        });
    });
</script>