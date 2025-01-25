<div class="bg-white p-4 mb-2 rounded-md flex gap-4 h-40 relative">
    <div class="img-container w-3/12">
        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="h-full w-full object-cover">
    </div>

    <div class="product-detail w-3/4 p-2 py-8">
        <div>
            <h3 class="text-xl mb-2">{{ $item->quantity . ' ' . strtoupper($item->product->unit) 
            . ' ' .$item->product->name }}</h3>
            <p>Retur: {{ $item->returned_quantity . ' ' . strtoupper($item->product->unit) }} </p>
        </div>

        <h5 class="text-teal-400 font-bold mb-4 ml-auto text-right text-lg">{{ 'Rp' . number_format($item->subtotal_amount) }}</h5>
    </div>

</div>