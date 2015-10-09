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
	tipo_usuario 	integer REFERENCES tipos_usuario,
	estado boolean NOT NULL DEFAULT 'true'
);

DROP TABLE IF EXISTS areas CASCADE;
CREATE TABLE IF NOT EXISTS areas(
	id		serial NOT NULL PRIMARY KEY,
	nombre  varchar(50) NOT NULL DEFAULT '(sin nombre)'
);

DROP TABLE IF EXISTS materias CASCADE;
CREATE TABLE IF NOT EXISTS materias (
	id 			serial NOT NULL PRIMARY KEY,
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)',
	codigo      varchar(50) NOT NULL DEFAULT '(sin codigo)',
	descripcion varchar(500) NOT NULL DEFAULT '(sin descripcion)',
	area_id		integer REFERENCES areas
);

DROP TABLE IF EXISTS grupos CASCADE;
CREATE TABLE IF NOT EXISTS grupos(
	id 		   serial NOT NULL PRIMARY KEY,
	usuario_id integer references usuarios,
	materia_id integer references materias,
	codigo     varchar(50) NOT NULL DEFAULT '(sin codigo)'
	
);

DROP TABLE IF EXISTS tareas CASCADE;
CREATE TABLE IF NOT EXISTS tareas (
	id			serial NOT NULL PRIMARY KEY,
	fecha_inicio 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	fecha_entrega 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	nombre		varchar(50) NOT NULL DEFAULT '(sin nombre)',
	descripcion varchar(500) NOT NULL DEFAULT '(sin descripcion)',
	materia_id 	integer REFERENCES materias,
	grupo_id integer REFERENCES grupos,
	estado boolean NOT NULL DEFAULT 'false'
);

DROP TABLE IF EXISTS inscripciones CASCADE;
CREATE TABLE IF NOT EXISTS inscripciones(
	id 		   serial NOT NULL PRIMARY KEY,
	usuario_id integer references usuarios,
	grupo_id integer references grupos
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

INSERT INTO areas (nombre)
	VALUES ('Ciencias de la Computacion');
INSERT INTO areas (nombre)
	VALUES ('Matematicas');
INSERT INTO areas (nombre)
	VALUES ('Biologia');
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Estudiante');
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Profesor');
INSERT INTO tipos_usuario (tipo) 
	VALUES ('Administrador');
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario, estado) 
	VALUES ('Administrador','Administrador', 'Administrador', 'Administrador', 4217896, 'administrador@gmail.com', 3, true);
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario, estado) 
	VALUES ('Patito', 'Patito','Pato','Patito', 71752522, 'pato@gmail.com', 1, true);
INSERT INTO usuarios (nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario, estado) 
	VALUES ('Profesor', 'Profesor', 'Juan','Perez', 4569286, 'profesor@gmail.com', 2, true);
INSERT INTO materias (nombre, codigo, descripcion, area_id) 
	VALUES ('Procesos Agiles', 'Agiles', 'Scrum, XP', 1);
INSERT INTO materias (nombre, codigo, descripcion, area_id) 
	VALUES ('Biologia I', 'Biologia', 'Seres vivos', 3);
INSERT INTO materias (nombre, codigo, descripcion, area_id) 
	VALUES ('Matematica discreta', 'Matematica', 'Teoria de la matematica discreta', 2);
INSERT INTO grupos (usuario_id, materia_id, codigo) 
	VALUES (3, 1, '1A');
INSERT INTO grupos (usuario_id, materia_id, codigo) 
	VALUES (3, 2, '1B');
INSERT INTO tareas (nombre, descripcion, materia_id, grupo_id, estado) 
	VALUES ('procesos agiles', 'sprint 1', 1, 1, true);