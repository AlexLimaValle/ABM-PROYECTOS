<?=$header?>
    <div class="row justify-content-center">
        <div class="col-10 p-2 border-start border-5 border-primary shadow-sm" style="background-color:#fff;">
            <div class="row justify-content-evenly">
                <div class="col-5">
                    <div class="row">
                        <div class="col-7">
                            <h6 class="fw-bolt border-bottom border-primary">Nombre de Proyecto</h6>
                            <p class="text-secondary"><?=$proyecto->nombre?></p>
                        </div>
                        <div class="col-7">
                            <h6 class="fw-bolt border-bottom border-primary">Descripcion</h6>
                            <p class="text-secondary"><?=$proyecto->descripcion?></p>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="fw-bolt border-bottom border-primary">Fecha Inicio</h6>
                            <p class="text-secondary fw-bold"><?=date_format(new DateTime($proyecto->fecha_inicio),'M d, Y')?></p>
                        </div>
                        <div class="col-12">
                            <h6 class="fw-bolt border-bottom border-primary">Fecha Fin</h6>
                            <p class="text-secondary fw-bold"><?=date_format(new DateTime($proyecto->fecha_fin),'M d, Y')?></p>
                        </div>
                        <div class="col-12">
                            <h6 class="fw-bolt border-bottom border-primary">Estado</h6>
                            <p class="text-secondary"><?=$proyecto->estado?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly mt-1">
            <div class="col-4 mt-2 border-top border-primary border-3 shadow-sm"  style="background-color:#fff;">
                <div class="mt-2">
                    <h5 class="fw-bold">Miembros del equipo:</h5>
                    <hr>
                </div>
                <div class="d-flex flex-row justify-content-evenly">
                    <?php foreach($personal as $persona):?>
                        <div class="d-flex flex-column">
                            <img class="ms-3" src="data:image/*;base64,<?php echo $persona['imagen'];?>" alt="imagen" style="width:40px;height:40px;border-radius:20px;">
                            <p class="text-center fw-bold text-secondary" style="font-size:10px;"><?=$persona['nombre']." ".$persona['apellidos']?></p>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-7 mt-2">
                <div class="border-top border-3 border-primary"></div>
            </div>
        </div>
    </div>
<?=$footer?>