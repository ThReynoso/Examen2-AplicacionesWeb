-- Crear la base de datos
CREATE DATABASE bienes_raices;

-- Usar la base de datos recién creada
USE bienes_raices;

-- Crear la tabla 'sellers'
CREATE TABLE sellers (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(10),
    PRIMARY KEY (id)
);

-- Crear la tabla 'propiedades'
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

-- Crear la tabla 'ventas'
CREATE TABLE ventas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    seller_id INT NOT NULL,
    propiedad_id INT NOT NULL,
    fecha_venta DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (seller_id) REFERENCES sellers(id),
    FOREIGN KEY (propiedad_id) REFERENCES propiedades(id)
);

-- Insertar datos de ejemplo en la tabla 'sellers'
INSERT INTO sellers (nombre, email, phone) VALUES
('Abraham Aguilera', 'Abraham.Aguilera@gmail.com', '1234567890'),
('Aldo Yamil', 'Aldo.Yamil@gmail.com', '9876543210');


SELECT p.titulo, v.fecha_venta, v.precio 
              FROM ventas v 
              JOIN propiedades p ON v.propiedad_id = p.id 
              WHERE v.seller_id = 82;

SELECT p.id, p.precio, s.nombre AS seller_name
FROM propiedades p
JOIN sellers s ON p.seller_id = s.seller_id
WHERE p.status = 'vendida';         

SELECT p.*
FROM propiedades p
JOIN vendedores v ON p.vendedor_id = v.id
WHERE v.nombre = 'Nombre del Vendedor' AND p.estado = 'vendida';

SELECT p.id, p.precio, s.id AS seller_id, s.nombre AS seller_name
FROM propiedades p
JOIN sellers s ON p.seller_id = s.id
WHERE s.id = 82;

USE bienes_raices;

-- Consulta para mostrar las propiedades vendidas por un seller específico
SELECT 
    propiedades.id AS propiedad_id,
    propiedades.titulo AS titulo,
    propiedades.precio AS precio,
    propiedades.num_rooms AS habitaciones,
    propiedades.num_wc AS baños,
    propiedades.num_garage AS garages,
    propiedades.created AS fecha_creacion,
    sellers.nombre AS nombre_vendedor,
    sellers.email AS email_vendedor,
    sellers.phone AS telefono_vendedor
FROM 
    propiedades
JOIN 
    sellers ON propiedades.seller_id = sellers.id
WHERE 
    sellers.id = 2;  -- Reemplaza '?' con el ID del vendedor específico

