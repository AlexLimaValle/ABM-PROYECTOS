<?=$header?>
    <div class="row justify-content-center">
        <div class="col-11 border-bottom border-3 border-primary">
            <h2>Nuevo Proyecto</h2>
        </div>
        <form class="col-11 card mt-3" method="post" action="<?=base_url('/guardarProyecto')?>">
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label"><span class="fw-bold">Nombre</span></label>
                    <input type="text" name="nombreProyecto" id="" placeholder="Facturacion" class="form-control">
                </div>
                <div class="col-6">
                    <label for="estados" class="form-label"><span class="fw-bold">Estado</span></label>
                    <select class="form-select" placeholder="pendiente" name="estado" id="estados">
                        <?php foreach($estados as $items):?>
                            <option value="<?=$items->id_estado?>"><?=$items->nombre?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-6">
                    <label class="form-label" for="inicio"><span class="fw-bold">Fecha de Inicio</span></label>
                    <input class="form-control" type="date" name="fecha_inicio" id="inicio">
                </div>
                <div class="col-6">
                    <label class="form-label" for="fin"><span class="fw-bold">Fecha de Culminacion</span></label>
                    <input class="form-control" type="date" name="fecha_fin" id="fin">
                </div>
                <div class="col-4">
                    <label for="integrates" class="form-label"><span class="fw-bold">Miembros del Equipo de Proyecto</span></label>
                    <div class="overflow-auto d-flex flex-row justify-content-evenly border text-center" style="width:700px;height:45px">
                        <?php foreach($personas as $persona):?>
                            <label class="miembro form-label" style="height:20px;margin-top:5px" for="<?=$persona->id_persona?>"><?=$persona->nombre." ".$persona->apellidos?></label>
                            <input class="form-check-input" type="checkbox" name="miembro[]" value="<?=$persona->id_persona?>" style="display:none;" id="<?=$persona->id_persona?>">
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-12">
                    <label for="desc" class="form-label"><span class="fw-bold">Descripcion</span></label>
                    <textarea class="form-control" name="descripcion" id="desc" cols="5" rows="4"></textarea>
                </div>
                <div class="col-12 mt-1">
                    <div class="row justify-content-end">
                        <div class="col-4 p-2">
                            <button class="btn btn-primary" type="button">Volver</button>
                            <button class="btn btn-danger" type="reset">Eliminar</button>
                            <button class="btn btn-success" type="submit">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url('javascript/agregarMiembro.js')?>"></script>
<?=$footer?>