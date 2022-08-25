<?php

namespace App\Http\Livewire;

use App\Models\Besi;
use Livewire\Component;
use App\Models\Pemesanan;

class Besidropdown extends Component
{
    public $besis;

    public $selectedBesi = NULL;

     /**
     * Write code on Method
     *
     * @return response()
     */

    public function mount()
    {
        $this->besis = Besi::all();
        $this->pilihs = collect();
    }

    public function render()
    {
        return view('livewire.besidropdown');
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function updatedSelectedBesi($pilih)
    {
        if (!is_null($pilih)) {
            $this->pilihs = Besi::where('id', $pilih)->get();

        }
    }
}
