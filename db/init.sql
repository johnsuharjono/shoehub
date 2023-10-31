CREATE TABLE IF NOT EXISTS user (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS `order` (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  date DATETIME,
  address VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)
);  

CREATE TABLE IF NOT EXISTS order_item (
  id INT NOT NULL AUTO_INCREMENT,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  product_size_id INT NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS product (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(50),
  brand VARCHAR(50),
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS product_size (
  id INT NOT NULL AUTO_INCREMENT,
  product_id INT NOT NULL,
  size DECIMAL(2,1) NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (id)
);
