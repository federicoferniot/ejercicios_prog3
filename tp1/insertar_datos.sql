INSERT INTO `proveedores`(`Nombre`, `Domicilio`, `Localidad`) VALUES ("Perez", "Perón 876", "Quilmes"), ("Gimenez", "Mitre 750", "Avellaneda"), ("Aguirre", "Boedo 634", "Bernal")

INSERT INTO `productos`(`pNombre`, `Precio`, `Tamaño`) VALUES ("Caramelos", 1.5, "Chico"), ("Cigarrillos", 45.89, "Mediano"), ("Gaseasa", 15.80, "Grande")

INSERT INTO `envios`(`Numero`, `pNumero`, `Cantidad`) VALUES (100, 1, 500), (100, 2, 1500), (100, 3, 100), (101, 2, 55), (101, 3, 225), (102, 1, 600), (102, 3, 300)

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

