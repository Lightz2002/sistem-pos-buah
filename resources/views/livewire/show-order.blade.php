<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
            {{ __('Order') }}
        </h2>
        <x-alert type="success"></x-alert>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8 lg:grid
            grid-cols-2 gap-4">
                <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300 col-span-2">Order Details</h3>

                <div class="bg-white rounded-md mb-4"> 
                    <h2 class="bg-teal-400 rounded-t-md p-4 text-lg font-bold mb-4">Items</h2>

                    <div class="p-4">
                        @foreach ($order->order_items as $item)
                            <livewire:order-item wire:key='{{ $item->id }}' :item="$item"/>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-md">
                    <h2 class="bg-teal-400 rounded-t-md text-lg p-4 font-bold mb-4 col-span-2">Data</h2>

                    <div class="p-4 grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="font-semibold">Date</h3>
                            <h3>{{ $order->date }}</h3>
                        </div>

                        <div>
                            <h3 class="font-semibold">Address:</h3>
                            <h3>{{ $order->customer_address }}</h3>
                        </div>

                        <div>
                            <h3 class="font-semibold">Total:</h3>
                            <h3>Rp{{ number_format($order->total_amount) }}</h3>
                        </div>
                    </div>
                </div>

                @if (auth()->user()->hasRole('sales'))
                <div class="bg-white rounded-md col-span-2">
                    <h2 class="bg-teal-400 rounded-t-md p-4 text-lg font-bold mb-4">Payment</h2>

                    <div class="grid grid-cols-2 gap-4 p-4">
                        <div class="rounded-md w-1/2 h-80">
                            <img src="{{ asset('storage/' . $order->payment->payment_proof) }}" alt="Bukti Bayar"
                            class="h-full w-full object-cover mb-4">
                        </div>

                        <div class="grid grid-cols-2 gap-4 items-start content-start">
                            <div>
                                <h3 class="font-semibold">Account No</h3>
                                <h3>{{ $order->payment->account_no }}</h3>
                            </div>

                            <div>
                                <h3 class="font-semibold">Account Name</h3>
                                <h3>{{ $order->payment->account_name }}</h3>
                            </div>

                            <div>
                                <h3 class="font-semibold">Account Bank</h3>
                                <h3>{{ $order->payment->account_bank }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
