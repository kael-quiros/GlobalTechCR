CREATE TABLE usuarios (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  nombre varchar(100) default null,
  rol enum('admin','user') DEFAULT 'user'
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    product_name VARCHAR(100) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    product_description VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

INSERT INTO categorias (nombre_categoria) VALUES
('tecnología'),
('AudioyVideo'),
('Hogar'),
('muebles');

INSERT INTO productos (id_categoria, product_name, product_price, product_image, product_description) VALUES
(3, 'Aire Acondicionado Portatil', 19.99, 'img/aireAcondicionadoPortatil.jpg', 'Aire acondicionado portátil con funciones avanzadas.'),
(2, 'Barra de Sonido Sony', 19.99, 'img/barraSonidoSony.jpg', 'Barra de sonido Sony con alta fidelidad de audio.'),
(3, 'Centro de Entretenimiento', 19.99, 'img/centroDeEntretenimiento.jpg', 'Centro de entretenimiento moderno y espacioso.'),
(3, 'Cocina a Gas', 19.99, 'img/cocinaGas.jpg', 'Cocina a gas con quemadores de alta potencia.'),
(3, 'Horno', 19.99, 'img/horno.jpg', 'Horno eléctrico con múltiples funciones.'),
(4, 'Juego de Comedor', 19.99, 'img/juegoComedor.jpg', 'Juego de comedor elegante y resistente.'),
(3, 'Pantalla Samsung 65"', 19.99, 'img/pantallaSamsung65.jpg', 'Pantalla Samsung de alta definición y gran tamaño.'),
(2, 'Parlante Sony', 19.99, 'img/parlanteSony.jpg', 'Parlante Sony portátil con sonido nítido.'),
(3, 'Refrigeradora 2 Puertas', 19.99, 'img/refrigeradora2Puertas.jpg', 'Refrigeradora espaciosa de dos puertas.'),
(1, 'SamsungS23', 19.99, 'img/Samsung S23.jpeg', 'Teléfono móvil Samsung de última generación.'),
(1, 'SamsungS23+', 19.99, 'img/samsung s23+.jpg', 'Teléfono Samsung con gran capacidad de almacenamiento.'),
(1, 'SamsungS23U', 19.99, 'img/Samsung S23U.jpg', 'Samsung S23U con cámara de alta resolución.'),
(4, 'Sillón Negro', 19.99, 'img/sillonNegro.jpg', 'Sillón elegante y cómodo en color negro.'),
(1, 'Teléfonos', 19.99, 'img/telefonos.jpeg', 'Teléfonos modernos y versátiles para uso diario.');

CREATE TABLE comentarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  mensaje TEXT NOT NULL, 
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);