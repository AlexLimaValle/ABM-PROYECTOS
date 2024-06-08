<?=$header?>
    <div class="row justify-content-center">
        <div class="col-11">
            <h2>Lista de proyectos</h2>
        </div>
        <div class="col-12">
            <div class="row justify-content-end">
                <div class="col-3 mb-3">
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="<?=base_url("/crearProyecto")?>"
                        role="button"
                        >+ Crear Proyecto</a
                    >
                </div>
            </div>
        </div>
        <div class="col-12 border-top border-3 border-primary p-2">
            <div class="row justify-content-end">
                <div class="col-3">
                    <div class="input-group">
                        <span class="input-group-text">Buscar</span>
                        <input type="text" id="buscador" name="buscar" placeholder="Buscar" class="form-control">
                    </div>
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
                <tbody id="table_body">
                    <?php foreach($datos as $key=>$items):?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$items->nombre?></td>
                            <td><?=$items->fecha_inicio?></td>
                            <td><?=$items->fecha_fin?></td>
                            <td><span class="badge text-bg-<?=$items->color?>"><?=$items->estado?></span></td>
                            <td><a
                                    name=""
                                    id=""
                                    class="btn btn-success"
                                    href="<?=base_url()?>verProyecto/<?=$items->id_proyecto?>"
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
                                    href="<?=base_url("/eliminarProyecto").'/'.$items->id_proyecto?>"
                                    role="button"
                                    >Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url().'javascript/proyectos.js'?>"></script>
<?=$footer?>
