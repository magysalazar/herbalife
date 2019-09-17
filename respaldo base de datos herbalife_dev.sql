/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: herbalife_dev
Date: 16/09/2019 16:52:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `ci_modulos`
-- ----------------------------
DROP TABLE IF EXISTS `ci_modulos`;
CREATE TABLE `ci_modulos` (
  `id_modulo` int(11) unsigned NOT NULL,
  `id_opcion_modulo` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Modulo","input":"select","selectBy":["id_setting"],"filterBy":{"id_setting":1,"0":"nombre"}}',
  `id_opcion_roles` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Role Admitido","input":"select","selectBy":["id_setting"],"filterBy":{"id_setting":4,"0":"nombre"}}',
  `titulo` varchar(100) NOT NULL,
  `tabla` varchar(255) DEFAULT NULL,
  `listed` varchar(15) NOT NULL DEFAULT 'ENABLED' COMMENT '{"input":"radio","options":["ENABLED","DISABLED"]}',
  `descripcion` text COMMENT '{"validate":0}',
  `icon` varchar(200) NOT NULL COMMENT '{"validate":0}',
  `url` varchar(600) NOT NULL,
  `estado` varchar(255) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_modulo`),
  KEY `id_user_modified` (`id_user_modified`),
  KEY `id_user_created` (`id_user_created`),
  KEY `ci_modulos_ibfk_3` (`id_opcion_modulo`),
  KEY `ci_modulos_ibfk_4` (`id_opcion_roles`),
  CONSTRAINT `ci_modulos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_modulos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_modulos_ibfk_3` FOREIGN KEY (`id_opcion_modulo`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `ci_modulos_ibfk_4` FOREIGN KEY (`id_opcion_roles`) REFERENCES `ci_options` (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `ci_options`
-- ----------------------------
DROP TABLE IF EXISTS `ci_options`;
CREATE TABLE `ci_options` (
  `id_option` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL COMMENT '{"validate":0}',
  `id_setting` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Opcion para","input":"dropdown","selectBy":["nombre"]}',
  `nivel` varchar(200) DEFAULT NULL COMMENT '{"label":"Nivel de usuario","input":"radios","options":["Baja","Media","Alta"]}',
  `precio` decimal(10,0) DEFAULT NULL,
  `num_fichas` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `edit_tag` varchar(250) DEFAULT NULL,
  `estado` varchar(15) DEFAULT 'ENABLED',
  `change_count` int(11) DEFAULT '0',
  `id_user_modified` int(10) unsigned NOT NULL,
  `id_user_created` int(10) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_option`),
  KEY `hbf_opciones_ibfk_1` (`id_user_created`),
  KEY `hbf_opciones_ibfk_2` (`id_user_modified`),
  KEY `ci_options_ibfk_3` (`id_setting`),
  CONSTRAINT `ci_options_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_options_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_options_ibfk_3` FOREIGN KEY (`id_setting`) REFERENCES `ci_settings` (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COMMENT='{"title":"Opciones del Sistema",\n"listedFields":["nombre","descripcion","id_setting"],\n"id_setting":{\n"edit-roles":["id_setting","nombre","descripcion","nivel","tipo","edit_tag"],\n"edit-prepagos":["id_setting","nombre","descripcion","precio","num_fichas","tipo"],\n"edit-modulos":["id_setting","id_modulo","nombre","descripcion","tipo"],\n"edit-tipo_asociado":["id_setting","nombre","descripcion","tipo"],\n"edit-nivel_asociado":["id_setting","nombre","descripcion","tipo"],\n"edit-tipo_usuario":["id_setting","nombre","descripcion","tipo","edit_tag"],\n"edit-tipo_producto":["id_setting","nombre","descripcion","tipo"],\n"edit-categoria_producto":["id_setting","nombre","descripcion","tipo"]\n}}';

-- ----------------------------
--  Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL COMMENT '{"label":"Datos en sesion","input":"textarea"}',
  `last_activity` datetime NOT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Nombre del Usuario","selectBy":["nombre","apellido"]}',
  `id_hbf_sesion` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Sesion de","selectBy":"id_asociado"}',
  PRIMARY KEY (`id`),
  KEY `ci_sessions_ibfk_1` (`id_usuario`),
  KEY `id_hbf_sesion` (`id_hbf_sesion`),
  CONSTRAINT `ci_sessions_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_sessions_ibfk_2` FOREIGN KEY (`id_hbf_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"title":"Sesiones del Sistema","indexFields":["ip_address","timestamp","last_activity","id_usuario"],"numListed":4}';

-- ----------------------------
--  Table structure for `ci_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ci_settings`;
CREATE TABLE `ci_settings` (
  `id_setting` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `tabla` varchar(250) NOT NULL COMMENT '{"label":"Tabla","input":"select","options":"db_tabs"}',
  `id_field` varchar(250) DEFAULT NULL COMMENT '{"label":"Columna Referencia","validate":0,"input":"select","class":"table-ref"}',
  `fields` varchar(800) DEFAULT NULL COMMENT '{"validate":0,"label":"Columnas","input":"multiselect","class":"table-fields"}',
  `edit_tag` varchar(250) DEFAULT NULL COMMENT '{"validate":0}',
  `descripcion` varchar(500) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_setting`),
  KEY `ci_settings_ibfk_1` (`id_user_created`),
  KEY `ci_settings_ibfk_2` (`id_user_modified`),
  CONSTRAINT `ci_settings_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_settings_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='{"title":"Configuraciones del Sistema","indexFields":["id_setting","tabla","nombre","descripcion"]}';

-- ----------------------------
--  Table structure for `ci_usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `ci_usuarios`;
CREATE TABLE `ci_usuarios` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) DEFAULT NULL,
  `apellido` varchar(256) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '{"validate":["email"]}',
  `password` varchar(128) NOT NULL DEFAULT '' COMMENT '{"validate":["password"],"input":"password"}',
  `fec_nacimiento` date DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL COMMENT '{"input":"radios","options":["Masculino","Femenino"]}',
  `invitado_por` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Invitado por","input":"dropdown","selectBy":["nombre","apellido"],"validate":0}',
  `phone_number_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Telefono 1"}',
  `phone_number_2` varchar(20) DEFAULT NULL COMMENT '{"labe":"Telefono 2"}',
  `cellphone_number_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 1"}',
  `cellphone_number_2` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 2"}',
  `cod_acceso` varchar(50) DEFAULT NULL COMMENT '{"label":"Codigo de acceso"}',
  `id_option_tipo_asociado` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Tipo de asociado","input":"dropdown","selectBy":["id_setting"],"filterBy":{"id_setting":2,"0":"nombre"}}',
  `id_option_nivel_asociado` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Nivel de asociado","input":"dropdown","selectBy":["id_setting"],"filterBy":{"id_setting":3,"0":"nombre"}}',
  `id_club` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Club Perteneciente","input":"select","selectBy":["nombre"]}',
  `id_turno` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Turno de","input":"dropdown","selectBy":"id_asociado"}',
  `id_sesion` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Sesion de","input":"select","selectBy":["id_asociado"]}',
  `id_opcion_role` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Role del usuario","input":"radios","selectBy":["id_setting"],"filterBy":{"id_setting":4,"0":"nombre"}}',
  `foto_perfil` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Foto de perfil","input":"image","validate":0}',
  `app_monitor` varchar(50) DEFAULT NULL COMMENT '{"label":"Permitir app monitoreo","input":"radios","options":["SI","NO"]}',
  `app_orders` varchar(50) DEFAULT NULL COMMENT '{"label":"Permitir app ordenes","input":"radios","options":["SI","NO"]}',
  `app_admin` varchar(50) DEFAULT NULL COMMENT '{"label":"Permitir app administrador","input":"radios","options":["SI","NO"]}',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `herbalife_key` varchar(256) DEFAULT NULL,
  `id_tipo_usuario` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Tipo de Usuario","input":"radios","selectBy":["id_setting"],"filterBy":{"id_setting":5,"0":"nombre"}}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `ci_usuarios_ibfk_3` (`invitado_por`),
  KEY `ci_usuarios_ibfk_5` (`id_turno`),
  KEY `ci_usuarios_ibfk_6` (`id_sesion`),
  KEY `ci_usuarios_ibfk_1` (`id_option_tipo_asociado`),
  KEY `ci_usuarios_ibfk_2` (`id_option_nivel_asociado`),
  KEY `ci_usuarios_ibfk_4` (`id_opcion_role`),
  KEY `ci_usuarios_ibfk_7` (`id_tipo_usuario`),
  KEY `ci_usuarios_ibfk_8` (`id_club`),
  CONSTRAINT `ci_usuarios_ibfk_1` FOREIGN KEY (`id_option_tipo_asociado`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `ci_usuarios_ibfk_2` FOREIGN KEY (`id_option_nivel_asociado`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `ci_usuarios_ibfk_3` FOREIGN KEY (`invitado_por`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `ci_usuarios_ibfk_4` FOREIGN KEY (`id_opcion_role`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `ci_usuarios_ibfk_5` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`),
  CONSTRAINT `ci_usuarios_ibfk_6` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`),
  CONSTRAINT `ci_usuarios_ibfk_7` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `ci_usuarios_ibfk_8` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='{"indexFields":["nombre","apellido","sexo","cellphone_number_1"],"numListed":5,\n"id_tipo_usuario":{\n"edit-draft":["nombre","apellido","sexo","id_option_tipo_usuario"],\n"edit-cliente":["nombre","apellido","sexo","cellphone_number_1","id_turno","id_sesion","foto_perfil","id_option_tipo_usuario"],\n"edit-ini":["nombre","apellido","sexo","cellphone_number_1","id_option_tipo_usuario"]\n}}';

-- ----------------------------
--  Table structure for `hbf_clubs`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_clubs`;
CREATE TABLE `hbf_clubs` (
  `id_club` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `licencia` varchar(100) NOT NULL,
  `direccion_gps` varchar(100) NOT NULL COMMENT '{"validate":0,"input":"hidden"}',
  `ids_miembros` varchar(500) DEFAULT NULL COMMENT '{"label":"Agregar Miembros","input":"button","subTable":"hbf_usuarios","subview":"edit-ini",\n"action":"edit","onclick":"oModal.open(this)","content":"Haz click para agregar nuevos miembros","validate":0}',
  `ids_turnos` varchar(500) DEFAULT NULL COMMENT '{"label":"Agregar Turnos","input":"button","subTable":"hbf_turnos","action":"edit","onclick":"oModal.open(this)","content":"Haz click para agregar nuevos turnos","validate":0}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL COMMENT '{"selectBy":["nombre","apellido"],"input":"multiselect","label":"Ususario que modifico"}',
  `id_user_created` int(11) unsigned NOT NULL COMMENT '{"selectBy":["nombre","apellido"],"input":"multiselect","label":"Ususario que creo"}',
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_club`),
  KEY `hbf_clubs_ibfk_2` (`id_user_modified`),
  KEY `hbf_clubs_ibfk_3` (`id_user_created`),
  CONSTRAINT `hbf_clubs_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_clubs_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hbf_comandas`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_comandas`;
CREATE TABLE `hbf_comandas` (
  `id_comanda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(10) unsigned NOT NULL COMMENT '{"label":"Nombre del Club","input":"select","selectBy":"nombre"}',
  `id_turno` int(10) unsigned NOT NULL COMMENT '{"label":"Turno de","input":"select","selectBy":["id_asociado","descripcion"]}',
  `id_sesion` int(11) unsigned NOT NULL COMMENT '{"label":"Sesion de","input":"select","selectBy":"id_asociado"}',
  `id_cliente` int(10) unsigned NOT NULL COMMENT '{"label":"Nombre del Cliente","input":"default","selectBy":["nombre","apellido"],"button":{"content":"Nuevo Cliente","action":"edit","subTable":"ci_usuarios","subView":"draft","onclick":"oModal.open(this)"}}',
  `ids_vasos` varchar(250) DEFAULT NULL COMMENT '{"label":"Agregar Vasos","input":"button","subTable":"hbf_vasos","action":"edit","onclick":"oCrud.save(this,oModal.open)","content":"Haz click para agregar vasos","validate":0}',
  `importe` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `a_cuenta` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `saldo` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `prioridad` varchar(500) DEFAULT NULL COMMENT '{"label":"Prioridad","input":"radios","options":["programada","normal","rapida"],"validate":0}',
  `hora_entrega` time DEFAULT NULL COMMENT '{"validate":0}',
  `tipo_consumo` varchar(500) DEFAULT NULL COMMENT '{"label":"Tipo de Consumo","input":"select","options":["Socio","Estudiante"]}',
  `comentarios` text COMMENT '{"validate":0}',
  `id_ficha_prepago` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Ficha Prepago","input":"select","selectBy":"id_cliente","validate":0}',
  `pagado` varchar(10) DEFAULT NULL COMMENT '{"label":"Estado de la comanda","input":"radios","options":["debe","pagado"],"validate":0}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_comanda`),
  KEY `hbf_comandas_ibfk_1` (`id_club`),
  KEY `hbf_comandas_ibfk_2` (`id_turno`),
  KEY `hbf_comandas_ibfk_3` (`id_sesion`),
  KEY `hbf_comandas_ibfk_5` (`id_cliente`),
  KEY `hbf_comandas_ibfk_6` (`id_user_modified`),
  KEY `hbf_comandas_ibfk_7` (`id_user_created`),
  KEY `hbf_comandas_ibfk_8` (`id_ficha_prepago`),
  CONSTRAINT `hbf_comandas_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hbf_comandas_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hbf_comandas_ibfk_3` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`),
  CONSTRAINT `hbf_comandas_ibfk_4` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_comandas_ibfk_5` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_comandas_ibfk_6` FOREIGN KEY (`id_cliente`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_comandas_ibfk_8` FOREIGN KEY (`id_ficha_prepago`) REFERENCES `hbf_prepagos` (`id_prepago`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hbf_detalles_pedidos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_detalles_pedidos`;
CREATE TABLE `hbf_detalles_pedidos` (
  `id_detalle_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_comanda` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Comanda del Cliente","input":"select","selectBy":["id_cliente"]}',
  `id_vaso` int(10) unsigned NOT NULL COMMENT '{"label":"Vaso del Cliente","input":"select","selectBy":["id_comanda"]}',
  `id_producto` int(10) unsigned NOT NULL COMMENT '{"label":"Producto","input":"checkbox","selectBy":["nombre","foto_producto",["id_option_tipo_producto"]],"divider":"|","insertEachOne":true}',
  `cantidad` int(11) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_detalle_pedido`),
  KEY `id_user_modified` (`id_user_modified`),
  KEY `id_user_created` (`id_user_created`),
  KEY `id_vaso` (`id_vaso`),
  KEY `hbf_detalles_pedidos_ibfk_4` (`id_producto`),
  KEY `id_comanda` (`id_comanda`),
  CONSTRAINT `hbf_detalles_pedidos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_detalles_pedidos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_detalles_pedidos_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`),
  CONSTRAINT `hbf_detalles_pedidos_ibfk_5` FOREIGN KEY (`id_vaso`) REFERENCES `hbf_vasos` (`id_vaso`),
  CONSTRAINT `hbf_detalles_pedidos_ibfk_6` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='{"title":"Detalles de Pedidos"}';

-- ----------------------------
--  Table structure for `hbf_egresos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_egresos`;
CREATE TABLE `hbf_egresos` (
  `id_egreso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Club de","input":"select","selectBy":["nombre"]}',
  `id_turno` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Turno de","input":"select","selectBy":["id_asociado"]}',
  `id_sesion` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Sesion de","input":"select","selectBy":["id_asociado"]}',
  `id_cliente` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Cliente","input":"default","selectBy":["nombre"],"validate":0}',
  `detalle` varchar(500) DEFAULT NULL,
  `tipo_egreso` varchar(10) DEFAULT NULL COMMENT '{"label":"Tipo de Egreso","input":"select","options":["Gastos","Costos"]}',
  `fecha_egreso` date DEFAULT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_egreso`),
  UNIQUE KEY `hbf_egresos_id_egreso_uindex` (`id_egreso`),
  KEY `hbf_egresos_ibfk_1` (`id_user_created`),
  KEY `hbf_egresos_ibfk_2` (`id_user_modified`),
  KEY `hbf_egresos_ibfk_3` (`id_cliente`),
  KEY `hbf_egresos_ibfk_4` (`id_turno`),
  KEY `hbf_egresos_ibfk_5` (`id_sesion`),
  KEY `hbf_egresos_ibfk_6` (`id_club`),
  CONSTRAINT `hbf_egresos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_egresos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_egresos_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_egresos_ibfk_4` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`),
  CONSTRAINT `hbf_egresos_ibfk_5` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`),
  CONSTRAINT `hbf_egresos_ibfk_6` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `hbf_ingresos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_ingresos`;
