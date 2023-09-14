<x-nav-link :href="route('products')" :active="request()->is('products*')"> {{ __('Products') }}
</x-nav-link>

<x-nav-link :href="route('orders')" :active="request()->is('orders*')"> {{ __('Orders') }}
</x-nav-link>
