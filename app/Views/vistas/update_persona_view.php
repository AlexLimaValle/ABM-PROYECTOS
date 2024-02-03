<?= $header?>
<div class="col-12">
        <div class="row justify-content-center">
            <div class="col-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" value="<?=$persona['nombre']?>" placeholder="Nombre" name="nombre" id="name" class="form-control">
            </div>
            <div class="col-3">
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" value="<?=$persona['apellidos']?>" placeholder="apellido" name="apellido" id="surname" class="form-control">
            </div>
            <div class="col-4">
                <label for="dates" class="form-label">Fecha Nacimiento:</label>
                <input type="date" value="<?=$persona['fecha_nacimiento']?>" name="fecha" class="form-control" id="dates">
            </div>
            <div class="col-7">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" value="<?=$persona['email']?>" placeholder="Email" name="email" id="mail" class="form-control">
            </div>
            <div class="col-3">
                <label for="roles" class="form-label">Rol:</label>
                <select value="<?=$persona['id_rol']?>" class="form-select" name="rol" id="roles">
                    <?php foreach($roles as $rol):?>
                        <option value="<?=$rol->id_rol?>"><?=$rol->nombre?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-10">
                <label for="observacion" class="form-label">Observaciones:</label>
                <textarea class="form-control" placeholder="<?=$persona['informacion']?>" name="observaciones" id="observacion" cols="30" rows="10"></textarea>
            </div>
            <div class="col-10 mt-3">
                <div class="d-flex flex-row justify-content-end">
                    <button type="reset" class="btn btn-danger me-2">Eliminar</button>
                    <button type="button" id="enviar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url('javascript/actualizarPersona.js') ?>"></script>
<?=$footer?>