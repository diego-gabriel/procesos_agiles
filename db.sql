CREATE TABLE IF NOT EXISTS subjects (
	id 			serial NOT NULL PRIMARY KEY,
	name		varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS assignments (
	id			serial NOT NULL PRIMARY KEY,
	time_limit 	timestamp WITH TIME ZONE NOT NULL DEFAULT NOW(),
	name		varchar(50) NOT NULL,
	description varchar(500),
	subject_id 	integer REFERENCES subjects
);

INSERT INTO subjects 	(name) VALUES ('Procesos Agiles');
INSERT INTO assignments (name, description, subject_id) VALUES ('procesos agiles', 'sprint 1', 1);