<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;

use Livewire\Form;

class CreatePaymentForm extends Form
{

    #[Rule('boolean')]
    public $is_pick_up = false;
    #[Rule('required|date')]
    public $date = '';
    #[Rule('required_if:is_pick_up,false')]
    public $customer_address = '';

    // #[Rule('required')]
    // public $account_no = '';
    // #[Rule('required')]
    // public $account_name = '';
    // #[Rule('required')]
    // public $account_bank = '';
    #[Rule('image|max:1024')]
    public $payment_proof;
}
