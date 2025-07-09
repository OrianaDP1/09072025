
INSERT INTO usuario (correoelectronico, nombreusuario, contrasena, estado) VALUES
('ana.perez@example.com', 'aperez', 'hashed_pw_1', B'0'),
('luis.gomez@example.com', 'lgomez', 'hashed_pw_2', B'0'),
('carla.mendez@example.com', 'cmendez', 'hashed_pw_3', B'1');

INSERT INTO data_usuario (nombre, apellido, dni, especialidad, informacionactual, idusuario) VALUES
('Ana', 'Pérez', '12345678', 'Backend Developer', B'1', 1),
('Luis', 'Gómez', '87654321', 'Project Manager', B'1', 2),
('Carla', 'Méndez', '11223344', 'UI/UX Designer', B'1', 3);

INSERT INTO cliente (empresa, RUC, nombres, apellidos, dni, numerotel, nacionalidad, creadordecliente, ultimocontrato, encontrato) VALUES
('TechCorp S.A.', '20123456789', 'Carlos', 'Ramírez', '45678912', '987654321', 'Peruana', 'aperez', '2025-06-15', B'0'),
('Innova SAC', '20987654321', 'Laura', 'Sánchez', '87654321', '912345678', 'Peruana', 'lgomez', '2025-07-01', B'0');

INSERT INTO tipoproyecto (nombre, descripcion) VALUES
('Desarrollo de Software', 'Proyectos relacionados con desarrollo de aplicaciones'),
('Consultoría', 'Servicios de asesoría tecnológica');

INSERT INTO subtproyecto (nombre, descripcion, idtipoproyecto) VALUES
('Desarrollo Web', 'Creación de aplicaciones web', 1),
('Desarrollo Móvil', 'Aplicaciones para Android/iOS', 1),
('Auditoría Tecnológica', 'Revisión de infraestructura TI', 2);

INSERT INTO grupousuario (nombregrupo, estado, idencargado) VALUES
('Equipo Backend', B'0', 1),
('Equipo Móvil', B'0', 2);

INSERT INTO grupo_usuario_miembro (idgrupousuario, idusuario, rol_en_grupo) VALUES
(1, 1, 'Líder de proyecto'),
(1, 3, 'Diseñadora'),
(2, 2, 'Líder de equipo'),
(2, 3, 'UI/UX');

INSERT INTO proyecto (nombre, descripcion, estado, ultimaactualizacion, repoGIT, idcliente, idgrupousuario, idsubtproyecto) VALUES
('Web Corporativa TechCorp', 'Sitio web institucional de TechCorp', B'0', '2025-07-01', 'https://github.com/techcorp/web', 1, 1, 1),
('App Móvil Innova', 'Aplicación Android/iOS para Innova', B'0', '2025-07-05', 'https://github.com/innova/app', 2, 2, 2);
