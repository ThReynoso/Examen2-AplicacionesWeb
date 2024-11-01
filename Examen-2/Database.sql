CREATE DATABASE bienes_raices;

USE bienes_raices;

CREATE TABLE sellers (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(10),
    PRIMARY KEY (id)
);

CREATE TABLE propiedades (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(64) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(26),
    description LONGTEXT,
    num_rooms INT,
    num_wc INT,
    num_garage INT,
    created DATE,
    seller_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (seller_id) REFERENCES sellers(id)
);

INSERT INTO sellers (nombre, email, phone) VALUES
('Abraham Aguilera', 'Abraham.Aguilera@gmail.com', '1234567890'),
('Aldo Yamil', 'Aldo.Yamil@gmail.com', '9876543210');

