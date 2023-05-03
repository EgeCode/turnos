<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <form action="{{route('signin')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input class="form-control" name="username" id="username" autofocus>
                            @error('username')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pin">PIN</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('pin')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="btnEntrar" id="btnEntrar" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>