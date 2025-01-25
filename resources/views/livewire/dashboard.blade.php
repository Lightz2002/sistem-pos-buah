<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Status Orders --}}
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-blue-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                    </div>

                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Verifying Order</h3>
                        <h5 class="text-3xl">{{ $data->verifyingOrder }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-teal-600 rounded-full p-4 min-w-1/2 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                          </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Packing Order</h3>
                        <h5 class="text-3xl">{{ $data->packingOrder }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-indigo-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Delivering Order</h3>
                        <h5 class="text-3xl">{{ $data->deliveringOrder }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-green-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Received Order</h3>
                        <h5 class="text-3xl">{{ $data->receivedOrder }}</h5>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-blue-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                    </div>

                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Today Order</h3>
                        <h5 class="text-3xl">{{ $data->totalTodayOrder }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-teal-600 rounded-full p-4 min-w-1/2 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Today Revenue</h3>
                        <h5 class="text-3xl">Rp{{ number_format($data->totalTodayOrderRevenue) }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-red-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Out Of Stock Products</h3>
                        <h5 class="text-3xl">{{ $data->outOfStockProducts }}</h5>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center">
                    <div class="bg-indigo-600 rounded-full p-4 me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                          </svg>
                          
                    </div>
                    <div>
                        <h3 class="mb-2 text-sm text-gray-400">Total Products</h3>
                        <h5 class="text-3xl">{{ $data->totalProduct }}</h5>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-4 rounded-md flex justify-start items-center lg:col-start-1 lg:col-end-4">
                    <canvas id="chart"></canvas>
                    {{-- <livewire:livewire-line-chart
                    key="{{ $data->chart->reactiveKey() }}"
                    :line-chart-model="$data->chart"
                    /> --}}
                </div>

                <div class="bg-white dark:bg-gray-800 p-4 rounded-md">
                    <h3 class="mb-4 text-lg">Recent Order</h3>

                    @foreach ($data->recentOrders as $recentOrder)
                        <div class="flex mb-2">
                            <div>
                                <h3>{{ ucwords($recentOrder->customer->name) }}</h3>
                                <h5 class="text-gray-400">{{ \Carbon\Carbon::make($recentOrder->date)->diffForHumans() }}</h5>
                            </div>

                            <div class="ml-auto">
                                <h3 class="text-teal-400">Rp{{ number_format($recentOrder->total_amount) }}</h3>
                            </div>
                        </div>
                    @endforeach
                    
                    @if ($data->recentOrders->count() === 0)
                    <h5 class="text-center text-gray-400">Oops, There's No Order</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script type="module" src="{{ vite_asset('js/app.js') }}"></script> --}}

<script type="module">
    {{-- import {Chart} from 'chart.js'; --}}
    const chart = new Chart(
        document.getElementById('chart'), {
            type: 'line',
            data: {
                labels: @json($data->chart->labels),
                datasets: @json($data->chart->dataset)
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        }
    );
    Livewire.on('updateChart', data => {
        chart.data = data;
        chart.update();
    });
</script>