


START TRANSACTION;

DROP TABLE IF EXISTS personas;
CREATE TABLE personas (
    id_persona int AUTO_INCREMENT,
    tipo_docum_ident varchar(250), #CC, TI
    docum_identidad varchar(250), #numero de documento
    nombre1 varchar(250),
    nombre2 varchar(250),
    apellido1 varchar(250),
    apellido2 varchar(250),
    fecha_nacim date, #fecha de nacimiento YYYY-MM-DD
    direccion varchar(250), #direccion de residencia
    correo varchar(250), #correo electronico
    telefono varchar(250), #telefono de contacto
    PRIMARY KEY (id_persona)
);
insert into personas (id_persona, tipo_docum_ident, docum_identidad, nombre1, nombre2, apellido1, apellido2, fecha_nacim, direccion, correo, telefono) 
values (1, 'CC', '100200300', 'Admin', '', 'Sistema', '', '1980-01-01', 'Calle 123', 'correo@algo.com', '3001234567'); #admin
insert into personas (id_persona, tipo_docum_ident, docum_identidad, nombre1, nombre2, apellido1, apellido2, fecha_nacim, direccion, correo, telefono) 
values (2, 'CC', '200300400', 'Juan', 'Carlos', 'Perez', 'Lopez', '1985-05-15', 'Calle 456', 'correo@algo.com', '3002345678'); #docente
insert into personas (id_persona, tipo_docum_ident, docum_identidad, nombre1, nombre2, apellido1, apellido2, fecha_nacim, direccion, correo, telefono) 
values (3, 'CC', '300400500', 'Maria', 'Elena', 'Gomez', 'Martinez', '1990-10-20', 'Calle 789', 'correo@algo.com', '3003456789'); #acudiente
insert into personas (id_persona, tipo_docum_ident, docum_identidad, nombre1, nombre2, apellido1, apellido2, fecha_nacim, direccion, correo, telefono) 
values (4, 'CC', '400500600', 'Luis', 'Fernando', 'Rodriguez', 'Sanchez', '2010-03-25', 'Calle 101', 'correo@algo.com', '3229111298'); #estudiante

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id_usuario int AUTO_INCREMENT,
    usuario_ingreso varchar(255),
    contrasena_ingreso varchar(255),
    activo boolean, #1 activo, 0 inactivo
    PRIMARY KEY (id_usuario)
);
insert into usuarios (id_usuario, usuario_ingreso, contrasena_ingreso, activo) values (1, 'admin', 'admin123', true);
insert into usuarios (id_usuario, usuario_ingreso, contrasena_ingreso, activo) values (2, 'docente1', 'docente123', true);
insert into usuarios (id_usuario, usuario_ingreso, contrasena_ingreso, activo) values (3, 'acudiente1', 'acudiente123', true);



DROP TABLE IF EXISTS usuarios_personas;
CREATE TABLE usuarios_personas (
    id_usuario_persona int AUTO_INCREMENT,
    id_usuario int, #FK a tabla usuarios
    id_persona int, #FK a tabla personas
    PRIMARY KEY (id_usuario_persona)
);
insert into usuarios_personas (id_usuario_persona, id_usuario,  id_persona) values (1, 1, 1); #admin
insert into usuarios_personas (id_usuario_persona, id_usuario,  id_persona) values (2, 2, 2); #docente
insert into usuarios_personas (id_usuario_persona, id_usuario,  id_persona) values (3, 3, 3); #acudiente


DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
    id_rol int AUTO_INCREMENT,
    nombre_rol varchar(250), #nombre del rol
    descripcion_rol varchar(500), #descripcion del rol
    PRIMARY KEY (id_rol)
);
insert into roles (id_rol, nombre_rol, descripcion_rol) values (1, 'ADMIN', 'Administrador del sistema');
insert into roles (id_rol, nombre_rol, descripcion_rol) values (2, 'DOCENTE', 'Docente del sistema');
insert into roles (id_rol, nombre_rol, descripcion_rol) values (3, 'ACUDIENTE', 'Acudiente del sistema');


DROP TABLE IF EXISTS usuarios_roles;
CREATE TABLE usuarios_roles (
    id_usuario_rol int AUTO_INCREMENT,
    id_usuario int, #FK a tabla usuarios
    id_rol int, #FK a tabla roles
    PRIMARY KEY (id_usuario_rol)
);
insert into usuarios_roles (id_usuario_rol, id_usuario, id_rol) values (1, 1, 1); #admin
insert into usuarios_roles (id_usuario_rol, id_usuario, id_rol) values (2, 2, 2); #docente
insert into usuarios_roles (id_usuario_rol, id_usuario, id_rol) values (3, 3, 3); #acudiente



