CREATE DATABASE FEEL_MELO;
USE FEEL_MELO;
CREATE TABLE anfitrion(
anfitrion_id int AUTO_INCREMENT PRIMARY KEY,
  nombre_anf varchar(50) DEFAULT NULL,
  apellido_anf varchar(50) DEFAULT NULL,
  pais_anf varchar(50)DEFAULT NULL,
  ciudad_anf varchar(50)DEFAULT NULL,
  identificacion_anf varchar(20) DEFAULT NULL,
  celular_anf varchar(20) DEFAULT NULL,
  contraseña_anf varchar(255) DEFAULT NULL,
  correo_anf varchar(100) DEFAULT NULL,
  UNIQUE (identificacion_anf)
);
CREATE TABLE usuarios (
  usuario_id int AUTO_INCREMENT PRIMARY KEY,
  nombre_us varchar(50) DEFAULT NULL,
  apellido varchar(50) DEFAULT NULL,
  pais varchar(50)DEFAULT NULL,
  ciudad varchar(50)DEFAULT NULL,
  identificacion_us varchar(20) DEFAULT NULL,
  celular varchar(20) DEFAULT NULL,
  contraseña_us varchar(255) DEFAULT NULL,
  correo varchar(100) DEFAULT NULL,
  UNIQUE (identificacion_us)
);
CREATE TABLE lugares (
  lugar_id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_lugar VARCHAR(100) NOT NULL,
  pais VARCHAR(100) NULL,
  ciudad VARCHAR(100) NULL,
  ubicacion VARCHAR(200) NOT NULL,
  descripcion TEXT NOT NULL,
  categoria ENUM('hotel', 'restaurante', 'atraccion','deportivo') NOT NULL,
  foto_url VARCHAR(255) NOT NULL,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES usuarios(usuario_id)
);
CREATE TABLE calificaciones (
  id_calificacion int(60) NOT NULL,
  calificacion int(60) NOT NULL,
  comentario varchar(200) DEFAULT NULL,
  user_id int(60) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES usuarios(usuario_id),
  lug_id int NOT NULL,
  FOREIGN KEY (lug_id) REFERENCES lugares(lugar_id));


CREATE TABLE administradores (
  admin_id int(11) NOT NULL,
  identificacion_ad varchar(20) DEFAULT NULL,
  contraseña_ad varchar(255) DEFAULT NULL,
  UNIQUE (identificacion_ad)
) ;

INSERT INTO administradores VALUES('1','1025761085','123');

ALTER TABLE calificaciones DROP COLUMN id_calificacion;

ALTER TABLE calificaciones ADD COLUMN id_calificacion INT AUTO_INCREMENT PRIMARY KEY FIRST;