CREATE TABLE `hbf_ingresos` (
  `id_ingreso` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Nombre del Cliente","input":"default","selectBy":["nombre","apellido"]}',
  `id_comanda` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Comanda","input":"dropdown","selectBy":["id_cliente"]}',
  `id_prepago` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Prepago","input":"dropdown","selectBy":["id_cliente"]}',
  `id_producto` int(11) unsigned DEFAULT NULL COMMENT '{"label":"Producto","input":"dropdown","selectBy":["nombre","descripcion"]}',
  `estado` varchar(15) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(10) unsigned NOT NULL,
  `id_user_created` int(10) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `hbf_ingresos_ibfk_3` (`id_cliente`),
  KEY `hbf_ingresos_ibfk_5` (`id_comanda`),
  KEY `hbf_ingresos_ibfk_6` (`id_prepago`),
  KEY `hbf_ingresos_ibfk_4` (`id_producto`),
  KEY `hbf_ingresos_ibfk_1` (`id_user_modified`),
  KEY `hbf_ingresos_ibfk_2` (`id_user_created`),
  CONSTRAINT `hbf_ingresos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ingresos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ingresos_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ingresos_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`),
  CONSTRAINT `hbf_ingresos_ibfk_5` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`),
  CONSTRAINT `hbf_ingresos_ibfk_6` FOREIGN KEY (`id_prepago`) REFERENCES `hbf_prepagos` (`id_prepago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `hbf_porciones`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_porciones`;
CREATE TABLE `hbf_porciones` (
  `id_porcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Productos","input":"checkbox","selectBy":["nombre","foto_producto"],"divider":"|","insertEachOne":true}',
  `cantidad` int(11) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_porcion`),
  KEY `hbf_porsiones_ibfk_1` (`id_user_created`),
  KEY `hbf_porsiones_ibfk_2` (`id_user_modified`),
  KEY `hbf_porsiones_ibfk_3` (`id_producto`),
  CONSTRAINT `hbf_porciones_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_porciones_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_porciones_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `hbf_prepagos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_prepagos`;
