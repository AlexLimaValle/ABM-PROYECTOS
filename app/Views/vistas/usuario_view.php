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
echo '<div class="col-2 p-2">';
echo '<button class="btn btn-primary">Agregar Usuario</button>';
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
echo $footer;