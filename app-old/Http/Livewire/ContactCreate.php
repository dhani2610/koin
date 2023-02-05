<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    // sementara tidak pakai no.1
    // public $contactskudua; //2. mempassing data "$contactskudua" ke function render (contact-create.blade) 

    // public function mount($contactsku) //1. memanggil variable "contactsku" di contact-index.blade
    // {
    //     // dd($contactsku);
    //     $this->contactskudua = $contactsku; // 3. memberi value pada variable $contactskudua
    // }
    
    // jk sprt ini tdk realtime no.2
    // public $name = 'Hakim' ; 

    public $name ; 
    public $phone ; 

    
    public function render()
    {
        return view('livewire.contact-create'); 
    }

    public function store()
    {

        $this->validate([
            'name'  =>'required|min:3',
            'phone'  =>'required|max:15',
        ]);
        
        $contact = Contact::create([
            'name'  =>$this->name,
            'phone'  =>$this->phone,
        ]);

        $this->resetInput();

        // utk melakukan refresh
        $this->emit('contactStored', $contact);// contactStored : listener, $contact: passing data/parameter
    }

    private function resetInput() //menggunakan Private krn tdk dijalankan didlm view nya
    {
        $this->name = null;
        $this->phone = null;

    }
}
