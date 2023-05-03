<?php

namespace App\Http\Livewire;

use App\Models\Turno;
use App\Models\VModulosTema;
use Carbon\Carbon;
use Livewire\Component;

class ObtenerTurno extends Component
{
    public $centro_trabajo = 1;
    public $turno_actual;
    public $botones = [];

    public function mount()
    {
        //setear botones
        $this->setBotones();
    }

    public function render()
    {
        
        return view('livewire.obtener-turno');
    }


    public function getTurno($tema, $tipoMod)
    {
        $turnos = Turno::where('centro_trabajo', $this->centro_trabajo)
            ->where('tipo_modulo', $tipoMod)
            ->whereDate('created_at',  Carbon::now()->format('Y-m-d'))
            ->orderBy('id','DESC')
            ->limit(1)
            ->get();

        $turno = 1;

        if (count($turnos)>0) {
            $turno = $turnos[0]->numero + 1;
        }

        $addTurno = new Turno();
        $addTurno->centro_trabajo = $this->centro_trabajo;
        $addTurno->numero = $turno;
        $addTurno->tema = $tema;
        $addTurno->tipo_modulo = $tipoMod;
        $addTurno->save();

        $this->dispatchBrowserEvent('imprimir', ['turno'=> $turno]);
    }


    public function setBotones()
    {
        $this->botones = VModulosTema::get();
    }
}
