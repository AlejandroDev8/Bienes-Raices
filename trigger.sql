-- Creación de la tabla "bitacora_propiedades" y el trigger "after_update_propiedad

CREATE TABLE bitacora_propiedades(
  id INT NOT NULL AUTO_INCREMENT,
  id_propiedad INT,
  nombre_anterior VARCHAR(45),
  nombre_nuevo VARCHAR(45),
  precio_anterior DECIMAL(10,2),
  precio_nuevo DECIMAL(10,2),
  descripcion_anterior VARCHAR(255),
  descripcion_nueva VARCHAR(255),
  habitaciones_anteriores INT,
  habitaciones_nuevas INT,
  wc_anteriores INT,
  wc_nuevos INT,
  estacionamiento_anterior INT,
  estacionamiento_nuevo INT,
  vendedor_anterior INT,
  vendedor_nuevo INT,
  usuario VARCHAR(40),
  modificado DATETIME,
  PRIMARY KEY(id)
)

ENGINE = InnoDB;

DELIMITER //

CREATE TRIGGER after_update_propiedad AFTER UPDATE ON propiedades
FOR EACH ROW
BEGIN
INSERT INTO bitacora_propiedades(id_propiedad, nombre_anterior, nombre_nuevo, precio_anterior, precio_nuevo, descripcion_anterior, descripcion_nueva, habitaciones_anteriores, habitaciones_nuevas, wc_anteriores, wc_nuevos, estacionamiento_anterior, estacionamiento_nuevo, vendedor_anterior, vendedor_nuevo, usuario, modificado) VALUES (OLD.id, OLD.titulo, NEW.titulo, OLD.precio, NEW.precio, OLD.descripcion, NEW.descripcion, OLD.habitaciones, NEW.habitaciones, OLD.wc, NEW.wc, OLD.estacionamiento, NEW.estacionamiento, OLD.vendedores_id, NEW.vendedores_id, USER(), NOW());
END
//

DELIMITER ;

-- Función para la conversión de moneda de MXN a USD

DELIMITER //
CREATE FUNCTION convertir_a_dolares(precio_pesos DECIMAL(10,2))
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
DECLARE precio_dolares DECIMAL(10,2);
SET precio_dolares = precio_pesos / 20.00;
RETURN precio_dolares;
END
//
DELIMITER ;

-- Consulta para obtener el nombre, apellido y correo del vendedor asociado a la propiedad, dependiendo del id de la propiedad

SELECT precio, convertir_a_dolares(precio) as precio_dolar FROM propiedades WHERE id = ${id};

-- Creación de la tabla "bitacora_propiedades_delete" y el trigger "after_delete_propiedad"

CREATE TABLE bitacora_propiedades_delete(
  id INT NOT NULL AUTO_INCREMENT,
  id_propiedad INT,
  nombre VARCHAR(45),
  precio DECIMAL(10,2),
  descripcion VARCHAR(255),
  habitaciones INT,
  wc INT,
  estacionamiento INT,
  vendedor INT,
  usuario VARCHAR(40),
  modificado DATETIME,
  PRIMARY KEY(id)
)

ENGINE = InnoDB;

DELIMITER //

CREATE TRIGGER after_delete_propiedad AFTER DELETE ON propiedades
FOR EACH ROW
BEGIN
INSERT INTO bitacora_propiedades_delete(id_propiedad, nombre, precio, descripcion, habitaciones, wc, estacionamiento, vendedor, usuario, modificado) VALUES (OLD.id, OLD.titulo, OLD.precio, OLD.descripcion, OLD.habitaciones, OLD.wc, OLD.estacionamiento, OLD.vendedores_id, USER(), NOW());
END
//

DELIMITER ;

-- Creación de la tabla "bitacora_propiedades_insert" y el trigger "after_insert_propiedad"

CREATE TABLE bitacora_propiedades_insert(
  id INT NOT NULL AUTO_INCREMENT,
  id_propiedad INT,
  nombre VARCHAR(45),
  precio DECIMAL(10,2),
  descripcion VARCHAR(255),
  habitaciones INT,
  wc INT,
  estacionamiento INT,
  vendedor INT,
  usuario VARCHAR(40),
  modificado DATETIME,
  PRIMARY KEY(id)
)

ENGINE = InnoDB;

DELIMITER //

CREATE TRIGGER after_insert_propiedad AFTER INSERT ON propiedades
FOR EACH ROW
BEGIN
INSERT INTO bitacora_propiedades_insert(id_propiedad, nombre, precio, descripcion, habitaciones, wc, estacionamiento, vendedor, usuario, modificado) VALUES (NEW.id, NEW.titulo, NEW.precio, NEW.descripcion, NEW.habitaciones, NEW.wc, NEW.estacionamiento, NEW.vendedores_id, USER(), NOW());
END
//

DELIMITER ;