<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Besi;

class Ukurankaryawan extends Component
{
    public $ukuranbesis;

    public $selectedUkuran = NULL;

     /**
     * Write code on Method
     *
     * @return response()
     */

    public function mount()
    {
        $this->ukuranbesis = Besi::all();
        $this->pilihs = collect();
    }

    public function render()
    {
        return view('livewire.ukurankaryawan')->extends('layouts.backend');
    }

     /**
     * Write code on Method
     *
     * @return response()
     */

    public function updatedSelectedUkuran($pilih)
    {
        if (!is_null($pilih)) {
            $this->pilihs = Besi::where('id', $pilih)->get();
        }
    }
}
