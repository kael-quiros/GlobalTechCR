CREATE TABLE usuarios (
  id int NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  nombre varchar(100) default null
) 