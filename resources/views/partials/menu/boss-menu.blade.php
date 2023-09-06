<x-nav-link :href="route('users')" :active="request()->is('users*')"> {{ __('Users') }}
</x-nav-link>
