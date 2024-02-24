<?=$header?>
    <div class="col-12">
        <form method="POST" enctype="multipart/form-data" action="<?=base_url("/guardarPersonal")?>" class="row justify-content-center">
            <div class="col-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" placeholder="Nombre" name="nombre" id="name" class="form-control">
            </div>
            <div class="col-3">
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" placeholder="apellido" name="apellido" id="surname" class="form-control">
            </div>
            <div class="col-4">
                <label for="dates" class="form-label">Fecha Nacimiento:</label>
                <input type="date" name="fecha" class="form-control" id="dates">
            </div>
            <div class="col-4">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" placeholder="Email" name="email" id="mail" class="form-control">
            </div>
            <div class="col-3">
                <label for="imagenes" class="form-label">Imagen:</label>
                <input type="file" name="imagen" id="imagenes" class="form-control">
            </div>
            <div class="col-3">
                <label for="roles" class="form-label">Rol:</label>
                <select class="form-select" name="rol" id="roles">
                    <?php foreach($roles as $rol):?>
                        <option value="<?=$rol->id_rol?>"><?=$rol->nombre?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-10">
                <label for="observacion" class="form-label">Observaciones:</label>
                <textarea class="form-control" placeholder="Observaciones" name="observaciones" id="observacion" cols="30" rows="10"></textarea>
            </div>
            <div class="col-10 mt-3">
                <div class="d-flex flex-row justify-content-end">
                    <button type="reset" class="btn btn-danger me-2">Eliminar</button>
                    <button type="sumit" id="enviar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url('javascript/guardarPersona.js') ?>"></script>
<?=$footer?>