CREATE TABLE `hbf_prepagos` (
  `id_prepago` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Cliente","input":"dropdown","selectBy":["nombre","apellido"]}',
  `id_turno` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Turno de","input":"select","selectBy":["id_asociado"]}',
  `id_sesion` int(10) unsigned NOT NULL COMMENT '{"label":"Sesion de","input":"select","selectBy":["id_asociado"]}',
  `fichas_total` int(11) DEFAULT NULL,
  `fichas_usadas` int(11) DEFAULT NULL,
  `fichas_gratis` int(11) DEFAULT NULL,
  `fichas_restantes` int(11) DEFAULT NULL,
  `id_option_tipo_prepago` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Tipo de Prepago","input":"select","selectBy":["id_setting"],"filterBy":{"id_setting":5,"0":"nombre"}}',
  `a_cuenta` decimal(10,0) DEFAULT NULL,
  `saldo` decimal(10,0) DEFAULT NULL,
  `importe` decimal(10,0) DEFAULT NULL,
  `pagado` varchar(50) DEFAULT 'NO' COMMENT '{"options":["SI","NO"],"input":"radios"}',
  `finalizado` varchar(50) DEFAULT 'NO' COMMENT '{"options":["SI","NO"],"input":"radios"}',
  `observaciones` int(11) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_created` int(11) unsigned NOT NULL,
  `id_user_modified` int(11) unsigned NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_prepago`),
  KEY `hbf_prepago_ibfk_1` (`id_cliente`),
  KEY `hbf_prepago_ibfk_2` (`id_user_modified`),
  KEY `hbf_prepago_ibfk_3` (`id_user_created`),
  KEY `hbf_prepago_ibfk_5` (`id_option_tipo_prepago`),
  KEY `hbf_prepago_ibfk_6` (`id_turno`),
  KEY `hbf_prepagos_ibfk_4` (`id_sesion`),
  CONSTRAINT `hbf_prepagos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_prepagos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_prepagos_ibfk_3` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_prepagos_ibfk_4` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`),
  CONSTRAINT `hbf_prepagos_ibfk_5` FOREIGN KEY (`id_option_tipo_prepago`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `hbf_prepagos_ibfk_6` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `hbf_productos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_productos`;
CREATE TABLE `hbf_productos` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL COMMENT '{"validate":0}',
  `id_option_tipo_producto` int(10) unsigned NOT NULL COMMENT '{"label":"Tipos de Productos","input":"dropdown","selectBy":["id_setting"],"filterBy":{"id_setting":6,"0":"nombre"}}',
  `id_option_categoria_producto` int(10) unsigned NOT NULL COMMENT '{"label":"Categorias de Productos","input":"dropdown","selectBy":["id_setting"],"filterBy":{"id_setting":7,"0":"nombre"}}',
  `foto_producto` varchar(500) DEFAULT NULL COMMENT '{"label":"Imagen del producto","input":"image", "validate":0}',
  `precio_venta` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Precio de ventra"}',
  `precio_porcion` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Precio de una porcion"}',
  `precio_compra` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Precio de Compra"}',
  `num_porciones` int(11) DEFAULT '0' COMMENT '{"label":"Numero de Porciones"}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `hbf_productos_ibfk_1` (`id_user_modified`),
  KEY `hbf_productos_ibfk_2` (`id_user_created`),
  KEY `hbf_productos_ibfk_3` (`id_option_categoria_producto`),
  KEY `hbf_productos_ibfk_4` (`id_option_tipo_producto`),
  CONSTRAINT `hbf_productos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_productos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_productos_ibfk_3` FOREIGN KEY (`id_option_categoria_producto`) REFERENCES `ci_options` (`id_option`),
  CONSTRAINT `hbf_productos_ibfk_4` FOREIGN KEY (`id_option_tipo_producto`) REFERENCES `ci_options` (`id_option`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hbf_sesiones`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_sesiones`;
CREATE TABLE `hbf_sesiones` (
  `id_sesion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(11) unsigned NOT NULL COMMENT '{"label":"Nombre del club","input":"select","selectBy":"nombre"}',
  `id_turno` int(11) unsigned NOT NULL COMMENT '{"label":"Turno de","input":"default","selectBy":"id_asociado"}',
  `id_asociado` int(11) unsigned NOT NULL COMMENT '{"label":"Sesion a cargo de","input":"default","selectBy":["nombre","apellido"]}',
  `detalle` varchar(400) DEFAULT '',
  `caja_inicial` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Monto inicial en caja"}',
  `caja_final` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Monto final en caja"}',
  `total` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Monto total en caja"}',
  `num_consumos` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Cantidad de consumos del dia"}',
  `total_ingresos` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Total ingresos"}',
  `total_egresos` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Total egresos"}',
  `total_deben` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Total deudas de clientes"}',
  `total_sobra` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Total dinero sobrante"}',
  `total_falta` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Total dinero faltante"}',
  `sobre_rojo` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Dinero al sobre rojo"}',
  `sobre_verde` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Dinero al sobre verde"}',
  `deposito` decimal(10,0) DEFAULT NULL COMMENT '{"label":"Dinero depositado"}',
  `cerrado` varchar(10) DEFAULT NULL COMMENT '{"label":"Estado de la sesion","input":"radios","options":["cerrado","abierto"]}',
  `observaciones` varchar(400) DEFAULT '',
  `fec_sesion` datetime DEFAULT NULL,
  `id_opcion_sesion` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Sesion con","input":"select","selectBy":["id_setting"],"filterBy":{"id_setting":9,"0":"nombre"}}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `id_encargado` (`id_asociado`),
  KEY `id_club` (`id_club`),
  KEY `id_turno` (`id_turno`),
  KEY `id_user_modified` (`id_user_modified`),
  KEY `id_user_created` (`id_user_created`),
  KEY `hbf_sesiones_ibfk_6` (`id_opcion_sesion`),
  CONSTRAINT `hbf_sesiones_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_sesiones_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_sesiones_ibfk_3` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`),
  CONSTRAINT `hbf_sesiones_ibfk_4` FOREIGN KEY (`id_asociado`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_sesiones_ibfk_5` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`),
  CONSTRAINT `hbf_sesiones_ibfk_6` FOREIGN KEY (`id_opcion_sesion`) REFERENCES `ci_options` (`id_option`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='{"id_opcion_sesion":{"edit-ini":["fec_sesion","caja_inicial"]}}';

-- ----------------------------
--  Table structure for `hbf_turnos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_turnos`;
CREATE TABLE `hbf_turnos` (
  `id_turno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(10) unsigned NOT NULL COMMENT '{"label":"Nombre del Club","input":"dropdown","selectBy":"nombre"}',
  `id_asociado` int(10) unsigned NOT NULL COMMENT '{"label":"Asociado a cargo","input":"dropdown","selectBy":["nombre","apellido"]}',
  `descripcion` text COMMENT '{"validate":0}',
  `fec_inicio` date NOT NULL COMMENT '{"label":"Fecha de Inicio","validate":0}',
  `fec_fin` date DEFAULT NULL COMMENT '{"label":"Fecha de Cierre","validate":0}',
  `horario_desde` time NOT NULL COMMENT '{"label":"hora de inicio","validate":0}',
  `horario_hasta` time NOT NULL COMMENT '{"label":"Hora de Cierre","validate":0}',
  `total_consumos` int(11) NOT NULL DEFAULT '0' COMMENT '{"label":"Total de consumos","validate":0}',
  `id_opcion_turnos` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Turno con","input":"select","selectBy":["id_setting"],"filterBy":{"id_setting":10,"0":"nombre"}}',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `id_asociado` (`id_asociado`),
  KEY `id_club` (`id_club`),
  KEY `id_user_modified` (`id_user_modified`),
  KEY `id_user_created` (`id_user_created`),
  KEY `hbf_turnos_ibfk_5` (`id_opcion_turnos`),
  CONSTRAINT `hbf_turnos_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_turnos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_turnos_ibfk_3` FOREIGN KEY (`id_asociado`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_turnos_ibfk_4` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`),
  CONSTRAINT `hbf_turnos_ibfk_5` FOREIGN KEY (`id_opcion_turnos`) REFERENCES `ci_options` (`id_option`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='{"id_opcion_turnos":{"edit-ini":["fec_inicio"]}}';

-- ----------------------------
--  Table structure for `hbf_vasos`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_vasos`;
CREATE TABLE `hbf_vasos` (
  `id_vaso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_comanda` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Comanda del Cliente","input":"select","selectBy":["id_cliente"]}',
  `nivel` int(11) DEFAULT NULL COMMENT '{"label":"Nivel del vaso (0% - 100%)"}',
  `temperatura` varchar(250) DEFAULT NULL COMMENT '{"label":"Temperatura","options":["Frio","Tibio","Caliente"],"input":"radios"}',
  `consistencia` varchar(250) DEFAULT NULL COMMENT '{"label":"Consistencia","options":["Cremoso","Al jugo"],"input":"radios"}',
  `id_opcion_tipo_producto` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Tipos de Productos","input":"radios","selectBy":["id_setting"],"filterBy":{"id_setting":6,"0":"nombre"},\n"subTable":"hbf_detalles_pedidos","action":"edit","onclick":"oModal.open(this)"}',
  `num_productos` int(11) DEFAULT '0' COMMENT '{"label":"Numero de Productos","validate":0,"data":{"step":1}}',
  `detalle` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_vaso`),
  KEY `hbf_vasos_ibfk_1` (`id_user_modified`),
  KEY `hbf_vasos_ibfk_2` (`id_user_created`),
  KEY `hbf_vasos_ibfk_3` (`id_comanda`),
  KEY `hbf_vasos_ibfk_4` (`id_opcion_tipo_producto`),
  CONSTRAINT `hbf_vasos_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hbf_vasos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hbf_vasos_ibfk_3` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`),
  CONSTRAINT `hbf_vasos_ibfk_4` FOREIGN KEY (`id_opcion_tipo_producto`) REFERENCES `ci_options` (`id_option`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hbf_ventas`
-- ----------------------------
DROP TABLE IF EXISTS `hbf_ventas`;
CREATE TABLE `hbf_ventas` (
  `id_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_club` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Club","input":"select","selectBy":["nombre"]}',
  `id_turno` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Turno de","input":"select","selectBy":["id_asociado"]}',
  `id_sesion` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Sesion de","input":"select","selectBy":["id_asociado"]}',
  `id_cliente` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Cliente","input":"select","selectBy":["nombre","apellido"]}',
  `fecha_venta` date DEFAULT NULL,
  `id_producto` int(10) unsigned DEFAULT NULL COMMENT '{"label":"Producto","input":"multiselect","selectBy":["nombre","foto_producto"]}',
  `precio` decimal(10,0) DEFAULT NULL,
  `observaciones` varchar(600) DEFAULT NULL,
  `a_cuenta` decimal(10,0) DEFAULT NULL,
  `saldo` decimal(10,0) DEFAULT NULL,
  `entregado` varchar(10) DEFAULT NULL COMMENT '{"label":"Fue Entregado?","input":"radios","options":["si","no"]}',
  `pagado` varchar(10) DEFAULT NULL COMMENT '{"label":"Fue Pagado?","input":"radios","options":["si","no"]}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) unsigned NOT NULL,
  `id_user_created` int(11) unsigned NOT NULL,
  `date_modified` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`),
  UNIQUE KEY `hbf_ventas_id_venta_uindex` (`id_venta`),
  KEY `hbf_ventas_ibfk_1` (`id_user_created`),
  KEY `hbf_ventas_ibfk_2` (`id_user_modified`),
  KEY `hbf_ventas_ibfk_3` (`id_cliente`),
  KEY `hbf_ventas_ibfk_4` (`id_club`),
  KEY `hbf_ventas_ibfk_5` (`id_turno`),
  KEY `hbf_ventas_ibfk_6` (`id_sesion`),
  KEY `hbf_ventas_ibfk_7` (`id_producto`),
  CONSTRAINT `hbf_ventas_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ventas_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ventas_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `ci_usuarios` (`id_usuario`),
  CONSTRAINT `hbf_ventas_ibfk_4` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`),
  CONSTRAINT `hbf_ventas_ibfk_5` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`),
  CONSTRAINT `hbf_ventas_ibfk_6` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`),
  CONSTRAINT `hbf_ventas_ibfk_7` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `ci_modulos` VALUES ('0',NULL,NULL,'','','','','','base/usuarios','','0','1','1','2018-07-20 02:21:53','2018-06-16 01:56:26'), ('11','5','1','Modulos','ci_modulos','0','','','base/modulos','','0','1','1','2018-07-20 02:23:12','2018-06-16 01:56:00'), ('12','5','1','Opciones del Sistema','ci_options','0','','','base/options','','0','1','1','2018-07-20 02:23:00','2018-06-16 01:56:06'), ('13','5','1','Sesiones del Sistema','ci_sessions','0','','','base/sessions','','0','1','1','2018-07-20 02:22:47','2018-06-18 02:35:51'), ('14','5','1','Configuraciones del Sistema','ci_settings','0','','','base/settings','','0','1','1','2018-07-20 02:22:27','2018-06-16 01:56:16'), ('31','4','1','Clubs','hbf_clubs','0','','','admin/clubs','','0','1','1','2018-07-20 02:21:41','2018-06-16 10:40:27'), ('32','3','7','Comandas','hbf_comandas','0','','','admin/comandas','','0','1','1','2018-07-20 02:20:52','2018-06-16 10:40:29'), ('33','21','7','Detalles de Pedidos','hbf_detalles_pedidos','0','','','admin/detalles_pedidos','','0','1','1','2018-07-20 02:20:42','2018-06-16 10:40:51'), ('34','2','6','Egresos','hbf_egresos','0','','','admin/egresos','','0','1','1','2018-07-20 02:19:49','2018-06-16 10:41:09'), ('35','2','6','Ingresos','hbf_ingresos','0','','','admin/ingresos','','0','1','1','2018-07-20 02:19:37','2018-06-16 10:41:33'), ('36','24',NULL,'Porciones','hbf_porciones','0','','','admin/porciones','','0','1','1','2018-07-20 02:20:26','2018-06-16 10:41:58'), ('37','22','6','Prepagos','hbf_prepagos','0','','','admin/prepagos','','0','1','1','2018-07-20 02:19:18','2018-06-16 10:42:04'), ('38','24','6','Productos','hbf_productos','0','','','admin/productos','','0','1','1','2018-07-20 02:20:12','2018-06-16 10:42:29'), ('39','4','7','Sesiones','hbf_sesiones','0','','','admin/sesiones','','0','1','1','2018-07-20 02:21:27','2018-06-16 10:42:41'), ('310','4','6','Turnos','hbf_turnos','0','','','admin/turnos','','0','1','1','2018-07-20 02:21:02','2018-06-16 10:42:53'), ('311','24','7','Vasos','hbf_vasos','0','','','admin/vasos','','0','1','1','2018-07-20 02:20:00','2018-06-16 10:43:02'), ('312','3','6','Ventas','hbf_ventas','0','','','admin/ventas','','0','1','1','2018-07-20 02:19:00','2018-06-16 10:43:17');
INSERT INTO `ci_options` VALUES ('1','Super Admin','Super Admin','4',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 19:56:11','2018-06-15 00:11:44'), ('2','Administracion','Modulo para el control financiero del club','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:07:39','2018-06-15 02:07:39'), ('3','Caja','Modulo para la administracion de los pedidos del club','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:08:19','2018-06-15 02:08:19'), ('4','Sucursales','Modulo para la administracion de clubs herbalife','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:09:19','2018-06-15 02:09:19'), ('5','Sistema','Modulo para las configuraciones del Sistema herbalife','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:09:55','2018-06-15 02:09:55'), ('6','Admin','Dueño del club','4',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 19:55:49','2018-06-15 19:55:49'), ('7','Estudiante','Empleado del club','4',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 19:56:38','2018-06-15 19:56:38'), ('8','Usuario Borrador','Usuario sin informacion','5',NULL,NULL,NULL,NULL,'edit-draft','ENABLED','0','1','1','2018-06-18 20:44:40','2018-06-18 02:40:16'), ('9','Cliente','Persona que asiste al club','5',NULL,NULL,NULL,NULL,'edit-cliente','ENABLED','0','1','1','2018-06-18 20:42:21','2018-06-18 20:42:21'), ('10','Inicial','Usuario con datos basicos','5',NULL,NULL,NULL,NULL,'edit-ini','ENABLED','0','1','1','2018-06-19 16:53:32','2018-06-19 16:53:32'), ('11','Interna','Categoría Interna','7',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:10:21','2018-06-21 22:10:21'), ('12','Externa','Categoría Externa','7',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:10:45','2018-06-21 22:10:45'), ('13','Promocion','Categoría Promocion','7',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:10:59','2018-06-21 22:10:59'), ('14','Batido','Productos del tipo batido','6',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:12:06','2018-06-21 22:12:06'), ('15','Te','Productos del tipo te','6',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:12:30','2018-06-21 22:12:30'), ('16','Aloe','Productos del tipo aloe','6',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-21 22:16:07','2018-06-21 22:12:46'), ('17','Datos Basicos','Turno con datos basicos','10','1',NULL,NULL,NULL,'edit-ini','ENABLED','0','1','1','2018-06-21 23:39:01','2018-06-21 23:39:01'), ('18','Datos Basicos','Sesion con datos basicos','9','0',NULL,NULL,NULL,'edit-ini','ENABLED','0','1','1','2018-06-21 23:39:33','2018-06-21 23:39:33'), ('19','estudiante','Persona que empieza en herbalife','2',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-09-12 21:07:54','2018-09-12 21:07:54'), ('20','socio junior','El nivel mas bajo de herbalife','3',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-09-12 21:08:28','2018-09-12 21:08:28'), ('21','Reportes','Modulo para la administracion de Clientes del club','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:08:19','2018-06-15 02:08:19'), ('22','Promociones','Modulo para la administracion de las promociones del club','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:08:19','2018-06-15 02:08:19'), ('23','Recursos Humanos','Modulo para la administracion del personal del club','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:08:19','2018-06-15 02:08:19'), ('24','Inventario','Modulo para la administracion de los productos','1',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 02:08:19','2018-06-15 02:08:19'), ('25','magali','administradora del sistema','8',NULL,'150','10',NULL,NULL,'ENABLED','0','1','1','2018-09-18 12:16:55','2018-09-18 12:16:55'), ('26','Cliente','Cliente que asiste al club','4',NULL,NULL,NULL,NULL,NULL,'ENABLED','0','1','1','2018-06-15 19:56:38','2018-06-15 19:56:38');
INSERT INTO `ci_sessions` VALUES ('15n7s8jfv8qavlndm6vlfc45ru','127.0.0.1','1567132557','__ci_last_regenerate|i:1567132557;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('1u71ssljqjo0p5qs5d6oj21lvc','127.0.0.1','1567129488','__ci_last_regenerate|i:1567129488;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('27notnfil88jects3mplmil6cl','127.0.0.1','1568424785','__ci_last_regenerate|i:1568424785;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('30iiaoj9v8p8vbjn990m1ubab6','127.0.0.1','1567126468','__ci_last_regenerate|i:1567126468;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('34qngm104ovabi4d7dr4a1f817','127.0.0.1','1567132924','__ci_last_regenerate|i:1567132924;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('3g4mmlusql96hm26tldln32rg2','127.0.0.1','1568078915','__ci_last_regenerate|i:1568078915;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('4f5s380qdnbg7dtg9fbbktibko','127.0.0.1','1568424450','__ci_last_regenerate|i:1568424450;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('564t63s85ghl717v3s5jda5esq','127.0.0.1','1567135423','__ci_last_regenerate|i:1567135423;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('5hkq4udouavioqo0erkplb3mkn','127.0.0.1','1568313456','__ci_last_regenerate|i:1568313456;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('6ioktca6l3i7pi180ng16ck2d3','127.0.0.1','1567131620','__ci_last_regenerate|i:1567131620;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('6u60gnmt4179b9llc3vsn4r8o8','127.0.0.1','1568077315','__ci_last_regenerate|i:1568077315;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('7plkl31fi33bnbobteqedv484q','127.0.0.1','1567129845','__ci_last_regenerate|i:1567129845;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('82s6bilt40jh31gl7k2842u37a','127.0.0.1','1567135048','__ci_last_regenerate|i:1567135048;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('838ga4dvghgttm7br1taqkcsa9','127.0.0.1','1567470745','__ci_last_regenerate|i:1567470736;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('9jv3t3e2rbs90a5l8ul40vs6cn','127.0.0.1','1568165609','__ci_last_regenerate|i:1568165609;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('admjl9hc023kc55rb0v37ghtnu','127.0.0.1','1567546702','__ci_last_regenerate|i:1567546702;','0000-00-00 00:00:00',NULL,NULL), ('aq68sk84eed7q83i50re2pdk8n','127.0.0.1','1567730198','__ci_last_regenerate|i:1567730195;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('bupscgqnhk8sa2p18a94cs869j','127.0.0.1','1568313487','__ci_last_regenerate|i:1568313456;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('cgj1vdaek652hf1shi1ra0ct16','127.0.0.1','1567792563','__ci_last_regenerate|i:1567792563;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('dhcfhh77adp10uaenqbjc80djv','127.0.0.1','1568079324','__ci_last_regenerate|i:1568079292;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('dhq06e2ke2hl72pi412bfuposa','127.0.0.1','1568074879','__ci_last_regenerate|i:1568074878;','0000-00-00 00:00:00',NULL,NULL), ('fluk28ul8q700lrij2huqulfmr','127.0.0.1','1567134400','__ci_last_regenerate|i:1567134400;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('g1n2fmcs6af7ut5d5gv2ceff37','127.0.0.1','1567128713','__ci_last_regenerate|i:1567128713;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('haaesslbjkll1r4d9p9ta22v2g','127.0.0.1','1567791806','__ci_last_regenerate|i:1567791806;','0000-00-00 00:00:00',NULL,NULL), ('hllc3jfrqt0mbaga7ls39gc9kc','127.0.0.1','1567130900','__ci_last_regenerate|i:1567130900;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('il4u1ksgvcat7mirplmrno8se7','127.0.0.1','1568157492','__ci_last_regenerate|i:1568157492;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('iq2dem050ks15i7r80tkf4qg9u','127.0.0.1','1567546916','__ci_last_regenerate|i:1567546702;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('j226gaigvam1h9buhmq38nug7r','127.0.0.1','1567131234','__ci_last_regenerate|i:1567131234;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('j8nbdft4uidg5hanpr1qgj9fu3','127.0.0.1','1567792856','__ci_last_regenerate|i:1567792563;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('mnhul3n7vvm2219ut3a6c1fig7','127.0.0.1','1568076960','__ci_last_regenerate|i:1568076960;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('nigbncspmku9t8122v0cjla9gu','127.0.0.1','1567730435','__ci_last_regenerate|i:1567730195;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('pmbp705ors7q0c24garde55qor','127.0.0.1','1567789578','__ci_last_regenerate|i:1567789578;','0000-00-00 00:00:00',NULL,NULL), ('pmn4qh8jmhdec5enfpso0ds1tf','127.0.0.1','1567135551','__ci_last_regenerate|i:1567135423;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('pns5ol0s46r9i6qknb4l71oh66','127.0.0.1','1567131930','__ci_last_regenerate|i:1567131930;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('qe1umh43kfvf2hnouoldharhd6','127.0.0.1','1568166928','__ci_last_regenerate|i:1568166924;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('qki40jme5605he11n56acr9a1c','127.0.0.1','1567790270','__ci_last_regenerate|i:1567790270;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('qvq9f3ku8fank4hpt6ni1msov4','127.0.0.1','1568155785','__ci_last_regenerate|i:1568155785;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('qvtagkl7ciq2eq252j7rpo260u','127.0.0.1','1567134016','__ci_last_regenerate|i:1567134016;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('rmc6cm8jn5cm96t3svtdr0koa7','127.0.0.1','1568160157','__ci_last_regenerate|i:1568160157;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('s14theenr6g352aapeso8s66p8','127.0.0.1','1567133264','__ci_last_regenerate|i:1567133264;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('tdnru37pnq62oun2idrj59ohfp','127.0.0.1','1568424791','__ci_last_regenerate|i:1568424785;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('tk8evt59s6f1ks4tl7j96sq1b4','127.0.0.1','1568155474','__ci_last_regenerate|i:1568155474;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('tt2e94alq55asvjbt26jtglmbg','127.0.0.1','1567789895','__ci_last_regenerate|i:1567789895;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('u5gf0a93qi7cocah5kko95t8uq','127.0.0.1','1567790931','__ci_last_regenerate|i:1567790929;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('u7hbgk4h2m74bmjapp5a068es4','127.0.0.1','1568079292','__ci_last_regenerate|i:1568079292;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('uc12gkt8s5kgf86255nm6dk36k','127.0.0.1','1568166924','__ci_last_regenerate|i:1568166924;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('uc2tfbnsplob4e51r6g5vnehbe','127.0.0.1','1567129143','__ci_last_regenerate|i:1567129143;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL), ('vqlnrp638m0ej4i9p565r71rh0','127.0.0.1','1567792108','__ci_last_regenerate|i:1567792108;admin_loggedin|a:7:{s:10:\"id_usuario\";s:2:\"12\";s:5:\"email\";s:14:\"magy@gmail.com\";s:8:\"password\";s:128:\"35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4\";s:14:\"id_opcion_role\";s:1:\"1\";s:6:\"nombre\";s:6:\"magali\";s:8:\"apellido\";s:4:\"vera\";s:8:\"loggedin\";b:1;}','0000-00-00 00:00:00',NULL,NULL);
INSERT INTO `ci_settings` VALUES ('1','Modulos','ci_modulos','id_opcion_modulo','[\"id_modulo\",\"id_opcion_modulo\",\"listed\",\"descripcion\",\"icon\",\"url\",\"estado\",\"change_count\",\"id_user_modified\",\"id_user_created\",\"date_modified\",\"date_created\"]','edit-modulos','Opciones para los módulos del sistema','ENABLED','0','1','1','2018-07-20 00:04:54','2018-06-14 23:20:39'), ('2','Tipo Asociado','ci_usuarios','id_option_tipo_asociado','[\"id_usuario\",\"nombre\",\"apellido\",\"email\",\"sexo\",\"invitado_por\",\"cellphone_number_1\",\"id_option_tipo_asociado\",\"id_club\",\"id_turno\",\"id_sesion\",\"id_opcion_role\",\"foto_perfil\",\"estado\",\"date_modified\",\"date_created\"]','edit-tipo_asociado','Opciones para el tipo de asociado','ENABLED','0','1','1','2018-07-20 00:06:04','2018-06-14 23:21:04'), ('3','Nivel Asociado','ci_usuarios','id_option_nivel_asociado','[\"id_usuario\",\"nombre\",\"apellido\",\"sexo\",\"cellphone_number_1\",\"id_option_nivel_asociado\",\"id_club\",\"id_turno\",\"id_sesion\",\"id_opcion_role\",\"foto_perfil\",\"estado\",\"date_modified\",\"date_created\"]','edit-nivel_asociado','Opciones para el nivel de asociado','ENABLED','0','1','1','2018-07-20 00:07:05','2018-06-14 23:20:59'), ('4','Roles','ci_usuarios','id_opcion_role','[\"id_usuario\",\"nombre\",\"apellido\",\"fec_nacimiento\",\"sexo\",\"cellphone_number_1\",\"id_club\",\"id_turno\",\"id_sesion\",\"id_opcion_role\",\"foto_perfil\",\"estado\",\"date_modified\",\"date_created\"]','edit-roles','Opciones para el role del usuario','ENABLED','0','1','1','2018-07-20 00:07:59','2018-06-14 23:20:52'), ('5','Usuario','ci_usuarios','id_tipo_usuario','[\"id_usuario\",\"nombre\",\"apellido\",\"fec_nacimiento\",\"sexo\",\"cellphone_number_1\",\"id_club\",\"id_turno\",\"id_sesion\",\"foto_perfil\",\"id_tipo_usuario\",\"estado\",\"date_modified\",\"date_created\"]','edit-tipo_usuario','Opciones','ENABLED','0','1','1','2018-07-20 00:09:03','2018-06-14 23:20:46'), ('6','Tipo de producto','hbf_productos',NULL,NULL,'edit-tipo_producto','Opciones para el tipo de producto','ENABLED','0','1','1','2018-06-14 23:21:23','2018-06-14 23:21:23'), ('7','Categoría de Productos','hbf_productos','','','edit-categoria_producto','Opciones para las categorías de productos','ENABLED','0','1','1','2018-06-21 21:53:45','2018-06-14 23:21:17'), ('8','Prepagos','hbf_prepagos','','','edit-prepagos','Opciones para los tipos de prepago','ENABLED','0','1','1','2018-06-21 21:52:26','2018-06-14 23:21:11'), ('9','Sesiones','hbf_sesiones','','','edit-ini','Opciones para sesiones del club','ENABLED','0','1','1','2018-06-21 23:37:51','2018-06-15 03:39:25'), ('10','Turnos','hbf_turnos','','','edit-ini','Opciones para turnos del club','ENABLED','0','1','1','2018-06-21 23:37:25','2018-06-21 23:35:45');
INSERT INTO `ci_usuarios` VALUES ('1','Rafael','Gutierrez',NULL,'rafael@herbalife.com.bo','7e16e374e98f5fd616092e55c81424a4ae7663bb3983ed9de09f01efd4a8ab59cb7f227fe41b2c68d21271b07b3e365f12c40545c4f46ab67bea254cd72bafe7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-06-11 15:01:55','2018-06-11 15:01:55'), ('2','Ernesto','Valdivieso',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-06-21 23:42:20','2018-06-21 23:42:20'), ('3','Esteban','Arce',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-06-22 10:26:04','2018-06-22 10:26:04'), ('4','javier','ascar',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-07-05 02:52:39','2018-07-05 02:52:39'), ('6','Juan','Perez',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-07-21 13:10:10','2018-07-21 13:10:10'), ('9','Ricardo','Peralta',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-07-21 14:45:19','2018-07-21 14:45:19'), ('11','Magali ','Vera',NULL,'magali@herbalife.com.bo','35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-09-11 16:35:34','2018-09-11 16:35:34'), ('12','magali','vera','vmagui','magy@gmail.com','35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4','0000-00-00','1','12','1234567','1234567','123456789','12345678','123456789','19','20','1','3','1','1','0','0','0','0','0','123456','10','ENABLED','2018-09-15 21:46:12','2018-09-12 17:51:05'), ('13','Pepito','Perez',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-09-15 21:56:22','2018-09-15 21:56:22'), ('14','Carolina','Vargas',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-09-15 22:17:48','2018-09-15 22:17:48'), ('18','karen','Gomez',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-09-17 22:12:20','2018-09-17 22:12:20'), ('19','isabel','peralta',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-09-18 12:14:48','2018-09-18 12:14:48'), ('20','maria','pinedo','maria','maria@gmail.com','35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4','0000-00-00','1','19','1234567','123456','123123','1234567','1234567','19','20','1','3','1','7','0','0','0','0','0','123456','10','ENABLED','2018-09-18 13:02:26','2018-09-18 13:02:26'), ('21','Beatriz','Cardozo',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2018-10-01 21:03:28','2018-10-01 21:03:28'), ('22','Daphe','Farfan','dFarfan','dfarfan@herbalife.com','35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4','0000-00-00','1','1',NULL,NULL,NULL,NULL,'123','19','20','1','3','2','6','0','1','1','0','0','123123',NULL,'ENABLED','2019-06-26 00:14:10','2019-01-14 21:31:30'), ('23','magali','Peralta',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-06-26 00:16:05','2019-06-26 00:16:05'), ('24','magali','Peralta',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-06-26 00:16:06','2019-06-26 00:16:06'), ('25',NULL,NULL,NULL,'isa@gmail.com','a49d01c0c6b7d00022aa1fd26e96d7dafcfcd4e42373c178e76203524f9021767e7b6eca7987a68f3aa132e0453e2fe6d51315d7e170a75c65ae81a49e37bdf2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-08-13 12:38:17','2019-08-13 12:38:17'), ('26','isabel','salazar',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-08-13 15:31:28','2019-08-13 15:31:28'), ('27','Angel','Hurtado',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-08-14 21:33:33','2019-08-14 21:33:33'), ('28','Favio','vera',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-08-14 22:02:40','2019-08-14 22:02:40'), ('29','Fernando','Vargas',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-08-14 22:03:06','2019-08-14 22:03:06'), ('30','graciela','pindeo',NULL,'','c7f8de33a576703e8990cce58d023adcc1949bdccf956a0da0e52b4f93062c187367d8df28adf754827da89825e93ebd7c75eddfea28d742d0df4d192d4dc223',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'0',NULL,NULL,NULL,'0',NULL,NULL,'ENABLED','2019-09-10 18:44:32','2019-09-10 18:44:32');
INSERT INTO `hbf_clubs` VALUES ('1','Club Socabaya','fernando@herbalife.com','C. Socabaya','1232323','',NULL,NULL,'ENABLED','0','1','1','2018-06-15 19:57:25','2018-06-15 19:57:25'), ('2','Club Nutricion','magali@gmail.com','villa fatima','123123123','',NULL,NULL,'ENABLED','0','1','1','2018-10-12 19:33:45','2018-10-12 19:33:45'), ('3','Club Herbalife','carla@ gmail.com','camacho','123123124','',NULL,NULL,'ENABLED','0','1','1','2018-10-12 19:35:25','2018-10-12 19:34:43'), ('4','club Choco Menta','irma@gmail.com','murillo','12456733','',NULL,NULL,'ENABLED','0','1','1','2018-10-12 19:42:52','2018-10-12 19:42:52'), ('5','Club Herbalife Nutricion','David@gmail.com','calle Santa cruz','56743524','',NULL,NULL,'ENABLED','0','1','1','2018-10-12 19:44:02','2018-10-12 19:44:02'), ('6','Club Aloe Nutricion','magalivera@gmail.com','Plaza Murillo','76538909','',NULL,NULL,'ENABLED','0','1','1','2018-10-29 19:06:47','2018-10-29 19:06:47'), ('7','Club de Daphne Farfan','clubfarfan@herbalife.com','C. Indaburo','456789','',NULL,NULL,'ENABLED','0','1','1','2019-01-14 20:13:26','2019-01-14 20:11:40');
INSERT INTO `hbf_comandas` VALUES ('1','1','3','1','22',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-03-19 18:26:14','2019-03-19 18:26:14'), ('2','1','3','2','20',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-03-19 18:34:33','2019-03-19 18:34:33'), ('6','1','3','1','24',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-13 00:19:40','2019-08-09 17:07:42'), ('7','5','3','2','20',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-13 15:27:35','2019-08-13 15:27:35'), ('8','1','3','1','26',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-13 15:31:35','2019-08-13 15:31:35'), ('9','3','3','1','26',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-16 18:28:31','2019-08-13 19:05:43'), ('18','1','3','1','29',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-14 22:03:56','2019-08-14 21:31:46'), ('19','1','3','1','27',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-14 21:33:43','2019-08-14 21:33:43'), ('20','1','3','1','27',NULL,'2','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-14 21:35:07','2019-08-14 21:35:07'), ('22','1','3','1','28',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-14 22:12:29','2019-08-14 22:12:29'), ('29','1','3','2','29',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-08-20 19:49:06','2019-08-20 19:49:06'), ('37','5','6','1','26',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-06 13:16:44','2019-09-06 13:16:44'), ('40','6','7','1','28',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-06 13:44:30','2019-09-06 13:44:30'), ('41','6','7','1','28',NULL,'50','25','25','1','12:00:00','1','',NULL,'0','ENABLED','0','1','1','2019-09-06 13:47:44','2019-09-06 13:47:44'), ('42','6','7','1','28',NULL,'50','25','25','1','12:00:00','1','<p> fgggg</p>',NULL,'0','ENABLED','0','1','1','2019-09-06 13:48:01','2019-09-06 13:48:01'), ('43','1','3','2','29',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-06 13:52:16','2019-09-06 13:52:16'), ('44','1','3','2','29',NULL,'50','25','25','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-06 13:56:03','2019-09-06 13:56:03'), ('45','1','3','2','29',NULL,'50','25','25','0','00:00:00','0','<p> nuevo batido</p>',NULL,'0','ENABLED','0','1','1','2019-09-06 13:56:19','2019-09-06 13:56:19'), ('46','1','3','2','29',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-10 18:43:40','2019-09-10 18:43:40'), ('47','1','3','2','30',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-10 18:44:37','2019-09-10 18:44:37'), ('50','1','3','2','30',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-10 19:18:41','2019-09-10 19:18:41'), ('51','6','7','1','20',NULL,'0','0','0','0','00:00:00','0','',NULL,'0','ENABLED','0','1','1','2019-09-13 21:23:27','2019-09-13 21:23:27'), ('52','6','7','1','20',NULL,'36','30','6','1','12:00:00','1','<p>a la siguiente requiere un nuevo batido</p>',NULL,'0','ENABLED','0','1','1','2019-09-13 21:27:30','2019-09-13 21:27:30'), ('53','6','7','1','20',NULL,'36','30','6','1','12:00:00','1','',NULL,'0','ENABLED','0','1','1','2019-09-13 21:27:43','2019-09-13 21:27:43');
INSERT INTO `hbf_detalles_pedidos` VALUES ('3','7','4','9','2','ENABLED','0','1','1','2019-08-13 15:28:16','2019-08-13 15:28:16'), ('6','8','5','9','3','ENABLED','0','1','1','2019-08-13 15:32:18','2019-08-13 15:32:18'), ('9','19','7','14','2','ENABLED','0','1','1','2019-08-14 21:34:35','2019-08-14 21:34:35'), ('13','22','10','12','4','ENABLED','0','1','1','2019-08-14 22:12:59','2019-08-14 22:12:59'), ('14','47','16','9','3','ENABLED','0','1','1','2019-09-10 18:45:47','2019-09-10 18:45:47'), ('15','47','16','10','4','ENABLED','0','1','1','2019-09-10 18:45:49','2019-09-10 18:45:49'), ('16','51','17','10','5','ENABLED','0','1','1','2019-09-13 21:24:51','2019-09-13 21:24:51'), ('17','51','17','11','4','ENABLED','0','1','1','2019-09-13 21:24:52','2019-09-13 21:24:52');
INSERT INTO `hbf_egresos` VALUES ('1','1','3','1','20','cremoso','0','0000-00-00','4','ENABLED','0','1','1','2019-08-13 19:12:44','2018-09-18 13:16:41');
INSERT INTO `hbf_productos` VALUES ('9','Batido de Chocolate','<p><p><p><p>Batido sabor Chocolate</p></p></p></p>','14','13','Batido_Herbalife_Fórmula_1_Chocolate_bote_550g.PNG','200','4','180','120','ENABLED','0','1','1','2018-06-21 23:59:55','2018-06-21 22:31:18'), ('10','Batido de Fresa','<p>Batido sabor fresa</p>','14','11','Batido_Herbalife_Fórmula_1_Fresa_bote_550g.PNG','200','4','180','120','ENABLED','0','1','1','2018-06-21 22:33:09','2018-06-21 22:33:09'), ('11','Batido de Vainilla','<p>Batido sabor vainilla</p>','14','11','Batido_Herbalife_Fórmula_1_Sin_Vainilla_bote_550_gr.PNG','200','4','180','120','ENABLED','0','1','1','2018-06-21 22:34:13','2018-06-21 22:34:13'), ('12','Te Frambuesa','<p>Te NRG sabor Frambuesa</p>','15','11','te_frambuesa.jpg','150','1','130','120','ENABLED','0','1','1','2018-06-21 22:35:21','2018-06-21 22:35:21'), ('13','Te Durazno','<p>Te NRG sabor Durazno</p>','15','11','te-durazno-50-gr.PNG','150','1','130','120','ENABLED','0','1','1','2018-06-21 22:36:30','2018-06-21 22:36:30'), ('14','Aloe Mandarina','<p><p>Aloe sabor Mandarina</p></p>','16','11','','130','1','110','30','ENABLED','0','1','1','2018-10-12 19:45:35','2018-06-21 22:37:49'), ('15','Aloe Mango','<p>Aloe sabor Mango</p>','16','11','aloe_mango.jpg','130','1','100','120','ENABLED','0','1','1','2018-06-21 22:38:28','2018-06-21 22:38:28');
INSERT INTO `hbf_sesiones` VALUES ('1','5','7','29','Sesion del dia','10','100','110','30','100','5','30','70','30','2','4','100','0','ninguna','2018-06-08 00:00:00','18','ENABLED','0','1','1','2019-08-15 13:35:49','2018-06-21 23:41:41'), ('2','2','3','18','cremoso','6','11','4','4','3','5','3','6','3','2','4','6','1','bla','0000-00-00 00:00:00','18','ENABLED','0','1','1','2018-10-12 19:54:20','2018-10-12 19:54:20');
INSERT INTO `hbf_turnos` VALUES ('3','1','1','<p>Turno de la noche</p>','2018-06-15','2018-06-30','08:00:00','22:00:00','0',NULL,'0','ENABLED','1','1','2018-06-15 20:02:02','2018-06-15 20:02:02'), ('6','6','29','<p>turno mañana </p>','0000-00-00','0000-00-00','08:00:00','11:00:00','10','17','0','ENABLED','1','1','2019-08-15 13:29:57','2019-08-15 13:29:57'), ('7','5','27','<p>turno tarde </p>','0000-00-00','0000-00-00','12:00:00','18:00:00','90','17','0','ENABLED','1','1','2019-08-15 13:31:26','2019-08-15 13:31:26');
INSERT INTO `hbf_vasos` VALUES ('1','1','75','0','0','14','3','cremoso','ENABLED','0','1','1','2019-03-19 18:28:29','2019-03-19 18:28:29'), ('2','2','75','1','1','14','1','cremoso','ENABLED','0','1','1','2019-06-07 21:43:11','2019-06-07 21:43:11'), ('3','6','100','0','0','14','2','','ENABLED','0','1','1','2019-08-13 00:20:22','2019-08-13 00:20:22'), ('4','7','75','1','0','14','3','cremoso','ENABLED','0','1','1','2019-08-13 15:28:15','2019-08-13 15:28:15'), ('5','8','100','1','0','14','5','cremoso','ENABLED','0','1','1','2019-08-13 15:32:16','2019-08-13 15:32:16'), ('6','9','100','1','0','14','3','cremoso','ENABLED','0','1','1','2019-08-13 19:06:48','2019-08-13 19:06:48'), ('7','19','100','1','1','16','2','','ENABLED','0','1','1','2019-08-14 21:34:34','2019-08-14 21:34:34'), ('8','20','50','2','0','14','1','cremoso','ENABLED','0','1','1','2019-08-14 21:52:53','2019-08-14 21:52:53'), ('9','18','75','1','1','14','5','uguylt','ENABLED','0','1','1','2019-08-14 22:04:59','2019-08-14 22:04:59'), ('10','22','50','2','1','15','1','','ENABLED','0','1','1','2019-08-14 22:12:58','2019-08-14 22:12:58'), ('11','22','100','1','1','15','1','','ENABLED','0','1','1','2019-08-29 20:55:14','2019-08-29 20:55:14'), ('12','22','75','2','1','15','2','','ENABLED','0','1','1','2019-09-06 13:08:39','2019-09-06 13:08:39'), ('13','37','100','1','1','14','1','','ENABLED','0','1','1','2019-09-06 13:17:11','2019-09-06 13:17:11'), ('14','37','100','1','1','16','1','','ENABLED','0','1','1','2019-09-06 13:45:01','2019-09-06 13:45:01'), ('15','22','50','0','0','14','1','','ENABLED','0','1','1','2019-09-06 13:54:29','2019-09-06 13:54:29'), ('16','47','75','1','1','14','5','','ENABLED','0','1','1','2019-09-10 18:45:46','2019-09-10 18:45:46'), ('17','51','100','0','1','14','1','','ENABLED','0','1','1','2019-09-13 21:24:47','2019-09-13 21:24:47');
INSERT INTO `hbf_ventas` VALUES ('1','7','3','2','24','0000-00-00','15','50','ninguna','20','30','0','0','ENABLED','0','1','1','2019','2019'), ('2','6','6','2','14','0000-00-00','13','200','ninguna','200','0','0','0','ENABLED','0','1','1','2019','2019'), ('3','2','6','2','21','0000-00-00','12','200','ninguna','100','100','0','1','ENABLED','0','1','1','2019','2019');
INSERT INTO `migrations` VALUES ('0');
