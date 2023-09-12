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
                class="h-full rounded-md w-full absolute object-cover">
            </div>
            <div class="product-detail p-4">
                <div class="product-detail-header flex">
                    <h5 class="text-md">{{ $product->name }}</h5>
                    {{-- <h5 class="ml-auto text-lg font-bold {{ $product->quantity > 0 ? 'text-black' : 'text-red-400'}}">{{ $product->quantity }} Left</h5> --}}
                </div>
                <div class="flex">
                    <h3 class="text-md  font-bold">Rp {{ number_format($product->price) . ' / ' . $product->unit}}</h3>

                    <h5 class="text-sm text-gray-400 ml-auto">{{ $product->sold_quantity }} Terjual</h5>
                </div>
            </div>
        </div>
    </a>
@endif