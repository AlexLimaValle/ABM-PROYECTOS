<?= $header?>
    <div class="row justify-content-center">
        <div class="col-11 border-bottom border-primary border-3">
            <h1>Lista de Tareas</h1>
        </div>
        <div class="col-11 mt-3">
            <div class="row justify-content-end align-items-center">
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">Buscar</span>
                        <input type="text" id="tareas" name="tarea" class="form-control">
                    </div>
                </div>
                <div class="col-2">
                    <button id="busquedaTareas" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <button id="borrarTodo" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i></button>
                </div>
            </div>
        </div>
        <div class="col-11 mt-3 card overflow-auto" style="height:300px">
            <table class="table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Proyecto</th>
                        <th>Tarea</th>
                        <th>Inicio de proyecto</th>
                        <th>Fin de proyecto</th>
                        <th>Estado de proyecto</th>
                        <th>Estado de tarea</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id="tareaContenido">
                    <?php foreach($data as $key=>$items):?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$items->nombreProyecto?></td>
                            <td><?=$items->tareaNombre?></td>
                            <td><?=$items->fecha_inicio?></td>
                            <td><?=$items->fecha_fin?></td>
                            <?php switch($items->estadoProyecto):
                               case 'pendiente': ?>
                                    <td><p class="badge text-bg-secondary"><?=$items->estadoProyecto?></p></td>
                                <?php break;?>
                                <?php case 'realizado':?>
                                    <td><p class="badge text-bg-success"><?=$items->estadoProyecto?></p></td>
                                <?php break;?>
                                <?php case 'cancelado':?>
                                    <td><p class="badge text-bg-danger"><?=$items->estadoProyecto?></p></td>
                                <?php break;?>
                            <?php endswitch;?>
                            <?php switch($items->estadoTarea):
                               case 'Pendiente': ?>
                                    <td><p class="badge text-bg-secondary"><?=$items->estadoTarea?></p></td>
                                <?php break;?>
                                <?php case 'En proceso':?>
                                    <td><p class="badge text-bg-success"><?=$items->estadoTarea?></p></td>
                                <?php break;?>
                                <?php case 'Finalizado':?>
                                    <td><p class="badge text-bg-danger"><?=$items->estadoTarea?></p></td>
                                <?php break;?>
                            <?php endswitch;?>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Acciones</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?=base_url('/tarea/borrar/').$items->idTarea?>">Borrar</a></li>
                                        <li><a class="dropdown-item" href="<?=base_url("tarea/actualizar/").$items->idTarea?>">Actualizar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url().'javascript/tarea.js'?>"></script>
<?= $footer?>