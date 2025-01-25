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
                <livewire:order-table exportButton={{ true }}/>
            </div>
        </div>
    </div>
</div>


<script>

    const statusButtons = document.querySelectorAll('.show-status-modal');
    const returnButtons = document.querySelectorAll('.show-return-modal');
  
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
                        ).then(result => {
                            if (result.isConfirmed) window.location.reload();
                        })
                    })
                    .catch(error => {
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
            }
            })
        });
    })

    returnButtons.forEach(button => {
        const orderId = button.getAttribute('data-order-id');
        const orderStatus = button.getAttribute('data-order-status');
        button.addEventListener('click', function () {
            fetch(`/orders/${orderId}/orderitems`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                      // Create a template element
                        const template = document.createElement('template');

                        // Set the HTML content of the template
                        template.innerHTML = `
                            <table width="100%" class="return-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Size</th>
                                        <th>Bought Quantity</th>
                                        <th>Return Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        `;

                        // Extract the content from the template
                        const returnModalContent = template.content.firstElementChild;
                        const tbody = returnModalContent.querySelector('tbody');


                        // Assuming 'data' is an object with an 'orderItems' property
                        const orderItemRows = data.orderItems.map(item => {
                            // Create a template element
                            const template2 = document.createElement('template');

                            // Set the HTML content of the template
                            template2.innerHTML = `
                                <tr>
                                    <td>
                                        <input type="checkbox" value="${item.id}" class="return-product-checkbox"/>    
                                    </td>
                                    <td>${item.product.name}</td>
                                    <td>${item.product.size}</td>
                                    <td>${item.quantity}</td>
                                    <td>
                                        <input type="number" class="return-product-quantity" data-id="${item.id}" name="returned_quantity"/>    
                                    </td>
                                </tr>
                            `;

                            // Extract the content from the template
                            return template2.content.firstElementChild;
                        });

                        // Append the rows to the table
                        orderItemRows.forEach(row => {
                            tbody.appendChild(row);
                        });


                        Swal.fire({
                            title: 'Return Form',
                            html: returnModalContent,
                            showCancelButton: true,
                            confirmButtonText: 'Save',
                            customClass: {
                                popup: 'custom-swal-popup'
                            }
                        }).then((result) => {
                            const selectedReturnProducts = document.querySelectorAll('.return-product-checkbox:checked');
                            const returnedQuantityInputs = document.querySelectorAll('.return-product-quantity');

                            const selectedReturnProductIds = Array.from(selectedReturnProducts).map(selectedReturnProduct => selectedReturnProduct.value);
                            const selectedReturnProductQuantities = Array.from(returnedQuantityInputs)
                            .filter(returnedQuantityInput => selectedReturnProductIds.includes(returnedQuantityInput.dataset.id))
                            .map(returnedQuantityInput => returnedQuantityInput.value);

                            const resultArray = selectedReturnProductIds.map((selectedReturnProductId, index) => ({
                            id: selectedReturnProductId,
                            value: +selectedReturnProductQuantities[index] || 0
                            }));


                            if (result.isConfirmed) {
                                fetch(`/orders/${orderId}/orderitems`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    },
                                    body: JSON.stringify(resultArray),
                                })  .then((response) => {
                                        return response.json(); // This line is crucial to get the response data
                                    })
                                    .then((data) => {
                                        if (data.status !== 200) throw new Error(data.message);
                                        Swal.fire('Success', data.message, 'success').then(result => {
                                            if (result.isConfirmed) window.location.reload();
                                        });
                                    })
                                    .catch((error) => {
                                        Swal.fire('Invalid Data', error.message, 'error');
                                        // If you want to access the message returned by Laravel
                                    });
                            }

                        });
                    })
                    .catch(error => {
                        console.log(error);
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
        });
    })
  
  </script>