<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">          
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    #header{
        width:15%;
        height:100vh
    }
</style>

<body class="d-flex flex-row justify-content-between">
    <header id="header" class="bg-dark row">
        <div class="col-12 d-flex flex-column justify-content-between">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <img src="https://png.pngtree.com/element_our/sm/20180704/sm_5b3c90258d55d.png" alt="dragon" class="w-50 h-75">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-success m-1 w-100" href="<?=base_url('/');?>" role="button"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="col-12">
                    <a class="btn btn-success m-1 w-100" href="#" role="button"><i class="fa-solid fa-folder-open me-2"></i>Proyectos</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-success m-1 w-100" href="#" role="button"><i class="fa-solid fa-clipboard-check me-2"></i>Tareas</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-success m-1 w-100" href="<?=base_url('usuarios');?>" role="button"><i class="fa-solid fa-users me-2"></i>Usuarios</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-success m-1 w-100" href="<?=base_url('personal')?>" role="button"><i class="fa-solid fa-person me-2"></i>Personal</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-light text-center"><span class="me-2"><i class="fa-solid fa-user"></i></span><?php
                        $session = \Config\Services::session();
                        echo $session->get('usuario')
                    ?></h6>
                    <a name="" id="" class="btn btn-primary w-100 m-1" href="<?=base_url('cerrar')?>" role="button">Cerrar session</a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>