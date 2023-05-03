<div>
    <style>
        * {
            font-family: 'Verdana';
        }
    </style>
    <div class="container" style="height:100vh;">
        <div class="pt-4">
            <h1>¿En que podemos ayudarte?...</h1>
        </div>
        <br>
        
        <div class="row gx-2 h-100">
        @foreach($botones as $item)
            <div class="col">
                <div class="card" style="width: 18rem; height: 21rem ; padding:0">
                    <div class="card-body">
                        <button wire:click="getTurno('{{$item->tema}}', '{{$item->idTipo}}')" 
                        class="btn btn-primary h-100 w-100" style="font-size: 2rem;">
                            {{$item->tema}}
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('imprimir', function(e){
            window.open('/print/'+ e.detail.turno)
        })
    </script>
</div>