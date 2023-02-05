<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;
use Livewire\WithPagination;


class ContactIndex extends Component
{
    // metode 1
    // public $contacts;
    
    // public function render()
    // {
    //     $this->contacts = Contact::latest()->get();
    //     return view('livewire.contact-index');
    // }

    // metode 2
    // public function render()
    // {
    //     $contacts = Contact::latest()->get();
    //     return view('livewire.contact-index',[
    //         'contacts' => $contacts
    //     ]);

    // }
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; //utk yang berantakan tampilan pagination nya
    public $paginate = 5;

    public $search;

    public $statusUpdate = false; //utk edit

    protected $listeners = [
        'contactStored' => 'handleStored',
        // setiap terjadi emit dgn nama'contactStored' dimanapun, maka akan menjalankan component yang ada dlm contacts ini
        //utk kasus ini, setelah proses function store(di 'contactCreate.php') berhasil, maka menjalankan listener
        'contactUpdated' => 'handleUpdated'
        
    ];

    // utk search
    protected $queryString = ['search'];
    public function mount() //seperti constaktor
    {
        $this->search = request()->query('search', $this->search);
    }
    // utk search


    
    public function render()
    {
        // $contacts = Contact::latest()->get();
        $this->search === null ?
            $contacts = Contact::latest()->paginate($this->paginate) :
            $contacts = Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate) ;


        return view('livewire.contact-index',[
            'contacts' => $contacts
        ]);

    }

    public function handleStored($contact) //$contact adl data/parameter yang di passing
    {
        // dd($contact); di disable, kecuali memiliki proses terhadap data yg baru di store/create tadi
        session()->flash('message', 'Contact ' . $contact['name'] . ' was stored');
    }

    public function getContact($id)
    {
        $this->statusUpdate = true; //menjadi triger, letaknya di pengkondisian index (line 11)

        $contact = Contact::find($id);
        $this->emit('getContact', $contact);//ada variable yg di pass
        //utk kasus ini, dipassing ke listener contactUpdate.php

    }

    public function handleUpdated($contact) //$contact adl data/parameter yang di passing
    {
        // dd($contact); di disable, kecuali memiliki proses terhadap data yg baru di store/create tadi
        session()->flash('message', 'Contact ' . $contact['name'] . ' was updated');
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contact was deleted!');
        }
    }

}
