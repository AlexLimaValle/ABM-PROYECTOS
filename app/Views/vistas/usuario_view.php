<?php
echo $header;

$template = [
    'table_open' => '<table class="table" border="0" cellpadding="4" cellspacing="0">',

    'thead_open'  => '<thead>',
    'thead_close' => '</thead>',

    'heading_row_start'  => '<tr>',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th>',
    'heading_cell_end'   => '</th>',

    'tfoot_open'  => '<tfoot>',
    'tfoot_close' => '</tfoot>',

    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',

    'tbody_open'  => '<tbody>',
    'tbody_close' => '</tbody>',

    'row_start'  => '<tr>',
    'row_end'    => '</tr>',
    'cell_start' => '<td>',
    'cell_end'   => '</td>',

    'row_alt_start'  => '<tr>',
    'row_alt_end'    => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end'   => '</td>',

    'table_close' => '</table>',
];

$tabla->setHeading(["Id","Username","Creado el","Acciones"]);
$tabla->setTemplate($template);
foreach($datos as $items){
    $tabla->addRow($items->id_usuario,$items->username,$items->create_by,'<a role="button" class="btn btn-primary" href="'.base_url("/").$items->id_usuario.'">Actualizar</a><a role="button" class="btn btn-danger ms-2" href="'.base_url("/").$items->id_usuario.'">Borrar</a>');
}
echo "<h1>Listado de Usuarios</h1>";
echo '<div class="col-11 ms-5">';
echo '<div class="row justify-content-end border-top border-primary border-3">';
echo '<div class="col-2 p-1">';
echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-1">+ Agregar Usuario</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="ms-5 col-11">';
echo '<div class="row justify-content-end border-top border-primary border-2 p-2">';
echo '<div class="col-1">';
echo form_label('Buscar',"search",['class'=>"form-label"]);
echo '</div>';
echo '<div class="col-3">';
$data = [
    'class'=>"form-control",
    'name'=>'buscar',
    "type"=>'text',
    "id"=>'search'
];
echo form_input($data);
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="col-12">';
echo '<div class="row justify-content-center">';
echo '<div class="col-11 card">';
echo $tabla->generate();
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="modal fade" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-1" tabindex="-1">';
echo '<div class="modal-dialog modal-lg">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h4 class="modal-title">Agregar Usuario</h4>';
echo '<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
echo '</div>';
echo '<div class="modal-body">';
echo '<div class="container-fluid">';
echo '<div class="row justify-content-center">';
echo '<div class="col-8">';
echo form_label("Nombre de usuario","usuario",['class'=>"form-label"]);
echo form_input([
    "class"=>"form-control",
    "id"=>"usuario",
    "type"=>"text",
    "placeholder"=>"ej: mlimavalle",
    "name"=>"username"
]);
echo '</div>';
echo '<div class="col-8">';
echo form_label("Contraseña: ","password",["class"=>"form-label"]);
echo form_password([
    "class"=>"form-control",
    "name"=>"contra",
    "placeholder"=>"password",
    "id"=>"password"
]);
echo '</div>';
echo '<div class="col-8">';
echo form_label("Repetir contraseña: ","repassword",["class"=>"form-label"]);
echo form_password([
    "class"=>"form-control",
    "name"=>"recontra",
    "placeholder"=>"repetir password",
    "id"=>"repassword"
]);
echo '</div>';
echo '<div class="col-8">';
echo form_label("Persona: ","persona",["class"=>"form-label"]);
$personas = [];
foreach($persona as $items){
    $personas[$items->id_persona] = $items->nombre." ".$items->apellidos;
}
echo form_dropdown("personas",$personas,[],["class"=>"form-select","id"=>"persona"]);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button id="subir" type="button" class="btn btn-primary">Agregar</button>';
echo '<button type="button" data-bs-dismiss="modal" class="btn btn-danger">Atras</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
echo '<script src="'.base_url().'javascript/usuarios.js'.'"></script>';
echo $footer;