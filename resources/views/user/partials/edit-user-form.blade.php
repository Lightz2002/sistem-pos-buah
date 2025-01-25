<section>
<header>
    <x-header-form>
        {{ __('Change User Data') }}
    </x-header-form>
</header>

<form method="post" action="{{ route('users.update', ['user' => $user]) }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" :value="old('name', $user->name)" type="text" class="mt-1 block w-full"
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)"
            required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="role" :value="__('Role')" />
        <x-select name="role" :options="$roles" :selected="count($user->roles) ? $user->roles[0]->id : $roles[0]->id" class="w-full" />
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="phone_no" :value="__('Phone Number')" />
        <x-text-input id="phone_no" name="phone_no" :value="old('phone_no', $user->phone_no)" type="text" class="mt-1 block w-full"
            autocomplete="phone_no" />
        <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" name="address" :value="old('address', $user->address)" type="text" class="mt-1 block w-full"
            autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

    </div>
</form>
</section>
