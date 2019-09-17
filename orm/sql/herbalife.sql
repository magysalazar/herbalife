
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ci_modulos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_modulos`;

CREATE TABLE `ci_modulos`
(
    `id_modulo` int(11) unsigned NOT NULL,
    `titulo` VARCHAR(100) NOT NULL,
    `url` VARCHAR(600) NOT NULL,
    `descripcion` TEXT,
    `icon` VARCHAR(200) NOT NULL,
    `listed` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `status` VARCHAR(255) DEFAULT 'ENABLED',
    `id_file` int(11) unsigned,
    PRIMARY KEY (`id_modulo`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `id_user_created` (`id_user_created`),
    CONSTRAINT `ci_modulos_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `ci_modulos_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions`
(
    `id` VARCHAR(128) NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` BLOB NOT NULL,
    `last_activity` DATETIME NOT NULL,
    `id_user` int(11) unsigned,
    `id_hbf_sesion` int(10) unsigned,
    PRIMARY KEY (`id`),
    INDEX `ci_sessions_ibfk_1` (`id_user`),
    INDEX `id_hbf_sesion` (`id_hbf_sesion`),
    CONSTRAINT `ci_sessions_ibfk_1`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `ci_sessions_ibfk_2`
        FOREIGN KEY (`id_hbf_sesion`)
        REFERENCES `hbf_sesiones` (`id_sesion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_usuarios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_usuarios`;

CREATE TABLE `ci_usuarios`
(
    `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(256),
    `apellido` VARCHAR(256),
    `username` INTEGER,
    `email` VARCHAR(100) DEFAULT '' NOT NULL,
    `password` VARCHAR(128) DEFAULT '' NOT NULL,
    `fec_nacimiento` DATE,
    `sexo` VARCHAR(15),
    `invitado_por` int(10) unsigned,
    `phone_number_1` VARCHAR(20),
    `phone_number_2` VARCHAR(20),
    `cellphone_number_1` VARCHAR(20),
    `cellphone_number_2` VARCHAR(20),
    `cod_acceso` VARCHAR(50),
    `id_opcion_tipo_asociado` int(10) unsigned,
    `id_opcion_nivel_asociado` int(10) unsigned,
    `id_turno` int(10) unsigned,
    `id_role` int(10) unsigned,
    `foto_perfil` int(11) unsigned,
    `app_monitor` VARCHAR(50),
    `app_orders` VARCHAR(50),
    `app_admin` VARCHAR(50),
    `herbalife_key` VARCHAR(256),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL,
    PRIMARY KEY (`id_usuario`),
    INDEX `ci_usuarios_ibfk_2` (`id_role`),
    INDEX `ci_usuarios_ibfk_3` (`invitado_por`),
    INDEX `ci_usuarios_ibfk_5` (`id_turno`),
    INDEX `ci_usuarios_ibfk_1` (`id_opcion_tipo_asociado`),
    INDEX `ci_usuarios_ibfk_4` (`id_opcion_nivel_asociado`),
    CONSTRAINT `ci_usuarios_ibfk_1`
        FOREIGN KEY (`id_opcion_tipo_asociado`)
        REFERENCES `hbf_opciones` (`id_opcion`),
    CONSTRAINT `ci_usuarios_ibfk_2`
        FOREIGN KEY (`id_role`)
        REFERENCES `hbf_roles` (`id_role`),
    CONSTRAINT `ci_usuarios_ibfk_3`
        FOREIGN KEY (`invitado_por`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `ci_usuarios_ibfk_4`
        FOREIGN KEY (`id_opcion_nivel_asociado`)
        REFERENCES `hbf_opciones` (`id_opcion`),
    CONSTRAINT `ci_usuarios_ibfk_5`
        FOREIGN KEY (`id_turno`)
        REFERENCES `hbf_turnos` (`id_turno`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_clubs
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_clubs`;

CREATE TABLE `hbf_clubs`
(
    `id_club` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `direccion` VARCHAR(200) NOT NULL,
    `licencia` VARCHAR(100) NOT NULL,
    `direccion_gps` VARCHAR(100) NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_club`),
    INDEX `hbf_clubs_ibfk_2` (`id_user_modified`),
    INDEX `hbf_clubs_ibfk_3` (`id_user_created`),
    CONSTRAINT `hbf_clubs_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_clubs_ibfk_3`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_comandas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_comandas`;

CREATE TABLE `hbf_comandas`
(
    `id_comanda` int(10) unsigned NOT NULL,
    `id_club` int(10) unsigned NOT NULL,
    `id_turno` int(10) unsigned NOT NULL,
    `id_sesion` int(11) unsigned NOT NULL,
    `id_asociado` int(10) unsigned NOT NULL,
    `id_producto` int(11) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `nro_productos` INTEGER,
    `cantidad` DECIMAL,
    PRIMARY KEY (`id_comanda`),
    INDEX `hbf_comandas_ibfk_1` (`id_club`),
    INDEX `hbf_comandas_ibfk_2` (`id_turno`),
    INDEX `hbf_comandas_ibfk_3` (`id_sesion`),
    INDEX `hbf_comandas_ibfk_5` (`id_asociado`),
    INDEX `hbf_comandas_ibfk_6` (`id_user_modified`),
    INDEX `hbf_comandas_ibfk_7` (`id_user_created`),
    INDEX `hbf_comandas_ibfk_8` (`id_producto`),
    CONSTRAINT `hbf_comandas_ibfk_1`
        FOREIGN KEY (`id_club`)
        REFERENCES `hbf_clubs` (`id_club`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_2`
        FOREIGN KEY (`id_turno`)
        REFERENCES `hbf_turnos` (`id_turno`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_3`
        FOREIGN KEY (`id_sesion`)
        REFERENCES `hbf_sesiones` (`id_sesion`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_5`
        FOREIGN KEY (`id_asociado`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_6`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_7`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_comandas_ibfk_8`
        FOREIGN KEY (`id_producto`)
        REFERENCES `hbf_productos` (`id_producto`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_niveles_asociados
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_niveles_asociados`;

CREATE TABLE `hbf_niveles_asociados`
(
    `id_nivel_asociado` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(10) unsigned NOT NULL,
    `id_user_created` int(10) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_nivel_asociado`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `id_user_created` (`id_user_created`),
    CONSTRAINT `hbf_niveles_asociados_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_niveles_asociados_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_opciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_opciones`;

CREATE TABLE `hbf_opciones`
(
    `id_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `tipo` VARCHAR(250),
    `nombre` VARCHAR(250),
    `descripcion` VARCHAR(500),
    `id_user_modified` int(10) unsigned NOT NULL,
    `id_user_created` int(10) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_opcion`),
    UNIQUE INDEX `hbf_opciones_id_opcion_uindex` (`id_opcion`),
    INDEX `hbf_opciones_ibfk_1` (`id_user_created`),
    INDEX `hbf_opciones_ibfk_2` (`id_user_modified`),
    CONSTRAINT `hbf_opciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_opciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_porciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_porciones`;

CREATE TABLE `hbf_porciones`
(
    `id_porcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_vaso` int(10) unsigned NOT NULL,
    `id_producto` int(10) unsigned NOT NULL,
    `cantidad` INTEGER NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_porcion`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `id_user_created` (`id_user_created`),
    INDEX `id_vaso` (`id_vaso`),
    INDEX `id_producto` (`id_producto`),
    CONSTRAINT `hbf_porciones_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_porciones_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_porciones_ibfk_3`
        FOREIGN KEY (`id_vaso`)
        REFERENCES `hbf_vasos` (`id_vaso`),
    CONSTRAINT `hbf_porciones_ibfk_4`
        FOREIGN KEY (`id_producto`)
        REFERENCES `hbf_productos` (`id_producto`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_productos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_productos`;

CREATE TABLE `hbf_productos`
(
    `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `categoria` VARCHAR(50) NOT NULL,
    `tipo` VARCHAR(50) NOT NULL,
    `foto_producto` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` INTEGER NOT NULL,
    `date_created` INTEGER NOT NULL,
    PRIMARY KEY (`id_producto`),
    INDEX `hbf_productos_ibfk_1` (`id_user_modified`),
    INDEX `hbf_productos_ibfk_2` (`id_user_created`),
    CONSTRAINT `hbf_productos_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_productos_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_roles`;

CREATE TABLE `hbf_roles`
(
    `id_role` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` INTEGER NOT NULL,
    `date_created` INTEGER NOT NULL,
    PRIMARY KEY (`id_role`),
    INDEX `hbf_roles_ibfk_1` (`id_user_modified`),
    INDEX `hbf_roles_ibfk_2` (`id_user_created`),
    CONSTRAINT `hbf_roles_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_roles_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_sesiones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_sesiones`;

CREATE TABLE `hbf_sesiones`
(
    `id_sesion` int(11) unsigned NOT NULL,
    `id_encargado` int(11) unsigned NOT NULL,
    `fec_Sesion` DATETIME NOT NULL,
    `detalle` VARCHAR(400) DEFAULT '',
    `caja_inicial` FLOAT,
    `caja_final` FLOAT,
    `total` FLOAT,
    `num_consumos` FLOAT,
    `total_ingresos` FLOAT,
    `total_egresos` FLOAT,
    `total_deben` FLOAT,
    `total_sobra` FLOAT,
    `total_falta` FLOAT,
    `sobre_rojo` FLOAT,
    `sobre_verde` FLOAT,
    `deposito` FLOAT,
    `observaciones` VARCHAR(400) DEFAULT '',
    `id_club` int(11) unsigned NOT NULL,
    `id_turno` int(11) unsigned NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_sesion`),
    INDEX `id_encargado` (`id_encargado`),
    INDEX `id_club` (`id_club`),
    INDEX `id_turno` (`id_turno`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `id_user_created` (`id_user_created`),
    CONSTRAINT `hbf_sesiones_ibfk_1`
        FOREIGN KEY (`id_encargado`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_sesiones_ibfk_2`
        FOREIGN KEY (`id_club`)
        REFERENCES `hbf_clubs` (`id_club`),
    CONSTRAINT `hbf_sesiones_ibfk_3`
        FOREIGN KEY (`id_turno`)
        REFERENCES `hbf_turnos` (`id_turno`),
    CONSTRAINT `hbf_sesiones_ibfk_4`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_sesiones_ibfk_5`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_tipos_asociados
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_tipos_asociados`;

CREATE TABLE `hbf_tipos_asociados`
(
    `id_tipo_asociado` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `id_user_modified` int(10) unsigned NOT NULL,
    `id_user_created` int(10) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_tipo_asociado`),
    INDEX `hbf_tipos_asociados_ibfk_1` (`id_user_modified`),
    INDEX `hbf_tipos_asociados_ibfk_2` (`id_user_created`),
    CONSTRAINT `hbf_tipos_asociados_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_tipos_asociados_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_turnos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_turnos`;

CREATE TABLE `hbf_turnos`
(
    `id_turno` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `descripcion` TEXT,
    `fec_inicio` DATETIME NOT NULL,
    `fec_fin` DATETIME,
    `horario_desde` TIME NOT NULL,
    `horario_hasta` TIME NOT NULL,
    `id_asociado` int(10) unsigned NOT NULL,
    `id_club` int(10) unsigned NOT NULL,
    `total_consumos` INTEGER DEFAULT 0 NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_turno`),
    INDEX `id_asociado` (`id_asociado`),
    INDEX `id_club` (`id_club`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `id_user_created` (`id_user_created`),
    CONSTRAINT `hbf_turnos_ibfk_1`
        FOREIGN KEY (`id_asociado`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_turnos_ibfk_2`
        FOREIGN KEY (`id_club`)
        REFERENCES `hbf_clubs` (`id_club`),
    CONSTRAINT `hbf_turnos_ibfk_3`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`),
    CONSTRAINT `hbf_turnos_ibfk_4`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- hbf_vasos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `hbf_vasos`;

CREATE TABLE `hbf_vasos`
(
    `id_vaso` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `icono` VARCHAR(100) NOT NULL,
    `color` VARCHAR(100) NOT NULL,
    `num_porciones` INTEGER NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` INTEGER NOT NULL,
    `date_created` INTEGER NOT NULL,
    PRIMARY KEY (`id_vaso`),
    INDEX `hbf_vasos_ibfk_1` (`id_user_modified`),
    INDEX `hbf_vasos_ibfk_2` (`id_user_created`),
    CONSTRAINT `hbf_vasos_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `hbf_vasos_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_usuarios` (`id_usuario`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations`
(
    `version` BIGINT NOT NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
