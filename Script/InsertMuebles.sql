-- Categoría 1
INSERT INTO CATEGORIAS (nombre, descripcion)
VALUES ('Sillas', 'Sillas de todo tipo y diseño');

-- Categoría 2
INSERT INTO CATEGORIAS (nombre, descripcion)
VALUES ('Mesas', 'Mesas de diferentes materiales y tamaños');

-- Categoría 3
INSERT INTO CATEGORIAS (nombre, descripcion)
VALUES ('Sofás', 'Sofás modernos y clásicos para sala');

-- Mueble 1
INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id)
VALUES ('Silla Moderna', 'Silla de diseño moderno', 50.00, 10, 1.5, 0.5, 0.5, 1);

-- Mueble 2
INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id)
VALUES ('Mesa de Comedor', 'Mesa de comedor para 6 personas', 200.00, 5, 1.2, 1.5, 1.0, 2);

-- Mueble 3
INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id)
VALUES ('Sofá Clásico', 'Sofá de tres plazas con diseño clásico', 300.00, 2, 0.8, 2.0, 1.0, 3);

-- Mueble 4
INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id)
VALUES ('Silla de Oficina', 'Silla ergonómica para oficina', 75.00, 15, 1.5, 0.6, 0.5, 1);

-- Mueble 5
INSERT INTO MUEBLES (nombre, descripcion, precio, stock, medida, largo, ancho, categoria_id)
VALUES ('Mesa de Centro', 'Mesa de centro de madera', 120.00, 7, 0.4, 1.0, 0.5, 2);