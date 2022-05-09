/*TABLAS LOGIN*/

CREATE DATABASE TextilExport;
use TextilExport;

#drop database TextilExport;
-- Creando `tipo_usuario`

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Empleado');

-- --------------------------------------------------------


-- Creando `usuarios`

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 -- select*from usuarios;
--
-- update usuarios set activacion=1  where id =2;
-- update usuarios set id_tipo=1  where id =2;
-- Colocando claves primarias
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

create table categoria(
categoria varchar(50) primary key not null
);
SELECT*FROM CATEGORIA;
INSERT INTO categoria(categoria) VALUES('Textil');
INSERT INTO categoria(categoria) VALUES('Promocional');

create table Productos(
codigo varchar(9) primary key,
nombre varchar(150),
descripcion varchar(500),
categoria varchar(50),
precio int,
existencias int,
img varchar(150),
constraint fk_categoria foreign key (categoria) references categoria(categoria) on update cascade
);
SELECT*FROM Productos;

INSERT INTO Productos(codigo,nombre,descripcion,categoria,precio,existencias,img ) VALUES ('PROD00002','Camisa','camisa de buena calidad para deporte','Promocional','10','100','PROD00002.jpg');
