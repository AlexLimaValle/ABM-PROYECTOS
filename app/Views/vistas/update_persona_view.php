<?= $header?>
<div class="col-12">
        <div class="row justify-content-center">
            <div class="col-3">
                <input type="text" id="personaID" value="<?=$persona['id_persona']?>" hidden >
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
            <div class="col-4">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" value="<?=$persona['email']?>" placeholder="Email" name="email" id="mail" class="form-control">
            </div>
            <div class="col-3">
                <label for="imagenes" class="form-label">Imagen:</label>
                <img src="data:image/*;base64,<?=$persona["imagen"]?>" style="height:20px;width:20px;" class="rounded" alt="icono">
                <input type="file" class="form-control" name="imagen" id="imagenes">
            </div>
            <div class="col-3">
                <label for="roles" class="form-label">Rol:</label>
                <select  class="form-select" name="rol" id="roles">
                    <option value="<?=$persona['id_rol']?>"selected><?=$persona['rol']?></option>
                    <?php foreach($roles as $rol):?>
                        <?php if($rol->id_rol != $persona['id_rol'] ):?>
                            <option value="<?=$rol->id_rol?>"><?=$rol->nombre?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-10">
                <label for="observacion" class="form-label">Observaciones:</label>
                <textarea class="form-control" placeholder="<?=$persona['informacion']?>" name="observaciones" id="observacion" cols="30" rows="10"><?=$persona['informacion']?></textarea>
            </div>
            <div class="col-10 mt-3">
                <div class="d-flex flex-row justify-content-end">
                    <a
                        name=""
                        id=""
                        class="btn btn-primary me-2"
                        href="<?=base_url("/personal")?>"
                        role="button"
                        >Volver</a
                    >   
                    <button type="reset" class="btn btn-danger me-2">Eliminar</button>
                    <button type="button" id="enviar" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url('javascript/actualizarPersona.js') ?>"></script>
<?=$footer?>