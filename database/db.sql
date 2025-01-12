DROP DATABASE IF EXISTS  gestionescolar;
	-- Creamos base de datos 'Facultad'
CREATE DATABASE  gestionescolar;
	-- Designamos 'Facultad' como base de datos actual, a la que se hará referencia en el resto del código

	-- Usamos la tabla con use
use gestionescolar;

-- Creamos una Nueva Tabla

    CREATE TABLE roles (
        id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_rol VARCHAR (255) NOT NULL UNIQUE KEY,

        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)
    )ENGINE=InnoDB;
   
    INSERT INTO roles (nombre_rol,fyh_creacion,fyh_actualizacion,estado)
    VALUES ('ADMINISTRADOR', now(),now(),'1'),
    ('DIRECTOR ACADEMICO',now(),now(),'1'),
    ('CONTADOR',now(),now(),'1'),
	('DOCENTE',now(),now(),'1'),
    ('SECRETARIA',now(),now(),'1');  

    CREATE TABLE usuarios (
        id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        rol_id INT (11) NOT NULL,
        email VARCHAR (255) NOT NULL  UNIQUE KEY,
        password TEXT  NOT NULL,

        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),
-- no action es el metodo para no poder eliminar  y tenga su id 

        FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade
    )ENGINE=InnoDB;

    INSERT INTO usuarios (rol_id, email, password, fyh_creacion, fyh_actualizacion, estado) 
    VALUES ('1', 'alexis@admin.com', '$2y$10$zSJ99LWaKh32rsWib9z9suDd1yFQBDvyNRaq.XMVkl7x9Szk/mdyi', now(), now(), '1');
    
    

    CREATE TABLE personas (
        id_persona INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT (50) NOT NULL,
        nombres VARCHAR (50) NOT NULL,
        apellidos VARCHAR (50) NOT NULL,
        ci VARCHAR (20) NOT NULL,
        fecha_nacimiento VARCHAR (20) NOT NULL,
        profesion VARCHAR (50) NOT NULL,
        direccion VARCHAR (255) NOT NULL,
        celular VARCHAR (15) NOT NULL,



        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade
    )ENGINE=InnoDB;
   
    INSERT INTO personas (usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,fyh_actualizacion,estado)
    VALUES ('1','Carlos Julian','Delgado Arias','12345678','17/08/2001','Lic.Educacion Fisica','Col. Guadalupe Calle:Balizas','9712224578', now(),now(),'1');
    
    
    
     CREATE TABLE administrativos (
        id_administrativo INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        persona_id INT (11) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade
    )ENGINE=InnoDB;
   
    
    
     CREATE TABLE docentes (
        id_docente INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        persona_id INT (11) NOT NULL,
		especialidad VARCHAR (250),
        antiguedad VARCHAR (250),

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade
    )ENGINE=InnoDB;
    
     
     CREATE TABLE gestiones (
        id_gestion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        gestion VARCHAR (255) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)
    )ENGINE=InnoDB;
   
    INSERT INTO gestiones (gestion,fyh_creacion,fyh_actualizacion,estado)
    VALUES ('Periodo 2024', now(),now(),'1');
    
    
    
    
     CREATE TABLE niveles (
        id_nivel INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        gestion_id INT (11) NOT NULL,
        nivel VARCHAR (255) NOT NULL,
        turno VARCHAR (255) NOT NULL,
        

        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade
    )ENGINE=InnoDB;
    
        INSERT INTO niveles (gestion_id, nivel, turno, fyh_creacion, fyh_actualizacion, estado) 
    VALUES ('1', 'Universidad', 'Matutino', now(), now(), '1');
    
    
    
    CREATE TABLE grados (
        id_grado INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nivel_id INT (11) NOT NULL,
        curso VARCHAR (255) NOT NULL,
        paralelo VARCHAR (255) NOT NULL,
        

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade
    )ENGINE=InnoDB;

    INSERT INTO grados (nivel_id, curso, paralelo, fyh_creacion, fyh_actualizacion, estado) 
    VALUES ('1', 'Inicial - 1', 'A', now(), now(), '1');
   
 
    
     CREATE TABLE estudiantes (
        id_estudiante INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        persona_id INT (11) NOT NULL,
        nivel_id INT (11) NOT NULL,
        grado_id INT (11) NOT NULL,
        num_control VARCHAR (50),
        
        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade,
        FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
        FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade

    )ENGINE=InnoDB;
    
    
 CREATE TABLE ppffs (
        id_ppffs INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        estudiante_id INT (11) NOT NULL,
        nombre_apellidos_ppff VARCHAR (250),
        ci_ppff VARCHAR (20),
        celular_ppff VARCHAR (20),
        ocupacion_ppff VARCHAR (50),
        ref_nombre VARCHAR (50),
        ref_parentesco VARCHAR (50),
        ref_celular VARCHAR (50),


        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
    )ENGINE=InnoDB;
   
    
    
    
     CREATE TABLE configuraciones_instituciones (
        id_config_institucion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_institucion VARCHAR (255) NOT NULL,
        logo VARCHAR (255) NULL,
        direccion VARCHAR (255) NOT NULL,
        telefono VARCHAR (255) NOT NULL,
        celular VARCHAR (255) NOT NULL,
        correo VARCHAR(100) NULL,
    
        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)

    )ENGINE=InnoDB;

    
    INSERT INTO configuraciones_instituciones (nombre_institucion, logo, direccion, telefono, celular, correo, fyh_creacion, estado) 
    VALUES ('universida Pacifico', 'logo.jpg', 'Col. Centro Calle: Hidalgo Oriente', '9712223456','9876542093', 'Unveridad@pacifico.com', now(), '1');


    -- aqui va carrera y despues cuatrimestre
       CREATE TABLE carreras (
        id_carrera INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_carrera VARCHAR (255) NOT NULL,
        

        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)

    )ENGINE=InnoDB;
    
        INSERT INTO carreras (nombre_carrera, fyh_creacion, fyh_actualizacion, estado) 
    VALUES ('Informatica', now(), now(), '1'),
    ('Sistemas', now(), now(), '1');
    
     CREATE TABLE cuatrimestres (
        id_cuatrimestre INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_cuatrimestre VARCHAR (255) NOT NULL,
        

        fyh_creacion DATETIME NOT NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)

    )ENGINE=InnoDB;
    
        INSERT INTO cuatrimestres (nombre_cuatrimestre, fyh_creacion, fyh_actualizacion, estado) 
    VALUES ('1 Cuatrimestre', now(), now(), '1'),
    ('2 Cuatrimestre', now(), now(), '1');
    

    
     CREATE TABLE materias (
        id_materia INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		carrera_id INT (11) NOT NULL,
		cuatrimetre_id INT (11) NOT NULL,
        nombre_materia VARCHAR (255) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),
        
        FOREIGN KEY (carrera_id) REFERENCES carreras (id_carrera) on delete no action on update cascade,
        FOREIGN KEY (cuatrimetre_id) REFERENCES cuatrimestres (id_cuatrimestre) on delete no action on update cascade
    )ENGINE=InnoDB;
   
    INSERT INTO materias (carrera_id,cuatrimetre_id,nombre_materia,fyh_creacion,fyh_actualizacion,estado)
    VALUES ('1','1','MATEMATICAS', now(),now(),'1');
    
    
    CREATE TABLE pagos (
        id_pago INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        estudiante_id INT (11) NOT NULL,
        mes_pagado VARCHAR (50) NOT NULL,
        monto_pagado VARCHAR (10) NOT NULL,
        fecha_pagado VARCHAR (20) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
    )ENGINE=InnoDB;
    
   CREATE TABLE asignaciones (
        id_asignacion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        docente_id INT (11) NOT NULL,
        nivel_id INT (11) NOT NULL,
        grado_id INT (11) NOT NULL,
        materia_id INT (11) NOT NULL,


        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
        FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
        FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
        FOREIGN KEY (grado_id) REFERENCES grados (id_grado) on delete no action on update cascade


    )ENGINE=InnoDB;
    
    CREATE TABLE calificaciones (
        id_calificacion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        docente_id INT (11) NOT NULL,
        estudiante_id INT (11) NOT NULL,
		materia_id INT (11) NOT NULL,


        nota1 VARCHAR(10) NOT NULL,
        nota2 VARCHAR(10) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
		FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
        FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade
       
    )ENGINE=InnoDB;
    
     CREATE TABLE kardexs (
        id_kardex INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        docente_id INT (11) NOT NULL,
        estudiante_id INT (11) NOT NULL,
        materia_id INT (11) NOT NULL,
        
        fecha VARCHAR(50) NOT NULL,
        observacion VARCHAR(250) NOT NULL,
        nota text NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),

        FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
        FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
        FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) on delete no action on update cascade


    )ENGINE=InnoDB;
   
 
     CREATE TABLE permisos (
        id_permiso INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_url VARCHAR (100) NOT NULL,
        url        text NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11)

    )ENGINE=InnoDB;
  
    
     CREATE TABLE roles_permisos (
        id_rol_permiso INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        rol_id INT (11) NOT NULL,
        permiso_id INT (11) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR (11),
        
        FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade,
        FOREIGN KEY (permiso_id) REFERENCES permisos (id_permiso) on delete no action on update cascade

    )ENGINE=InnoDB;
   
  
