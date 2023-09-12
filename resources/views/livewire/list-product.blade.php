<div class="container">
    <div class="mb-4 flex items-baseline justify-evenly">
        <div class="w-1/2 relative">
            <input wire:model.live="search" name="search" type="search" placeholder="Search..."
                class="border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm w-full">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="stroke-slate-400 w-6 h-6 absolute top-1/2 right-10 translate-y-[-50%]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </div>

        @if ($this->createUrl)
            <x-primary-button type="redirect" class="ml-auto" :href="$this->createUrl">Create</x-primary-button>
        @endif

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($products as $product)
            <livewire:product-card wire:key="{{ $product->id }}" :product="$product" />
        @endforeach
    </div>

    {{ $products->withQueryString()->links() }}
</div>

