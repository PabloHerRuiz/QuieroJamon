CREATE DATABASE ServicioCorreo;

CREATE TABLE ServicioCorreo.emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    para VARCHAR(255) NOT NULL,
    asunto VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    enviado BOOLEAN DEFAULT 0
);

INSERT INTO ServicioCorreo.emails (para, asunto, mensaje) VALUES
('pherrui680@g.educaand.es', 'Asunto del correo 1', 'Cuerpo del correo 1'),
('fmengut1409@g.educaand.es', 'Asunto del correo 2', 'Cuerpo del correo 2'),
('mnavleo2312@g.educaand.es', 'Asunto del correo 3', 'Cuerpo del correo 3');