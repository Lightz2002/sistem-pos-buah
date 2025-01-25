<div class="bg-white p-4 mb-2 rounded-md flex gap-4 h-40 relative">
    <div class="img-container w-3/12">
        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover">
    </div>

    <div class="product-detail w-3/4 p-2">
        <div class="flex">
            <h3 class="text-xl mb-2">{{ $item->product->name . ' - ' . $item->product->size }}</h3>

            <svg wire:click="removeFromCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-auto hover:cursor-pointer hover:text-red-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </div>
        <h5 class="text-teal-400 font-bold mb-4 text-lg">{{ 'Rp' . number_format($item->product->price) }}</h5>
        <div class="inline-flex w-full ">
            <svg wire:click="decreaseQuantityToCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 px-2 border border-gray-300 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
            </svg>
            <span class="w-14 hover:cursor-not-allowed border p-1 px-4">{{ $item->quantity }}</span>
            <svg wire:click="increaseQuantityToCart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 px-2 border border-gray-300 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            <p class="ml-auto">Subtotal: 

                <span class="font-bold text-teal-400">Rp{{ number_format($item->quantity * $item->product->price) }}</span>
            </p>

        </div>
    </div>

</div>