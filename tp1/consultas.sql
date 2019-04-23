-- 1
SELECT * FROM `productos` ORDER BY pNombre

-- 2
SELECT * FROM `proveedores` WHERE Localidad LIKE "Quilmes"

-- 3
SELECT * FROM `envios` WHERE Cantidad>200 and Cantidad<=300

-- 4
SELECT sum(Cantidad) FROM `envios`

-- 5
SELECT pNumero FROM `envios` LIMIT 3

-- 6
SELECT p.pNombre, pr.Nombre FROM envios e,productos p, proveedores pr WHERE e.pNumero=p.pNumero and e.Numero=pr.Numero

-- 7
SELECT e.Cantidad * p.Precio as Monto FROM envios e, productos p WHERE e.pNumero = p.pNumero

-- 8
SELECT sum(Cantidad) FROM `envios` where Numero=102 and pNumero=1 

-- 9
SELECT e.pNumero FROM envios e, proveedores p WHERE e.Numero = p.Numero and p.Localidad LIKE "Avellaneda"

-- 10
SELECT Domicilio, Localidad FROM proveedores WHERE Nombre LIKE "%I%"

-- 11
INSERT INTO productos (pNombre, Precio, Tamaño) VALUES ("Chocolate", 25.35, "Chico")

-- 12
INSERT INTO proveedores (Nombre, Domicilio, Localidad) VALUES ("Fernandez", "Ayacucho 1852", "Lanús")

-- 13
INSERT INTO proveedores (Numero, Nombre, Localidad) VALUES (107, "Rosales", "La Plata")

-- 14
UPDATE productos SET Precio=97.50 WHERE Tamaño LIKE "Grande"

-- 15
UPDATE productos p INNER JOIN envios e ON p.pNumero = e.pNumero
SET p.Tamaño="Mediano" WHERE p.Tamaño LIKE "Chico" AND e.Cantidad>=300

-- 16
DELETE FROM productos WHERE pNumero = 1

-- 17
DELETE FROM proveedores WHERE Numero NOT IN (SELECT e.Numero FROM envios e)