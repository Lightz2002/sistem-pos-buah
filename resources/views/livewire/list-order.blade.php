<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
            {{ __('Order') }}
        </h2>
        <x-alert type="success"></x-alert>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300">Order List</h3>

                <!-- List Navbar -->
                <livewire:order-table />
            </div>
        </div>
    </div>
</div>


<script>

    const statusButtons = document.querySelectorAll('.show-status-modal');
  
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
    statusButtons.forEach(button => {
        const orderId = button.getAttribute('data-order-id');
        const orderStatus = button.getAttribute('data-order-status');
        button.addEventListener('click', function () {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, accept!'
            }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/orders/${orderId}/status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ status: orderStatus }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire(
                        'Success',
                        data.message,
                        'success'
                        )
                    })
                    .catch(error => {
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
            }
            })
        });
    })
  
  </script>