DROP TABLE IF EXISTS estudiantes;
CREATE TABLE estudiantes (
    id_estudiante int AUTO_INCREMENT,
    id_persona_estudiante int, #FK a tabla personas para estudiante
    id_persona_acudiente int, #FK a tabla personas para acudiente
    PRIMARY KEY (id_estudiante)
);
 insert into estudiantes (id_estudiante, id_persona_estudiante, id_persona_acudiente) 
 values (1, 4, 3); #estudiante1


DROP TABLE IF EXISTS docentes;
CREATE TABLE docentes (
    id_docente int AUTO_INCREMENT,
    id_persona_docente int, #FK a tabla personas para docente
    id_usuario int, #FK a tabla usuarios
    PRIMARY KEY (id_docente)
);
insert into docentes (id_docente, id_persona_docente, id_usuario) values (1, 2, 2); #docente1

DROP TABLE IF EXISTS acudientes;
CREATE TABLE acudientes (
    id_acudiente int AUTO_INCREMENT,
    id_persona_acudiente int, #FK a tabla personas para acudiente,
    id_usuario int, #FK a tabla usuarios
    PRIMARY KEY (id_acudiente)
);
insert into acudientes (id_acudiente, id_persona_acudiente, id_usuario) values (1, 3, 3); #acudiente1

DROP TABLE IF EXISTS asignatura;
CREATE TABLE asignatura (
    id_asignatura int AUTO_INCREMENT,
    nombre varchar(250), #nombre de la asignatura
    descripcion varchar(500), #descripcion de la asignatura
    id_docente int, #FK a tabla personas para docente
    PRIMARY KEY (id_asignatura)
);
insert into asignatura (id_asignatura, nombre, descripcion, id_docente)
values (1, 'Matematicas', 'Asignatura de matematicas basicas', 1); #asignatura1

DROP TABLE IF EXISTS grados;
CREATE TABLE grados (
    id_grado int AUTO_INCREMENT,
    nombre_grado varchar(250), #nombre del grado por ej Sexto, Septimo
    PRIMARY KEY (id_grado)
);
insert into grados (id_grado, nombre_grado) values (1, 'Sexto');

DROP TABLE IF EXISTS estudiantes_grados;
CREATE TABLE estudiantes_grados (
    id_estudiante_grado int AUTO_INCREMENT,
    id_estudiante int, #FK a tabla estudiantes
    id_grado int, #FK a tabla grados
    anio_academico int, #año academico
    PRIMARY KEY (id_estudiante_grado)
);
insert into estudiantes_grados (id_estudiante_grado, id_estudiante, id_grado, anio_academico)
values (1, 1, 1, 2025); #estudiante1 en sexto

DROP TABLE IF EXISTS asignaturas_grados;
CREATE TABLE asignaturas_grados (
    id_asignatura_grado int AUTO_INCREMENT,
    id_asignatura int, #FK a tabla asignatura
    id_grado int, #FK a tabla grados,
    horario varchar(250), #horario de la asignatura en el grado
    PRIMARY KEY (id_asignatura_grado)
);
insert into asignaturas_grados (id_asignatura_grado, id_asignatura, id_grado, horario)
values (1, 1, 1, 'Lunes y Miercoles 8:00-10:00'); #matematicas en sexto

COMMIT;


#query para consultar las asignaturas de un estudiante con su respectivo docente, grado y horario
SELECT a.nombre AS nombre_asignatura, d.id_persona_docente, p.nombre1 AS nombre_docente, p.apellido1 AS apellido_docente, g.nombre_grado, ag.horario
FROM estudiantes e  
JOIN estudiantes_grados eg ON e.id_estudiante = eg.id_estudiante
JOIN grados g ON eg.id_grado = g.id_grado
JOIN asignaturas_grados ag ON g.id_grado = ag.id_grado
JOIN asignatura a ON ag.id_asignatura = a.id_asignatura 
JOIN docentes d ON a.id_docente = d.id_docente
JOIN personas p ON d.id_persona_docente = p.id_persona
WHERE e.id_estudiante =1;