
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-300 leading-tight">
            {{ __('Payments') }}
        </h2>
        <x-alert type="success"></x-alert>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold text-gray-700 dark:text-gray-300">Payments</h3>

                <form wire:submit="save" class="mt-6 space-y-6 bg-white dark:bg-gray-800 w-1/2">
                    @csrf

                    <div>
                        <x-input-label for="date" :value="__('Date')" />
                        <x-text-input id="date" name="date" model="form.date" type="date" class="mt-1 block w-full"
                            autocomplete="date" />
                        <x-input-error :messages="$errors->get('form.date')" class="mt-2" />

                    </div>

                    {{-- <div>
                        <x-input-label for="account_no" :value="__('Account No')" />
                        <x-text-input id="account_no" name="account_no" model="form.account_no" type="text" class="mt-1 block w-full"
                            autocomplete="account_no" />
                        <x-input-error :messages="$errors->get('form.account_no')" class="mt-2" />

                    </div>

                    <div>
                        <x-input-label for="account_name" :value="__('Account Name')" />
                        <x-text-input id="account_name" name="account_name" model="form.account_name" type="text" class="mt-1 block w-full"
                            autocomplete="account_name" />
                        <x-input-error :messages="$errors->get('form.account_name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="account_bank" :value="__('Account Bank')" />
                        <x-text-input id="account_bank" name="account_bank" model="form.account_bank" type="text" class="mt-1 block w-full"
                            autocomplete="account_bank" />
                        <x-input-error :messages="$errors->get('form.account_bank')" class="mt-2" />
                    </div> --}}


                    <div class="flex items-center">
                        <x-text-input id="is_pick_up" name="is_pick_up" model="form.is_pick_up" type="checkbox" class="mt-1 block mr-2"
                            autocomplete="is_pick_up">
                            {{ $this->form->is_pick_up }}
                        </x-text-input>
                        <x-input-label for="is_pick_up" :value="__('Is Pick Up')" />

                        <x-input-error :messages="$errors->get('form.is_pick_up')" class="mt-2" />
                    </div>

                    @if (!$this->form->is_pick_up)
                    <div>
                        <x-input-label for="customer_address" :value="__('Address')" />
                        <x-text-input id="customer_address" name="customer_address" model="form.customer_address" type="textarea" class="mt-1 block w-full"
                            autocomplete="customer_address">
                            {{ $this->form->customer_address }}
                        </x-text-input>
                        <x-input-error :messages="$errors->get('form.customer_address')" class="mt-2" />
                    </div>
                    @endif

                    <div>
                        <x-input-label for="payment_proof" :value="__('Payment Proof')" />
                        @if ($this->form->payment_proof)
                            <img src="{{ $this->form->payment_proof->temporaryUrl() }}" class="w-52 h-48 object-cover">
                        @endif
                        <x-text-input id="payment_proof" name="payment_proof" model="form.payment_proof" type="file" accept="image/png, image/jpeg, image/jpg" class="mt-1 block w-full"
                            autocomplete="payment_proof" />
                        <x-input-error :messages="$errors->get('form.payment_proof')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

