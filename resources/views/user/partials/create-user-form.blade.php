<section>
<header>
    <x-header-form>
        {{ __('User Data') }}
    </x-header-form>
</header>

<form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6 bg-white dark:bg-gray-800">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" model="name" :value="old('name')" type="text" class="mt-1 block w-full"
            autocomplete="name" />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" model="email" :value="old('email')"
            required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" model="password" type="password" class="mt-1 block w-full"
            autocomplete="password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" model="password_confirmation" type="password"
            class="mt-1 block w-full" autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="role" :value="__('Role')" />
        <x-select name="role" name="role" id="role" :options="$roles" :selected="$roles[0]->id" class="w-full" />
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
</section>
