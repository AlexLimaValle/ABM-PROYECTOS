use proyectos;


create table personas(
	id_persona int(10) not null auto_increment primary key,
	nombre varchar(50) null,
	apellidos varchar(50) null,
	email varchar(50) null,
	edad int(10) null,
	fecha_nacimiento date null,
	create_by timestamp null,
	create_to int(10) null,
	delete_by timestamp null,
	delete_to int(10) null,
	borrado_logico tinyint null,
	informacion varchar(250) null,
	imagen varchar(250) null
);



create table usuario(
	id_usuario int(10) not null auto_increment primary key,
	username varchar(50) null,
	password varchar(50) null,
	create_by timestamp null,
	create_to int(10) null,
	delete_by timestamp null,
	delete_to int(10) null,
	borrado_logico tinyint null,
	id_persona int(10) null,
	constraint fk_id_persona foreign key (id_persona) references personas(id_persona)
);


create table proyecto(
	id_proyecto int(10) not null auto_increment primary key,
	nombre varchar(50) null,
	fecha_inicio date null,
	fecha_fin date null,
	create_by timestamp null,
	create_to int(10) null,
	delete_by timestamp null,
	delete_to int(10) null,
	borrado_logico tinyint null,
	observacion varchar(250) null
);


create table tarea(
	id_tarea int(10) not null auto_increment primary key,
	nombre varchar(50) null,
	descripcion varchar(250) null,
	create_by timestamp null,
	create_to int(10) null,
	delete_by timestamp null,
	delete_to int(10) null,
	borrado_logico tinyint null,
	id_proyecto int(10) null,
	constraint fk_id_proyecto foreign key (id_proyecto) references proyecto(id_proyecto)
)




create table proyecto_detalle(
	id_detalle int(10) not null auto_increment primary key,
	id_persona int(10) null,
	id_proyecto int(10) null,
	create_to int(10) null,
	create_by timestamp null,
	delete_to int(10) null,
	delete_by timestamp null,
	borrado_logico tinyint null,
	constraint fk_detalle_persona foreign key (id_persona) references personas(id_persona),
	constraint fk_detalle_proyecto foreign key (id_proyecto) references proyecto(id_proyecto)
);

create table rol(
	id_rol int(10) not null auto_increment primary key,
	nombre varchar(50) null,
	create_to int(10) null,
	create_by timestamp null,
	delete_to int(10) null,
	delete_by timestamp null,
	borrado_logico tinyint null,
	constraint fk_createTo foreign key (create_to) references usuario(id_usuario),
	constraint fk_deleteTo foreign key (delete_to) references usuario(id_usuario)
);