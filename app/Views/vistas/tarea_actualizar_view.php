<?=$header?>
    <form method="GET" action="<?=base_url('tarea/guardarActualizacion').'/'.$idTarea?>" class="row justify-content-evenly">
        <div class="col-5 card p-3">
            <div class="row">
                <div class="col-12">
                    <h6 class="lead"><?=strtoupper($datosTarea->nombreTarea)?></h6>
                </div>
                <div class="col-12">
                    <label for="tareaNombre" class="form-label">NombreTarea: </label>
                    <input value="<?=$datosTarea->nombreTarea?>" type="text" name="tareaActualizarNombre" id="tareaNombre" class="form-control">
                </div>
                <div class="col-12 mt-2">
                    <label for="estadoTareas">Estado: </label>
                    <select class="form-select" name="estadosTarea" id="estadoTareas">
                        <?php foreach($todoEstados as $estado):?>
                            <?php if($estado->nombre == $datosTarea->nombreEstadoTarea):?>
                                <option value="<?=$estado->id_estado?>" selected><?=$estado->nombre?></option>
                            <?php else:?>
                                <option value="<?=$estado->id_estado?>"><?=$estado->nombre?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <label for="descript">Descripcion: </label>
                    <textarea class="form-control" name="descripcion" id="descript"><?=$datosTarea->descripcionTarea?></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary mt-3">Actualizar</button>
                </div>
            </div>
        </div>
        <div class="col-5 card p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tareas as $key=>$tarea):?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$tarea->tareaNombre?></td>
                            <td><?=$tarea->descripcionTarea?></td>
                            <td></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </form>
<?=$footer?>