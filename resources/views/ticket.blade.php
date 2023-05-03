<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turno 58</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <p>
            JUNTA MUNICIPAL
            <br>DE AGUA Y SANEAMIENTO
            <br>Cd. Juárez, Chihuahua
            <br>{{CArbon::parse(now())->format('d/m/Y h:i:s')}}
        </p>
        <div style="max-width:12rem; border:1px dotted gray">
            <h1 style="text-align:center; ">
                TURNO
                <br><span style="font-size: 72px;">{{$turno}}</span>
            </h1>
        </div>
        <p class="centrado">¡GRACIAS POR SU ESPERA!
            <br>jmasjuarez.gob.mx
        </p>
    </div>
</body>

<script>
    window.print()
    setTimeout(() => {
        window.close()
    }, 1000);
</script>

</html>