

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
            {{ __('User') }}
        </h2>
        <x-alert type="success"></x-alert>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300">User List</h3>

                <!-- List Navbar -->
                <livewire:users-table />
            </div>
        </div>
    </div>

<script>

    const editButtons = document.querySelectorAll('.edit-user-button');

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    editButtons.forEach(button => {
        const userId = button.getAttribute('data-user-id');
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
                fetch(`/users/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire(
                        'Success',
                        data.message,
                        'success'
                        )

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    })
                    .catch(error => {
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
            }
            })
        });
    })
</script>
</x-app-layout>
