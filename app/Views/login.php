<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="lead">LOGIN</h1>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url('/login_form')?>" method="post">
                            <div class="mt-2">
                                <label for="usuario" class="form-label">Usuario:</label>
                                <input type="text" name="username" id="usuario" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="contra" class="form-label">Contraseña:</label>
                                <input type="password" name="password" id="contra" class="form-control">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <button type="reset" class="btn btn-danger">Eliminar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">2024</div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>