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
                            <p class="badge text-bg-dark"><?=strtoupper($proyecto->estadoProyecto)?></p>
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
            <div class="col-7 mt-2"  style="overflow:auto;height:200px">
                <div class="border-top border-3 border-primary row justify-content-between">
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
                            >+ Nuevo</a
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
                            <?php foreach($tareas as $key=>$items):?>
                                <tr>
                                    <td><?=$key?></td>
                                    <td><?=$items['nombre']?></td>
                                    <td><?=$items['descripcion']?></td>
                                    <td><p class="badge text-bg-secondary"><?=$items['nombreEstado']?></p></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Acciones
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?=base_url('tarea/borrar/').$items['id_tarea']?>">Borrar</a></li>
                                                <li><a class="dropdown-item" href="#">Editar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>   
                    </table>
                </div>
            </div>                              
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <form class="modal-content" action="<?=base_url('/tarea/agregar/'.$proyecto->id_proyecto);?>" method="GET">
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
                            <label for="desc" class="form-label">Descripcion:</label>
                            <textarea class="form-control" name="descripcion" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-10">
                            <?php 
                            foreach($estadoDeTarea as $key=>$estado){
                                $estados[$key+1] = $estado->nombre; 
                            }
                            echo form_dropdown('estadoDeTarea',$estados,'1',['class'=>'form-select mt-2']);
                            ?>
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