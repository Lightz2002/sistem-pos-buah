

{{-- <x-app-layout> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
            {{ __('Cart') }}
        </h2>
        <x-alert type="success"></x-alert>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300">Cart Items</h3>

                @foreach($cartitems as $item)
                    <livewire:cart-item lazy wire:key="{{ $item->id }}" :item="$item" />
                @endforeach

                <div class="bg-white p-4 pr-6 rounded-md text-right mb-4">
                    <h2>Total:
                        <span class="text-teal-400 font-bold text-lg">{{ 'Rp' . number_format($totalAmount) }}</span>
                    </h2>
                </div>

                <a href="{{ route('payments.create') }}" class="ml-auto flex w-32 text-white bg-black rounded-md p-4 hover:bg-teal-400 hover:text-white hover:cursor-pointer focus:bg-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>

                    <span>Checkout</span>
                </a>
            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}
\
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('cart-item-removed', (event) => {
                Toastify({
                text: "Items removed from cart",
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