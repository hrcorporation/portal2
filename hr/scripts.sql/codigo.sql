
/**
    Falta
**/

ALTER TABLE `tercero_has_rol`  ADD `id_cliente` INT(11) NULL DEFAULT NULL  AFTER `id_rol`,  ADD `id_obra` INT(11) NULL DEFAULT NULL  AFTER `id_cliente`;


CREATE TABLE `concr_bdportalconcretol`.`ct63_oportuniodad_negocio` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,  `fecha` DATE NULL DEFAULT NULL ,  `nidentificacion` VARCHAR(80) NULL DEFAULT NULL ,  `nombrescompletos` VARCHAR(80) NULL DEFAULT NULL ,  `apellidoscompletos` VARCHAR(80) NULL DEFAULT NULL ,  `resultado` VARCHAR(255) NULL DEFAULT NULL ,  `observacion` VARCHAR(255) NULL DEFAULT NULL ,  `status_op` INT(11) NULL DEFAULT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;



/**
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
**/




/**
    Listo
**/




CREATE TABLE `concr_bdportalconcretol`.`tercero_as_tipo` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,  `id_tercero` INT(11) NOT NULL ,  `id_obra` INT(11) NOT NULL ,    PRIMARY KEY  (`id`),    INDEX  (`id_tercero`),    INDEX  (`id_obra`)) ENGINE = InnoDB;

CREATE TABLE `concr_bdportalconcretol`.`tercero_has_rol` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,  `id_tercero` INT(11) NOT NULL ,  `id_rol` INT(11) NOT NULL ,    PRIMARY KEY  (`id`),    INDEX  (`id_tercero`),    INDEX  (`id_rol`)) ENGINE = InnoDB;


CREATE TABLE `concr_bdportalconcretol`.`tercero_has_obra` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,  `id_tercero` INT(11) NULL DEFAULT NULL ,  `id_cliente` INT(11) NULL DEFAULT NULL ,  `id_obra` INT(11) NULL DEFAULT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

ALTER TABLE `ct13_tipotercero` CHANGE `ct13_IdTipoTercero` `ct13_IdTipoTercero` INT(2) NOT NULL AUTO_INCREMENT; 
ALTER TABLE `ct13_tipotercero` CHANGE `TipoTercero` `TipoTercero` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL; 


