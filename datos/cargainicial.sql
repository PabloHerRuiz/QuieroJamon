CREATE DATABASE cestaNavidad;

CREATE TABLE cestaNavidad.empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    tipo_Cesta VARCHAR(255) NOT NULL
);

INSERT INTO cestaNavidad.empleados (nombre, correo, tipo_Cesta) VALUES
('pablo','pherrui680@g.educaand.es', 'Jamon'),
('mengi','fmengut1409@g.educaand.es', 'Normal'),
('marcos','mnavleo2312@g.educaand.es', 'Normal');