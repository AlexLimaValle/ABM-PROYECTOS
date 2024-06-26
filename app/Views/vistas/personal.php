<?=$header?>
    <div class="col-11 border-bottom border-primary ms-4">
        <h2 class="">Lista De Personal</h2>
    </div>
    <div class="col-11 ms-4 border-top border-3 border-primary bg-light">
        <div class="row justify-content-end border-bottom border-secondary p-3">
            <div class="col-3 d-flex flex-row justify-content-end">
                <a
                    name=""
                    id=""
                    class="btn btn-primary"
                    href="<?=base_url('/editarPersonal');?>"
                    role="button"
                    >Nuevo Usuario</a
                >
            </div>
        </div>
        <div class="row justify-content-end p-3">
            <div class="col-4">
                <div class="input-group">
                    <span class="input-group-text">Buscar:</span>
                    <input type="text" id="buscador" class="form-control">
                </div>
            </div>
        </div>
        <div class="row overflow-auto" style="height:35vh">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="mi_tabla">
                        <?php foreach($datos as $key=>$personal):?>
                            <?php if($personal['borrado_logico'] != 1):?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td>
                                    <img src="data:image/*;base64,<?php echo $personal['imagen']; ?>" style="width:60px;height:60px;" alt="Imagen" class="rounded">
                                    </td>
                                    <td><?=$personal['nombre']?></td>
                                    <td><?=$personal['correo']?></td>
                                    <td><?=$personal['rol']?></td>
                                    <td>
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-primary"
                                            href="#"
                                            role="button"
                                            >Ver</a
                                        >
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-success"
                                            href="<?=base_url().'/actulizarPersonal/'.$personal["id"]?>"
                                            role="button"
                                            >Actualizar</a
                                        >
                                        <a
                                            name=""
                                            id=""
                                            class="btn btn-danger"
                                            href="<?=base_url()?>eliminarPersonal?id=<?=$personal['id']?>"
                                            role="button"
                                            >Eliminar</a
                                        >
                                    </td>
                                </tr>
                            <?php endif;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url("javascript/buscador.js")?>"></script>
<?=$footer?>