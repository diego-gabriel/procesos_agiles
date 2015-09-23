DROP TABLE IF EXISTS tipos_usuario CASCADE;
CREATE TABLE IF NOT EXISTS tipos_usuario(
	id serial NOT NULL PRIMARY KEY,
	tipo varchar(20) NOT NULL DEFAULT '(indefinido)'
);

DROP TABLE IF EXISTS usuarios CASCADE;
CREATE TABLE IF NOT EXISTS usuarios (
	id				serial NOT NULL PRIMARY KEY,
	nombre_usuario 	varchar(50) NOT NULL DEFAULT '(sin nombre)',
	contrasena 		varchar(50) NOT NULL DEFAULT '(sin contrasena)',
	nombre 			varchar(50) NOT NULL DEFAULT '(sin nombre)',
	apellido		varchar(50) NOT NULL DEFAULT '(sin apellido)',
	telefono 		integer	NOT NULL DEFAULT 0,
	correo			varchar(50) NOT NULL DEFAULT '(sin correo)',
	tipo_usuario 	integer REFERENCES tipos_usuario
);

DROP TABLE IF EXISTS materias CASCADE;
CREATE TABLE IF NOT EXISTS materias (
	id 			serial NOT NULL PRIMARY KEY,
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)',
	codigo      varchar(50) NOT NULL DEFAULT '(sin codigo)',
	descripcion varchar(500) NOT NULL DEFAULT '(sin descripcion)',
	profesor_id integer REFERENCES usuarios
	
);

DROP TABLE IF EXISTS tareas CASCADE;
CREATE TABLE IF NOT EXISTS tareas (
	id			serial NOT NULL PRIMARY KEY,
	fecha_inicio 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	fecha_entrega 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)',
	descripcion varchar(500) NOT NULL DEFAULT '(sin descripcion)',
	materia_id 	integer REFERENCES materias,
	profesor_id integer REFERENCES usuarios,
	estado boolean NOT NULL DEFAULT 'false'
);

DROP TABLE IF EXISTS inscripciones CASCADE;
CREATE TABLE IF NOT EXISTS inscripciones(
	id 		   serial NOT NULL PRIMARY KEY,
	usuario_id integer references usuarios,
	materia_id integer references materias
);

DROP TABLE IF EXISTS entregas CASCADE;
CREATE TABLE IF NOT EXISTS entregas(
	id serial NOT NULL PRIMARY KEY,
	archivo varchar(200) NOT NULL DEFAULT '(sin archivo)',
	tarea_id integer REFERENCES tareas,
	usuario_id integer REFERENCES usuarios
);

DROP TABLE IF EXISTS comentarios CASCADE;
CREATE TABLE IF NOT EXISTS comentarios(
	id serial NOT NULL PRIMARY KEY,
	comentario varchar(1000) NOT NULL DEFAULT '(sin comentario)',
	comentador integer REFERENCES usuarios ON DELETE CASCADE,
	creado_en  timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	tipo_comentador integer REFERENCES tipos_usuario,
	entrega_id integer REFERENCES entregas
);

DROP TABLE IF EXISTS notificaciones CASCADE;
CREATE TABLE IF NOT EXISTS notificaciones(
	id serial NOT NULL PRIMARY KEY,
	usuario_id integer REFERENCES usuarios ON DELETE CASCADE,
	enlace varchar(200) NOT NULL DEFAULT '/',
	mensaje varchar(200) NOT NULL DEFAULT '',
	visible boolean NOT NULL DEFAULT 'true'
);

INSERT INTO tipos_usuario (tipo) 
	VALUES ('Estudiante');
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Profesor');
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Administrador');
INSERT INTO usuarios (id, nombre_usuario, nombre, apellido, tipo_usuario) 
	VALUES (0,'Por Designar','Por Designar', '', 2);
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario) 
	VALUES ('Administrador','Administrador', 'Administrador', 'Administrador', 4217896, 'administrador@gmail.com', 3);
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario) 
	VALUES ('Patito', 'Patito','Pato','Patito', 71752522, 'pato@gmail.com', 1);
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario) 
	VALUES ('Profesor', 'Profesor', 'Juan','Perez', 4569286, 'profesor@gmail.com', 2);
INSERT INTO materias (nombre, codigo, descripcion, profesor_id) 
	VALUES ('Procesos Agiles', 'Agiles', 'Scrum, XP', 3);
INSERT INTO tareas (nombre, descripcion, materia_id, profesor_id, estado) 
	VALUES ('procesos agiles', 'sprint 1', 1, 3, true);