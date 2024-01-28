<?=$header?>
    <div class="col-12">
        <form action="<?=base_url('/guardarPersonal')?>" method="post" class="row justify-content-center">
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
            <div class="col-7">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" placeholder="Email" name="email" id="mail" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
<?=$footer?>