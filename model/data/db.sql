DROP TABLE IF EXISTS materias CASCADE;
CREATE TABLE IF NOT EXISTS materias (
	id 			serial NOT NULL PRIMARY KEY,
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)'
);

DROP TABLE IF EXISTS tareas CASCADE;
CREATE TABLE IF NOT EXISTS tareas (
	id			serial NOT NULL PRIMARY KEY,
	fecha_inicio 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	fecha_entrega 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)',
	descripcion varchar(500) NOT NULL DEFAULT '(sin descripcion)',
	materia_id 	integer REFERENCES materias
);

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

DROP TABLE IF EXISTS inscripciones CASCADE;
CREATE TABLE IF NOT EXISTS inscripciones(
	id 		   serial NOT NULL PRIMARY KEY,
	usuario_id integer references usuarios,
	materia_id integer references materias
);

INSERT INTO materias (nombre) 
	VALUES ('Procesos Agiles');
INSERT INTO tareas (nombre, descripcion, materia_id) 
	VALUES ('procesos agiles', 'sprint 1', 1);
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Estudiante');
INSERT INTO usuarios (nombre_usuario, contrasena, tipo_usuario) 
	VALUES ('Patito', 'Patito', 1);