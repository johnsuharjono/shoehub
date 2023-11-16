CREATE TABLE IF NOT EXISTS user (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  role VARCHAR(20) NOT NULL,  -- Roles: admin, user, null
  PRIMARY KEY (id),
  UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS `order` (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  date DATETIME,
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
  description VARCHAR(1027),
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(50), -- Categories: running, casual, luxury
  brand VARCHAR(50),  -- Brands: nike, adidas, puma, new balance
  image_src VARCHAR(255),
  date_added DATETIME NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS product_size (
  id INT NOT NULL AUTO_INCREMENT,
  product_id INT NOT NULL,
  size DECIMAL(3,1) NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (product_id, size)
);
