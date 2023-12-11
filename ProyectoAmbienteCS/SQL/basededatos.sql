CREATE TABLE usuarios (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  nombre varchar(100) default null,
  rol enum('admin','user') DEFAULT 'user'
);

CREATE TABLE productos (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_name varchar (25) NOT NULL,
  product_price float,
  product_image varchar (125)
)