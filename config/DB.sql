-- Database: SGProyectos

-- DROP DATABASE IF EXISTS "SGProyectos";

--CREATE DATABASE "SGProyectos"
--    WITH
--    OWNER = postgres
--    ENCODING = 'UTF8'
--    LC_COLLATE = 'es-ES'
--   LC_CTYPE = 'es-ES'
--    LOCALE_PROVIDER = 'libc'
--    TABLESPACE = pg_default
--    CONNECTION LIMIT = -1
--    IS_TEMPLATE = False;

CREATE TABLE usuario(
	idusuario SERIAL PRIMARY KEY,
	correoelectronico VARCHAR(100),
	nombreusuario VARCHAR(15),
	contrasena VARCHAR(100),
	estado BIT --0: ACTIVO, 1: NO ACTIVO
);

CREATE TABLE data_usuario(
	iddata SERIAL PRIMARY KEY,
	nombre VARCHAR(80),
	apellido VARCHAR(120),
	dni VARCHAR(8),
	especialidad VARCHAR(300),
	informacionactual BIT,
	fechacreacion DATE DEFAULT CURRENT_DATE,
	idusuario INT,
	FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
);

CREATE TABLE cliente(
	idcliente SERIAL PRIMARY KEY,
	empresa VARCHAR(200),
	RUC VARCHAR(15),
	nombres VARCHAR(80),
	apellidos VARCHAR(120),
	dni VARCHAR(8),
	fechacreacion DATE DEFAULT CURRENT_DATE,
	numerotel VARCHAR(15),
	nacionalidad VARCHAR(70),
	creadordecliente VARCHAR(15),
	ultimocontrato DATE,
	encontrato BIT --0: ACTIVO, 1: NO ACTIVO
);

CREATE TABLE tipoproyecto(
	idtipoproyecto SERIAL PRIMARY KEY, 
	nombre VARCHAR(100),
	descripcion VARCHAR(200)
);

CREATE TABLE subtproyecto(
	idsubtproyecto SERIAL PRIMARY KEY,
	nombre VARCHAR(100),
	descripcion VARCHAR(200),
	idtipoproyecto INT,
	FOREIGN KEY (idtipoproyecto) REFERENCES tipoproyecto(idtipoproyecto)
);

CREATE TABLE grupousuario(
	idgrupousuario SERIAL PRIMARY KEY,
	nombregrupo VARCHAR(100),
	estado BIT, -- 0: ACTIVO, 1: NO ACTIVO
	fechacreacion DATE DEFAULT CURRENT_DATE,
	idencargado INT,
	FOREIGN KEY (idencargado) REFERENCES usuario(idusuario)
);

CREATE TABLE grupo_usuario_miembro(
	idgrupousuario INT,
	idusuario INT,
	rol_en_grupo VARCHAR(50), -- opcional: 'Desarrollador', 'Tester', etc.
	PRIMARY KEY (idgrupousuario, idusuario),
	FOREIGN KEY (idgrupousuario) REFERENCES grupousuario(idgrupousuario),
	FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
);

CREATE TABLE proyecto(
	idproyecto SERIAL PRIMARY KEY,
	nombre VARCHAR(100),
	descripcion VARCHAR(200),
	estado BIT, --0: ACTIVO, 1: NO ACTIVO
	ultimaactualizacion DATE,
	repoGIT VARCHAR(200),
	idcliente INT NOT NULL,
	idgrupousuario INT NOT NULL,
	idsubtproyecto INT NOT NULL,
	FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	FOREIGN KEY (idgrupousuario) REFERENCES grupousuario(idgrupousuario),
	FOREIGN KEY (idsubtproyecto) REFERENCES subtproyecto(idsubtproyecto)
);