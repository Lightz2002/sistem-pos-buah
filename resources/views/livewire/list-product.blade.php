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
        @foreach($products->values() as $product)
            @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('products.edit', ['product' => $product]) }}">
                    <div class="product-card rounded-md bg-white hover:-translate-y-2 transition ease-in-out delay-150 hover:cursor-pointer">
                        <div class="rounded-md image-container relative pb-[75%] mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="h-full rounded-md w-full absolute object-cover">
                        </div>
                        <div class="product-detail p-4">
                            <div class="product-detail-header flex">
                                <h3 class="text-lg">{{ $product->name }}</h3>
                                <h5 class="ml-auto text-lg font-bold {{ $product->quantity > 0 ? 'text-black' : 'text-red-400'}}">{{ $product->quantity }} Left</h5>
                            </div>
                            <h5 class="text-md  text-gray-400">Rp {{ number_format($product->price) . ' / ' . $product->unit}}</h5>
                        </div>
                    </div>
                </a>
            @elseif (auth()->user()->hasRole('customer'))
                <a href="{{ route('products.edit', ['product' => $product]) }}">
                    <div class="product-card rounded-md bg-white hover:-translate-y-2 transition ease-in-out delay-150 hover:cursor-pointer">
                        <div class="rounded-md image-container relative pb-[75%] mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="h-full rounded-md w-full absolute object-cover" />
                        </div>
                        <div class="product-detail p-4">
                            <div class="product-detail-header flex">
                                <h5 class="text-md">{{ $product->name . ' - ' . $product->size }}</h5>
                            </div>
                            <div class="flex">
                                <h3 class="text-md  font-bold">Rp {{ number_format($product->price) . ' / ' . $product->unit}}</h3>

                                <h5 class="text-sm text-gray-400 ml-auto">{{ $product->sold_quantity }} Terjual</h5>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>

    {{ $products->withQueryString()->links() }}
</div>

