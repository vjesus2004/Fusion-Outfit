create database fo_database;
use fo_database;

create table persona(
ci int(8) primary key,
nombre varchar(50)not null,
apellido varchar(50)not null,
telefono int(9) unique,
correo varchar(50)not null,
calle varchar(50)not null,
nPuerta varchar(4)not null,
tipo varchar(50)not null,
clave varchar(20)not null,
baja boolean default false
);

create table pedido(
id_pedido int auto_increment primary key,
fecha datetime not null,
metodoP varchar(50)not null,
metodoE varchar(30)not null,
reembolso boolean not null,
estado varchar(50) not null,
baja boolean default false
);

create table categoria(
id_categoria int primary key,
tipo varchar(50)not null,
baja boolean default false
);

create table productos(
id_producto int primary key,
nombre varchar(50)not null,
precio int(10)not null,
stock int(10)not null,
id_categoria int not null,
baja boolean default false,
imagen varchar(100)not null,
foreign key (id_categoria) references categoria(id_categoria)
);

create table contiene(
id_pedido int not null,
id_producto int not null,
cantidad int(10)not null,
foreign key (id_pedido) references pedido(id_pedido),
foreign key (id_producto) references productos(id_producto)
);

create table realizan(
ci int not null,
id_pedido int not null,
id_producto int not null,
foreign key (ci) references persona(ci),
foreign key (id_pedido) references pedido(id_pedido),
foreign key (id_producto) references productos(id_producto)
);


INSERT INTO categoria (id_categoria, tipo) VALUES 
(1, 'Camperas'),
(2,'Buzos'),
(3,'Remeras')
,(4,'Pantalones'),
(5,'Zapatillas');
INSERT INTO persona (ci, nombre, apellido, telefono, correo, calle, nPuerta, tipo, clave) VALUES 
(51719559,'Thomas','Rivero',94732831,'thomasrivero07@gmail.com','Bvar. José Batlle y Ordoñez','3090','admin','Tommy1669'),
(52320919,'Federico','Nuñez',97228645,'FedeNu45@gmail.com','Ancona','2048','user','NuFede2048'),
(53575569,'Anthony','Pluma',99083006,'pesopluma@gmail.com','Carreras Nacionales','3928','user','PP42069'),
(54018093,'Santiago','Rodriguez',94405352,'vidal.santiago1204@gmail.com','Av Sayagio','1356','admin','SantiV809'),
(55420592,'Gaston','Gonzalez',94453123,'GonzaG92@gmail.com','Pasaje. Del Lago','3785','user','g92Gonza'),
(56251736,'Jesus','Villalba',95827332,'villalbajesusjuju@gmail.com','Puerto Rico','4020','admin','Jesus420'),
(56298504,'Marcos','da Costa',93422388,'dacostamarcos25@gmail.com','Virgen de Lourdes ','459','admin','1234');

INSERT INTO productos (id_producto, nombre, precio, stock, id_categoria,imagen) VALUES
(153,'Campera Nike Therma-Fit',6550,1,1,'..\\view\\img\\catalogo\\153.jpg'),
(154,'Campera Nike Tech Fleece',4850,1,1,'..\\view\\img\\catalogo\\154.jpg'),
(155,'Campera Adidas Essentials',5250,12,1,'..\\view\\img\\catalogo\\155.jpg'),
(156,'Campera The North Face',9990,3,1,'..\\view\\img\\catalogo\\156.png'),
(157,'Buzo Nike Athletic',4590,9,2,'..\\view\\img\\catalogo\\157.jpg'),
(158,'Buzo Lacoste Hoodie',7790,6,2,'..\\view\\img\\catalogo\\158.jpg'),
(159,'Buzo Nike Jordan Tech Fleece',4590,14,2,'..\\view\\img\\catalogo\\159.jpg'),
(160,'Buzo Adidas Essentials',4590,20,2,'..\\view\\img\\catalogo\\160.jpg'),
(161,'Buzo Puma avenir',3890,20,2,'..\\view\\img\\catalogo\\161.jpg'),
(162,'Remera Lacoste Monogram',7590,10,3,'..\\view\\img\\catalogo\\162.jpg'),
(163,'Remera Nike Jordan ',2500,20,3,'..\\view\\img\\catalogo\\163.jpg'),
(164,'Remera Adidas Essentials',1590,30,3,'..\\view\\img\\catalogo\\164.jpg'),
(165,'Remera Puma Avenir',1290,30,3,'..\\view\\img\\catalogo\\165.jpg'),
(166,'Pantalon Lacoste x Netflix ',9690,10,4,'..\\view\\img\\catalogo\\166.jpg'),
(167,'Pantalon Nike Fleece',5290,20,4,'..\\view\\img\\catalogo\\167.jpg'),
(168,'Pantalon Adidas Essentials',4590,30,4,'..\\view\\img\\catalogo\\168.jpg'),
(169,'Pantalon Nike Air French',5690,25,4,'..\\view\\img\\catalogo\\169.jpg'),
(170,'Nike Jordan 6  University Blue',12590,5,5,'..\\view\\img\\catalogo\\170.png'),
(171,'Nike Jordan 4 Retro Purple',10490,1,5,'..\\view\\img\\catalogo\\171.jpg'),
(172,'Nike Jordan 3  Red Cardinal',9990,5,5,'..\\view\\img\\catalogo\\172.jpg'),
(173,'Nike Dunk Low Retro',8790,1,5,'..\\view\\img\\catalogo\\173.jpg');

INSERT INTO pedido ( fecha ,metodoP , metodoE , reembolso, estado) VALUES
('2022-01-12 12:03:01','Debito','Envio',1,'Realizado'),
('2022-01-30 12:01:01','Debito','Envio',0,'Realizado'),
('2022-02-11 14:43:01','Credito','Envio',0,'Pendiente'),
('2022-02-23 16:03:01','Efectivo','Retiro',1,'Pendiente'),
('2022-03-25 13:23:01','Debito','Retiro',0,'Cancelado'),
('2022-05-18 23:55:01','Efectivo','Envio',0,'Procesando');

INSERT INTO contiene VALUES (1,158,1),
(1,163,1),
(1,170,1),
(2,171,1),
(2,158,1),
(3,171,1),
(3,156,1),
(3,162,1),
(4,161,2),
(4,165,1),
(4,172,1),
(5,164,1);
INSERT INTO realizan VALUES (54018093,1,158),
(54018093,1,163),
(54018093,1,170),
(53575569,2,171),
(53575569,2,158),
(51719559,3,171),
(51719559,3,156),
(51719559,3,162),
(55420592,4,161),
(55420592,4,161),
(55420592,4,165),
(55420592,4,172),
(52320919,5,164);

