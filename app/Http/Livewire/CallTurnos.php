<?php

namespace App\Http\Livewire;

use App\Models\CatTiposModulo;
use App\Models\CentroTrabajo;
use App\Models\Turno;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CallTurnos extends Component
{

    public $usuario;
    public $nombre_usuario;
    public $tipo_modulo;
    public $tipos_modulos = [];
    public $modulo;
    public $centro_trabajo = 0;
    public $centro_trabajo_nombre;
    public $turno_actual;
    public $turnos_atendidos = [];
    public $turnos_sin_atender = [];

    public function mount()
    {

        //setear valores de la sesion
        $this->usuario = Auth::user()->id;
        $this->nombre_usuario = Auth::user()->nombre;

        $this->getCentroTrabajo();
        $this->listModulos();
        $this->listTurnosAtendidos();
    }

    public function render()
    {
        $this->listTurnosAtendidos();
        $this->getNumTurnosPendientes();
        return view('livewire.call-turnos');
    }

    public function listModulos()
    {
        $this->tipos_modulos = CatTiposModulo::where('active', 1)
            ->orderBy('nombre')
            ->get();
    }

    private function getIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public function getCentroTrabajo()
    {
        $ip =  "172.16.11.142";
        // $ip = $this->getIpAddress();
        $octeto =  explode('.', $ip)[2];
        $centro = CentroTrabajo::where('ip', $octeto)->where('active', 1)->first();

        if ($centro != null) {
            $this->centro_trabajo = $centro->id;
            $this->centro_trabajo_nombre = $centro->nombre;
        } else {
            $this->centro_trabajo_nombre = "NO SE RECONOCE EL CENTRO DE TRABAJO";
        }
    }


    public function llamarTurno()
    {
        $this->validate([
            'usuario' => 'required',
            'tipo_modulo' => 'required',
            'modulo' => 'required',
            'centro_trabajo_nombre' => 'required',
        ]);


        $turno = Turno::where('centro_trabajo', $this->centro_trabajo)
            ->whereDate('created_at',  Carbon::now()->format('Y-m-d'))
            ->where('atiende', null)
            ->where('tipo_modulo', $this->tipo_modulo)
            ->orderBy('id')
            ->first();

        if ($turno != null) {
            
            $this->turno_actual = $turno->numero;
            $turno->modulo = $this->modulo;
            $turno->atiende = $this->usuario;
            $turno->save();

            $this->listTurnosAtendidos();
        }else{

            //enviar notificacion de que no hay tickets pendientes
        }
    }

    public function listTurnosAtendidos()
    {
        $turnos = Turno::leftJoin('cat_tipos_modulos', 'cat_tipos_modulos.id', 'turnos.tipo_modulo')
        ->select(DB::raw('turnos.*, cat_tipos_modulos.nombre as tipoMod, TIMESTAMPDIFF(MINUTE,turnos.created_at,turnos.updated_at) AS tiempo_respuesta'))
            ->where('centro_trabajo', $this->centro_trabajo)
            ->whereDate('turnos.created_at',  Carbon::now()->format('Y-m-d'))
            ->where('atiende', $this->usuario)
            ->orderBy('turnos.id','DESC')
            ->get();

        $this->turnos_atendidos = $turnos;
    }

    public function getNumTurnosPendientes()
    {
        $turnos = Turno::where('centro_trabajo', $this->centro_trabajo)
            ->whereDate('created_at',  Carbon::now()->format('Y-m-d'))
            ->where('atiende', null)
            ->where('tipo_modulo', $this->tipo_modulo)
            ->get();

        $this->turnos_sin_atender = $turnos;

    }
}
