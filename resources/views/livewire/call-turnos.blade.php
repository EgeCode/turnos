<div>
    <?php use Carbon\Carbon; ?>
    <style>
        body {
            background-color: #D7D8D9;
        }
    </style>

    <div class="container p-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">GESTION DE TURNOS</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4" style="height:100%;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="atiende"><strong> Atiende</strong></label>
                                    <input type="text" id="atiende" wire:model="nombre_usuario" @error('nombre_usuario') class="form-control is-invalid" @else class="form-control" @enderror readonly>
                                    @error('nombre_usuario')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <label for="tipo"><strong> Tipo de módulo</strong></label>
                                    <select name="tipo" id="tipo" wire:model="tipo_modulo" @error('tipo_modulo') class="form-select is-invalid" @else class="form-select" @enderror autofocus>
                                        <option value=""> ---Seleeciona una opción--- </option>
                                        @foreach($tipos_modulos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_modulo')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-1">
                                    <label for=" modulo"><strong>Módulo</strong></label>
                                    <input type="text" id=" modulo" wire:model.defer="modulo" @error('modulo') class="form-control is-invalid" @else class="form-control" @enderror>
                                    @error('modulo')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-lg-5">
                                    <label><strong> Centro de trabajo</strong></label>
                                    @if($centro_trabajo == 0)
                                    <input type="text" wire:model.defer="centro_trabajo_nombre" class="form-control is-invalid text-danger" readonly>
                                    @error('centro_trabajo_nombre')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    @else
                                    <input type="text" wire:model.defer="centro_trabajo_nombre" class="form-control" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="text-center">
                    <small class="text-muted">Turnos pendientes de atención {{count($turnos_sin_atender)}}</small>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <h5>Turnos atendidos</h5>
                    </div>
                    <div class="col-lg-4">
                        <h5>Número llamado</h5>
                    </div>
                </div>
                <div class="row" style="height:50vh; max-height: 50vh;">
                    <div class="col-lg-8">
                        <div class="card" style="max-height: 50vh; overflow:auto">
                            
                                <ul class="list-group list-group-flush">
                                    @foreach($turnos_atendidos as $item)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>
                                            <strong>{{$item->numero}} .- {{$item->tema}}</strong>
                                            <div>{{$item->tipoMod}}</div>
                                            <small class="text-muted">Módulo {{$item->modulo}}</small>
                                        </div>
                                        <small class="text-muted">
                                            <strong>Tiempo de respuesta</strong><br>
                                            {{Carbon::parse($item->created_at)->diffForHumans()}}
                                        </small>
                                    </li>
                                    @endforeach
                                </ul>
                            
                        </div>
                    </div>
                        <div class="col-lg-4">
                            <div class="h-100">
                                <div class="card h-75 d-flex align-items-center justify-content-center">
                                    <h1 style="font-size: 17rem;">{{$turno_actual}}</h1>
                                </div>
                                <div class="card h-25">
                                    <button class="btn btn-primary h-100" style="font-size:2rem; background-color: #012E69;" wire:click="llamarTurno()">Llamar turno</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

        </div>
    </div>