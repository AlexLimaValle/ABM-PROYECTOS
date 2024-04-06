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
                <div class="border-top border-3 border-primary overflow-hidden row justify-content-between">
                    <div class="col-4 mt-2"><h5 class="">Lista de Tareas:</h5></div>
                    <div class="col-3 mt-2">
                        <a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="#"
                            role="button"
                            data-bs-toggle="modal" 
                            data-bs-target="#staticBackdrop"
                            >+ Nueva tarea</a
                        >
                        
                    </div>
                    <table class="table col-12">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Tarea</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>                              
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <form class="modal-content" action="" method="POST">
                  <div class="modal-header">
                    <h2 class="modal-title fs-5 text-secondary" id="staticBackdropLabel"><?=strtoupper($proyecto->nombre)?></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <label class="form-label" for="nombreTarea">Tarea</label>
                            <input type="text" id="nombreTarea" name="tarea" class="form-control">
                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">Descripcion:</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
<?=$footer?>