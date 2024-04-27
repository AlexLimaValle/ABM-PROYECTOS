<?=$header?>
        <div class="col-12" style="height:70%">
            <div class="row justify-content-evenly mt-5" style="height:60vh">
                <div class="col-8" style="height:100%">
                    <div class="row card">
                        <h6 class="fw-bold p-3">Progreso del Proyecto</h6>
                        <hr>
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Proyecto</th>
                                    <th>Progreso</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datosDeProyecto as $key=>$item):?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=$item->nombre?></td>
                                        <td>
                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 93%"></div>
                                            </div>
                                            <p style="font-size:10px;" class="text-secondary mt-1">0% completado</p>
                                        </td>
                                        <td><p class="badge text-bg-<?=$item->color?>"><?=$item->estado?></p></td>
                                        <td><a
                                            name=""
                                            id=""
                                            class="btn btn-primary"
                                            href="<?=base_url('/verProyecto/').$item->id_proyecto?>"
                                            role="button"
                                            ><i class="fa-solid fa-folder pe-2"></i>Ver</a
                                        >
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3" style="height:70%">
                    <div class="row" style="height:100%">
                        <div class="col-12 bg-primary rounded" style="height:40%">
                            <div class="row justify-content-between align-items-end">
                                <div class="col-8 text-light mt-3">
                                    <h5><?=$cantProyecto->id_proyecto?></h5>
                                    <p class="">Total de Proyectos</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-light"><i class="fa-solid fa-layer-group fs-1"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 bg-primary rounded" style="height:40%">
                            <div class="row justify-content-between align-items-end">
                                <div class="col-8 text-light mt-3">
                                    <h5><?=$cantTarea->id_tarea?></h5>
                                    <p class="">Total de Tareas</p>
                                </div>
                                <div class="col-3">
                                    <p class="text-light"><i class="fa-solid fa-list-check fs-1"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?=$footer?>