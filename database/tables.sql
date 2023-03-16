CREATE DATABASE IF NOT EXISTS module_3_project;

USE module_3_project;

CREATE TABLE IF NOT EXISTS products (
    product_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    product_price DECIMAL(10,2) NOT NULL,
    available_quantity INTEGER NOT NULL,
    PRIMARY KEY (product_id)
);

CREATE TABLE IF NOT EXISTS orders (
    order_id VARCHAR(100) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    completed_at DATETIME,
    PRIMARY KEY (order_id)
);

CREATE TABLE IF NOT EXISTS orders_products (
    order_id VARCHAR(100) NOT NULL,
    product_id INTEGER NOT NULL,
    quantity VARCHAR(125) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('CPU', 'CPU description', 399.99, 1);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Monitor', 'Monitor description', 299.99, 0);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Motherboard', 'Motherboard description', 149.99, 0);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Memory', 'Memory description', 49.99, 1);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Hard Drive', 'Hard Drive description', 279.99, 400);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Graphics Card', 'Graphics Card description', 1399.99, 120);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Keyboards', 'Keyboards description', 39.99, 740);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Mice', 'Mice description', 19.99, 870);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Power Supply', 'Power Supply description', 349.99, 1000);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Cable', 'Cable description', 9.99, 1200);

INSERT INTO products (name, description, product_price, available_quantity)
VALUES ('Headphones', 'Headphones description', 79.99, 530);




