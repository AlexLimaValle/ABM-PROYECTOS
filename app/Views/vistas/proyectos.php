<?=$header?>
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Lista de proyectos</h2>
        </div>
        <div class="col-12">
            <div class="row justify-content-end">
                <div class="col-3">
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="<?=base_url("/crearProyecto")?>"
                        role="button"
                        >Crear Proyecto</a
                    >
                    
                </div>
            </div>
        </div>
        <div class="col-11 border-top border-3 border-primary p-2">
            <div class="row justify-content-end">
                <div class="col-1 text-center">
                    <label class="form-label" for="">Search: </label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-11 card">
            <table class="table">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Proyecto</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Fecha Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos as $items):?>
                        <tr>
                            <td><?=$items->id_proyecto?></td>
                            <td><?=$items->nombre?></td>
                            <td><?=$items->fecha_inicio?></td>
                            <td><?=$items->fecha_fin?></td>
                            <td><span class="badge text-bg-<?=$items->color?>"><?=$items->estado?></span></td>
                            <td><a
                                    name=""
                                    id=""
                                    class="btn btn-success"
                                    href="#"
                                    role="button"
                                    >Ver</a>
                                    <a
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                    href="#"
                                    role="button"
                                    >Editar</a>
                                    <a
                                    name=""
                                    id=""
                                    class="btn btn-danger"
                                    href="#"
                                    role="button"
                                    >Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
<?=$footer?>
