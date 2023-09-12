
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
          {{ __('Products') }}
      </h2>
      <x-alert type="success"></x-alert>

  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
              <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300">View Products</h3>

              <!-- List Navbar -->
              <livewire:view-product :product="$product" />
          </div>
      </div>
  </div>
</x-app-layout>