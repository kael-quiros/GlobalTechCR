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
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

INSERT INTO categorias (nombre_categoria) VALUES
('tecnología'),
('AudioyVideo'),
('Hogar'),
('muebles');

INSERT INTO productos (id_categoria, product_name, product_price, product_image) VALUES
(3, 'Aire Acondicionado Portatil', 19.99, 'img/aireAcondicionadoPortatil.jpg'),
(2, 'Barra de Sonido Sony', 19.99, 'img/barraSonidoSony.jpg'),
(3, 'Centro de Entretenimiento', 19.99, 'img/centroDeEntretenimiento.jpg'),
(3, 'Cocina a Gas', 19.99, 'img/cocinaGas.jpg'),
(3, 'Horno', 19.99, 'img/horno.jpg'),
(4, 'Juego de Comedor', 19.99, 'img/juegoComedor.jpg'),
(3, 'Pantalla Samsung 65"', 19.99, 'img/pantallaSamsung65.jpg'),
(2, 'Parlante Sony', 19.99, 'img/parlanteSony.jpg'),
(3, 'Refrigeradora 2 Puertas', 19.99, 'img/refrigeradora2Puertas.jpg'),
(1, 'Samsung S23', 19.99, 'img/Samsung S23.jpeg'),
(1, 'Samsung S23+', 19.99, 'img/samsung s23+.jpg'),
(1, 'Samsung S23U', 19.99, 'img/Samsung S23U.jpg'),
(4, 'Sillón Negro', 19.99, 'img/sillonNegro.jpg'),
(1, 'Teléfonos', 19.99, 'img/telefonos.jpeg');
