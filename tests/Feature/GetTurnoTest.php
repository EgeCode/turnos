<?php

namespace Tests\Unit;

use App\Models\CentroTrabajo;
use App\Models\Turno;
use App\Models\VModulosTema;
use Carbon\Carbon;
use Tests\TestCase;


class GetTurnoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected $turnos=[];
    protected $botones=[];
    protected $centro_trabajos=[];

    public function test_example()
    {
        $this->turnos = Turno::where('centro_trabajo', 1)
        ->whereDate('created_at',  Carbon::now()->format('Y-m-d'))
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get(); 

        if(count($this->turnos) == 1){

            if($this->turnos[0]->numero == 2)
                $this->assertTrue(true);
        }
         
    }

    public function test_get_botones()
    {
        $this->assertDatabaseCount('v_modulos_tema', 2);

    }
}