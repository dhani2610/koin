<?php

namespace App\Http\Livewire;

use App\Koinpack_customer;
use App\Koinpack_shopping_cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactInformation extends Component
{
    // public function mount()
    // {
        
    // }
    public function render()
    {
        $user = Auth::user();
        $customer = Koinpack_customer::where('id', $user->id)->first();

        return view('livewire.contact-information',);
    }
}
