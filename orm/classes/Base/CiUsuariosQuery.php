<?php

namespace Base;

use \CiUsuarios as ChildCiUsuarios;
use \CiUsuariosQuery as ChildCiUsuariosQuery;
use \Exception;
use \PDO;
use Map\CiUsuariosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ci_usuarios' table.
 *
 *
 *
 * @method     ChildCiUsuariosQuery orderByIdUsuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     ChildCiUsuariosQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildCiUsuariosQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     ChildCiUsuariosQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildCiUsuariosQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCiUsuariosQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildCiUsuariosQuery orderByFecNacimiento($order = Criteria::ASC) Order by the fec_nacimiento column
 * @method     ChildCiUsuariosQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     ChildCiUsuariosQuery orderByInvitadoPor($order = Criteria::ASC) Order by the invitado_por column
 * @method     ChildCiUsuariosQuery orderByPhoneNumber1($order = Criteria::ASC) Order by the phone_number_1 column
 * @method     ChildCiUsuariosQuery orderByPhoneNumber2($order = Criteria::ASC) Order by the phone_number_2 column
 * @method     ChildCiUsuariosQuery orderByCellphoneNumber1($order = Criteria::ASC) Order by the cellphone_number_1 column
 * @method     ChildCiUsuariosQuery orderByCellphoneNumber2($order = Criteria::ASC) Order by the cellphone_number_2 column
 * @method     ChildCiUsuariosQuery orderByCodAcceso($order = Criteria::ASC) Order by the cod_acceso column
 * @method     ChildCiUsuariosQuery orderByIdOptionTipoAsociado($order = Criteria::ASC) Order by the id_option_tipo_asociado column
 * @method     ChildCiUsuariosQuery orderByIdOptionNivelAsociado($order = Criteria::ASC) Order by the id_option_nivel_asociado column
 * @method     ChildCiUsuariosQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildCiUsuariosQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildCiUsuariosQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildCiUsuariosQuery orderByIdOpcionRole($order = Criteria::ASC) Order by the id_opcion_role column
 * @method     ChildCiUsuariosQuery orderByFotoPerfil($order = Criteria::ASC) Order by the foto_perfil column
 * @method     ChildCiUsuariosQuery orderByAppMonitor($order = Criteria::ASC) Order by the app_monitor column
 * @method     ChildCiUsuariosQuery orderByAppOrders($order = Criteria::ASC) Order by the app_orders column
 * @method     ChildCiUsuariosQuery orderByAppAdmin($order = Criteria::ASC) Order by the app_admin column
 * @method     ChildCiUsuariosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildCiUsuariosQuery orderByHerbalifeKey($order = Criteria::ASC) Order by the herbalife_key column
 * @method     ChildCiUsuariosQuery orderByIdTipoUsuario($order = Criteria::ASC) Order by the id_tipo_usuario column
 * @method     ChildCiUsuariosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildCiUsuariosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildCiUsuariosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildCiUsuariosQuery groupByIdUsuario() Group by the id_usuario column
 * @method     ChildCiUsuariosQuery groupByNombre() Group by the nombre column
 * @method     ChildCiUsuariosQuery groupByApellido() Group by the apellido column
 * @method     ChildCiUsuariosQuery groupByUsername() Group by the username column
 * @method     ChildCiUsuariosQuery groupByEmail() Group by the email column
 * @method     ChildCiUsuariosQuery groupByPassword() Group by the password column
 * @method     ChildCiUsuariosQuery groupByFecNacimiento() Group by the fec_nacimiento column
 * @method     ChildCiUsuariosQuery groupBySexo() Group by the sexo column
 * @method     ChildCiUsuariosQuery groupByInvitadoPor() Group by the invitado_por column
 * @method     ChildCiUsuariosQuery groupByPhoneNumber1() Group by the phone_number_1 column
 * @method     ChildCiUsuariosQuery groupByPhoneNumber2() Group by the phone_number_2 column
 * @method     ChildCiUsuariosQuery groupByCellphoneNumber1() Group by the cellphone_number_1 column
 * @method     ChildCiUsuariosQuery groupByCellphoneNumber2() Group by the cellphone_number_2 column
 * @method     ChildCiUsuariosQuery groupByCodAcceso() Group by the cod_acceso column
 * @method     ChildCiUsuariosQuery groupByIdOptionTipoAsociado() Group by the id_option_tipo_asociado column
 * @method     ChildCiUsuariosQuery groupByIdOptionNivelAsociado() Group by the id_option_nivel_asociado column
 * @method     ChildCiUsuariosQuery groupByIdClub() Group by the id_club column
 * @method     ChildCiUsuariosQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildCiUsuariosQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildCiUsuariosQuery groupByIdOpcionRole() Group by the id_opcion_role column
 * @method     ChildCiUsuariosQuery groupByFotoPerfil() Group by the foto_perfil column
 * @method     ChildCiUsuariosQuery groupByAppMonitor() Group by the app_monitor column
 * @method     ChildCiUsuariosQuery groupByAppOrders() Group by the app_orders column
 * @method     ChildCiUsuariosQuery groupByAppAdmin() Group by the app_admin column
 * @method     ChildCiUsuariosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildCiUsuariosQuery groupByHerbalifeKey() Group by the herbalife_key column
 * @method     ChildCiUsuariosQuery groupByIdTipoUsuario() Group by the id_tipo_usuario column
 * @method     ChildCiUsuariosQuery groupByEstado() Group by the estado column
 * @method     ChildCiUsuariosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildCiUsuariosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildCiUsuariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiUsuariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiUsuariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiUsuariosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiUsuariosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiUsuariosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdOptionTipoAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdOptionTipoAsociado() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdOptionTipoAsociado() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdOptionTipoAsociado() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdOptionNivelAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdOptionNivelAsociado() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdOptionNivelAsociado() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdOptionNivelAsociado() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiUsuariosRelatedByInvitadoPor($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByInvitadoPor relation
 * @method     ChildCiUsuariosQuery rightJoinCiUsuariosRelatedByInvitadoPor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByInvitadoPor relation
 * @method     ChildCiUsuariosQuery innerJoinCiUsuariosRelatedByInvitadoPor($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByInvitadoPor relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiUsuariosRelatedByInvitadoPor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByInvitadoPor relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiUsuariosRelatedByInvitadoPor() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByInvitadoPor relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiUsuariosRelatedByInvitadoPor() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByInvitadoPor relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiUsuariosRelatedByInvitadoPor() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByInvitadoPor relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdOpcionRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOpcionRole relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdOpcionRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOpcionRole relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdOpcionRole($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOpcionRole relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdOpcionRole($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOpcionRole relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdOpcionRole() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRole relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdOpcionRole() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRole relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdOpcionRole() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRole relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfTurnosRelatedByIdTurno($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnosRelatedByIdTurno relation
 * @method     ChildCiUsuariosQuery rightJoinHbfTurnosRelatedByIdTurno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnosRelatedByIdTurno relation
 * @method     ChildCiUsuariosQuery innerJoinHbfTurnosRelatedByIdTurno($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnosRelatedByIdTurno relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfTurnosRelatedByIdTurno($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnosRelatedByIdTurno relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfTurnosRelatedByIdTurno() Adds a LEFT JOIN clause and with to the query using the HbfTurnosRelatedByIdTurno relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfTurnosRelatedByIdTurno() Adds a RIGHT JOIN clause and with to the query using the HbfTurnosRelatedByIdTurno relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfTurnosRelatedByIdTurno() Adds a INNER JOIN clause and with to the query using the HbfTurnosRelatedByIdTurno relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfSesionesRelatedByIdSesion($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesionesRelatedByIdSesion relation
 * @method     ChildCiUsuariosQuery rightJoinHbfSesionesRelatedByIdSesion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesionesRelatedByIdSesion relation
 * @method     ChildCiUsuariosQuery innerJoinHbfSesionesRelatedByIdSesion($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesionesRelatedByIdSesion relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfSesionesRelatedByIdSesion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesionesRelatedByIdSesion relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfSesionesRelatedByIdSesion() Adds a LEFT JOIN clause and with to the query using the HbfSesionesRelatedByIdSesion relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfSesionesRelatedByIdSesion() Adds a RIGHT JOIN clause and with to the query using the HbfSesionesRelatedByIdSesion relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfSesionesRelatedByIdSesion() Adds a INNER JOIN clause and with to the query using the HbfSesionesRelatedByIdSesion relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdTipoUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdTipoUsuario relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdTipoUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdTipoUsuario relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdTipoUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdTipoUsuario($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdTipoUsuario() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdTipoUsuario relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdTipoUsuario() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdTipoUsuario relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdTipoUsuario() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfClubsRelatedByIdClub($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubsRelatedByIdClub relation
 * @method     ChildCiUsuariosQuery rightJoinHbfClubsRelatedByIdClub($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubsRelatedByIdClub relation
 * @method     ChildCiUsuariosQuery innerJoinHbfClubsRelatedByIdClub($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubsRelatedByIdClub relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfClubsRelatedByIdClub($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubsRelatedByIdClub relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfClubsRelatedByIdClub() Adds a LEFT JOIN clause and with to the query using the HbfClubsRelatedByIdClub relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfClubsRelatedByIdClub() Adds a RIGHT JOIN clause and with to the query using the HbfClubsRelatedByIdClub relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfClubsRelatedByIdClub() Adds a INNER JOIN clause and with to the query using the HbfClubsRelatedByIdClub relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiModulosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiModulosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinCiModulosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiModulosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinCiModulosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiModulosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiModulosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiModulosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiModulosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiModulosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiModulosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiModulosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiModulosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiModulosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiModulosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiModulosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinCiModulosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiModulosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinCiModulosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiModulosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiModulosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiModulosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiModulosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiModulosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiModulosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiModulosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiModulosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiModulosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiOptionsRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinCiOptionsRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinCiOptionsRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiOptionsRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiOptionsRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiOptionsRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiOptionsRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiSessions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiSessions relation
 * @method     ChildCiUsuariosQuery rightJoinCiSessions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiSessions relation
 * @method     ChildCiUsuariosQuery innerJoinCiSessions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiSessions relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiSessions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiSessions relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiSessions() Adds a LEFT JOIN clause and with to the query using the CiSessions relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiSessions() Adds a RIGHT JOIN clause and with to the query using the CiSessions relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiSessions() Adds a INNER JOIN clause and with to the query using the CiSessions relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiSettingsRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiSettingsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinCiSettingsRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiSettingsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinCiSettingsRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiSettingsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiSettingsRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiSettingsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiSettingsRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiSettingsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiSettingsRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiSettingsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiSettingsRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiSettingsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiSettingsRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiSettingsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinCiSettingsRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiSettingsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinCiSettingsRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiSettingsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiSettingsRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiSettingsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiSettingsRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiSettingsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiSettingsRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiSettingsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiSettingsRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiSettingsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinCiUsuariosRelatedByIdUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUsuario relation
 * @method     ChildCiUsuariosQuery rightJoinCiUsuariosRelatedByIdUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUsuario relation
 * @method     ChildCiUsuariosQuery innerJoinCiUsuariosRelatedByIdUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUsuario relation
 *
 * @method     ChildCiUsuariosQuery joinWithCiUsuariosRelatedByIdUsuario($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUsuario relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithCiUsuariosRelatedByIdUsuario() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUsuario relation
 * @method     ChildCiUsuariosQuery rightJoinWithCiUsuariosRelatedByIdUsuario() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUsuario relation
 * @method     ChildCiUsuariosQuery innerJoinWithCiUsuariosRelatedByIdUsuario() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUsuario relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfClubsRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfClubsRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfClubsRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfClubsRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfClubsRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfClubsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfClubsRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfClubsRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfClubsRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfClubsRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfClubsRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfClubsRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfClubsRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfClubsRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfClubsRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfClubsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfClubsRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfClubsRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfClubsRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfClubsRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfComandasRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfComandasRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfComandasRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfComandasRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfComandasRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfComandasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfComandasRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfComandasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfComandasRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfComandasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfComandasRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfComandasRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfComandasRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfComandasRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfComandasRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfComandasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfComandasRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfComandasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfComandasRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfComandasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfComandasRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinHbfComandasRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinHbfComandasRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandasRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfComandasRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandasRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfComandasRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the HbfComandasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfComandasRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the HbfComandasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfComandasRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the HbfComandasRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfDetallesPedidosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfDetallesPedidosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfDetallesPedidosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfDetallesPedidosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfDetallesPedidosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfDetallesPedidosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfDetallesPedidosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfDetallesPedidosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfDetallesPedidosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfDetallesPedidosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfDetallesPedidosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfDetallesPedidosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfDetallesPedidosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfDetallesPedidosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfEgresosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfEgresosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfEgresosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfEgresosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfEgresosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfEgresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfEgresosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfEgresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfEgresosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfEgresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfEgresosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfEgresosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfEgresosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfEgresosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfEgresosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfEgresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfEgresosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfEgresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfEgresosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfEgresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfEgresosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinHbfEgresosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinHbfEgresosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfEgresosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfEgresosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the HbfEgresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfEgresosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the HbfEgresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfEgresosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the HbfEgresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfIngresosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfIngresosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfIngresosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfIngresosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfIngresosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfIngresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfIngresosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfIngresosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfIngresosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfIngresosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfIngresosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfIngresosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfIngresosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfIngresosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfIngresosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfIngresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfIngresosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfIngresosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfIngresosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfIngresosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfIngresosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinHbfIngresosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinHbfIngresosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfIngresosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfIngresosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the HbfIngresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfIngresosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the HbfIngresosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfIngresosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the HbfIngresosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfPorcionesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPorcionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfPorcionesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPorcionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfPorcionesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPorcionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfPorcionesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPorcionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfPorcionesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfPorcionesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfPorcionesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfPorcionesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPorcionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfPorcionesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPorcionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfPorcionesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPorcionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfPorcionesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPorcionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfPorcionesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfPorcionesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfPorcionesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfPorcionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfPrepagosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinHbfPrepagosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinHbfPrepagosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfPrepagosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfPrepagosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the HbfPrepagosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfPrepagosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagosRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfPrepagosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the HbfPrepagosRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfPrepagosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfPrepagosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfPrepagosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfPrepagosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfPrepagosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfPrepagosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfPrepagosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfPrepagosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfPrepagosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfPrepagosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfPrepagosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfPrepagosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfPrepagosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfPrepagosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfPrepagosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfProductosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfProductosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfProductosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfProductosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfProductosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfProductosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfProductosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfProductosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfProductosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfProductosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfProductosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfProductosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfProductosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfProductosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfSesionesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfSesionesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfSesionesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfSesionesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfSesionesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfSesionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfSesionesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfSesionesRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfSesionesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfSesionesRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfSesionesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfSesionesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfSesionesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfSesionesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfSesionesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfSesionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfSesionesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfSesionesRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfSesionesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfSesionesRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfSesionesRelatedByIdAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesionesRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinHbfSesionesRelatedByIdAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesionesRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinHbfSesionesRelatedByIdAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesionesRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfSesionesRelatedByIdAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesionesRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfSesionesRelatedByIdAsociado() Adds a LEFT JOIN clause and with to the query using the HbfSesionesRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfSesionesRelatedByIdAsociado() Adds a RIGHT JOIN clause and with to the query using the HbfSesionesRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfSesionesRelatedByIdAsociado() Adds a INNER JOIN clause and with to the query using the HbfSesionesRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfTurnosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfTurnosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfTurnosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfTurnosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfTurnosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfTurnosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfTurnosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfTurnosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfTurnosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfTurnosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfTurnosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfTurnosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfTurnosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfTurnosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfTurnosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfTurnosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfTurnosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfTurnosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfTurnosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfTurnosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfTurnosRelatedByIdAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnosRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinHbfTurnosRelatedByIdAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnosRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinHbfTurnosRelatedByIdAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnosRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfTurnosRelatedByIdAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnosRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfTurnosRelatedByIdAsociado() Adds a LEFT JOIN clause and with to the query using the HbfTurnosRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfTurnosRelatedByIdAsociado() Adds a RIGHT JOIN clause and with to the query using the HbfTurnosRelatedByIdAsociado relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfTurnosRelatedByIdAsociado() Adds a INNER JOIN clause and with to the query using the HbfTurnosRelatedByIdAsociado relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfVasosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfVasosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfVasosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfVasosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfVasosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfVasosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfVasosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfVasosRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfVasosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfVasosRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfVasosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfVasosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfVasosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfVasosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfVasosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfVasosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfVasosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfVasosRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfVasosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfVasosRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfVentasRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinHbfVentasRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinHbfVentasRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfVentasRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfVentasRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the HbfVentasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfVentasRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the HbfVentasRelatedByIdUserCreated relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfVentasRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the HbfVentasRelatedByIdUserCreated relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfVentasRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinHbfVentasRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinHbfVentasRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfVentasRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfVentasRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the HbfVentasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfVentasRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the HbfVentasRelatedByIdUserModified relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfVentasRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the HbfVentasRelatedByIdUserModified relation
 *
 * @method     ChildCiUsuariosQuery leftJoinHbfVentasRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinHbfVentasRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinHbfVentasRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentasRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery joinWithHbfVentasRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentasRelatedByIdCliente relation
 *
 * @method     ChildCiUsuariosQuery leftJoinWithHbfVentasRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the HbfVentasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery rightJoinWithHbfVentasRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the HbfVentasRelatedByIdCliente relation
 * @method     ChildCiUsuariosQuery innerJoinWithHbfVentasRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the HbfVentasRelatedByIdCliente relation
 *
 * @method     \CiOptionsQuery|\CiUsuariosQuery|\HbfTurnosQuery|\HbfSesionesQuery|\HbfClubsQuery|\CiModulosQuery|\CiSessionsQuery|\CiSettingsQuery|\HbfComandasQuery|\HbfDetallesPedidosQuery|\HbfEgresosQuery|\HbfIngresosQuery|\HbfPorcionesQuery|\HbfPrepagosQuery|\HbfProductosQuery|\HbfVasosQuery|\HbfVentasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCiUsuarios findOne(ConnectionInterface $con = null) Return the first ChildCiUsuarios matching the query
 * @method     ChildCiUsuarios findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCiUsuarios matching the query, or a new ChildCiUsuarios object populated from the query conditions when no match is found
 *
 * @method     ChildCiUsuarios findOneByIdUsuario(int $id_usuario) Return the first ChildCiUsuarios filtered by the id_usuario column
 * @method     ChildCiUsuarios findOneByNombre(string $nombre) Return the first ChildCiUsuarios filtered by the nombre column
 * @method     ChildCiUsuarios findOneByApellido(string $apellido) Return the first ChildCiUsuarios filtered by the apellido column
 * @method     ChildCiUsuarios findOneByUsername(string $username) Return the first ChildCiUsuarios filtered by the username column
 * @method     ChildCiUsuarios findOneByEmail(string $email) Return the first ChildCiUsuarios filtered by the email column
 * @method     ChildCiUsuarios findOneByPassword(string $password) Return the first ChildCiUsuarios filtered by the password column
 * @method     ChildCiUsuarios findOneByFecNacimiento(string $fec_nacimiento) Return the first ChildCiUsuarios filtered by the fec_nacimiento column
 * @method     ChildCiUsuarios findOneBySexo(string $sexo) Return the first ChildCiUsuarios filtered by the sexo column
 * @method     ChildCiUsuarios findOneByInvitadoPor(int $invitado_por) Return the first ChildCiUsuarios filtered by the invitado_por column
 * @method     ChildCiUsuarios findOneByPhoneNumber1(string $phone_number_1) Return the first ChildCiUsuarios filtered by the phone_number_1 column
 * @method     ChildCiUsuarios findOneByPhoneNumber2(string $phone_number_2) Return the first ChildCiUsuarios filtered by the phone_number_2 column
 * @method     ChildCiUsuarios findOneByCellphoneNumber1(string $cellphone_number_1) Return the first ChildCiUsuarios filtered by the cellphone_number_1 column
 * @method     ChildCiUsuarios findOneByCellphoneNumber2(string $cellphone_number_2) Return the first ChildCiUsuarios filtered by the cellphone_number_2 column
 * @method     ChildCiUsuarios findOneByCodAcceso(string $cod_acceso) Return the first ChildCiUsuarios filtered by the cod_acceso column
 * @method     ChildCiUsuarios findOneByIdOptionTipoAsociado(int $id_option_tipo_asociado) Return the first ChildCiUsuarios filtered by the id_option_tipo_asociado column
 * @method     ChildCiUsuarios findOneByIdOptionNivelAsociado(int $id_option_nivel_asociado) Return the first ChildCiUsuarios filtered by the id_option_nivel_asociado column
 * @method     ChildCiUsuarios findOneByIdClub(int $id_club) Return the first ChildCiUsuarios filtered by the id_club column
 * @method     ChildCiUsuarios findOneByIdTurno(int $id_turno) Return the first ChildCiUsuarios filtered by the id_turno column
 * @method     ChildCiUsuarios findOneByIdSesion(int $id_sesion) Return the first ChildCiUsuarios filtered by the id_sesion column
 * @method     ChildCiUsuarios findOneByIdOpcionRole(int $id_opcion_role) Return the first ChildCiUsuarios filtered by the id_opcion_role column
 * @method     ChildCiUsuarios findOneByFotoPerfil(int $foto_perfil) Return the first ChildCiUsuarios filtered by the foto_perfil column
 * @method     ChildCiUsuarios findOneByAppMonitor(string $app_monitor) Return the first ChildCiUsuarios filtered by the app_monitor column
 * @method     ChildCiUsuarios findOneByAppOrders(string $app_orders) Return the first ChildCiUsuarios filtered by the app_orders column
 * @method     ChildCiUsuarios findOneByAppAdmin(string $app_admin) Return the first ChildCiUsuarios filtered by the app_admin column
 * @method     ChildCiUsuarios findOneByChangeCount(int $change_count) Return the first ChildCiUsuarios filtered by the change_count column
 * @method     ChildCiUsuarios findOneByHerbalifeKey(string $herbalife_key) Return the first ChildCiUsuarios filtered by the herbalife_key column
 * @method     ChildCiUsuarios findOneByIdTipoUsuario(int $id_tipo_usuario) Return the first ChildCiUsuarios filtered by the id_tipo_usuario column
 * @method     ChildCiUsuarios findOneByEstado(string $estado) Return the first ChildCiUsuarios filtered by the estado column
 * @method     ChildCiUsuarios findOneByDateModified(string $date_modified) Return the first ChildCiUsuarios filtered by the date_modified column
 * @method     ChildCiUsuarios findOneByDateCreated(string $date_created) Return the first ChildCiUsuarios filtered by the date_created column *

 * @method     ChildCiUsuarios requirePk($key, ConnectionInterface $con = null) Return the ChildCiUsuarios by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOne(ConnectionInterface $con = null) Return the first ChildCiUsuarios matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiUsuarios requireOneByIdUsuario(int $id_usuario) Return the first ChildCiUsuarios filtered by the id_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByNombre(string $nombre) Return the first ChildCiUsuarios filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByApellido(string $apellido) Return the first ChildCiUsuarios filtered by the apellido column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByUsername(string $username) Return the first ChildCiUsuarios filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByEmail(string $email) Return the first ChildCiUsuarios filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByPassword(string $password) Return the first ChildCiUsuarios filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByFecNacimiento(string $fec_nacimiento) Return the first ChildCiUsuarios filtered by the fec_nacimiento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneBySexo(string $sexo) Return the first ChildCiUsuarios filtered by the sexo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByInvitadoPor(int $invitado_por) Return the first ChildCiUsuarios filtered by the invitado_por column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByPhoneNumber1(string $phone_number_1) Return the first ChildCiUsuarios filtered by the phone_number_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByPhoneNumber2(string $phone_number_2) Return the first ChildCiUsuarios filtered by the phone_number_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByCellphoneNumber1(string $cellphone_number_1) Return the first ChildCiUsuarios filtered by the cellphone_number_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByCellphoneNumber2(string $cellphone_number_2) Return the first ChildCiUsuarios filtered by the cellphone_number_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByCodAcceso(string $cod_acceso) Return the first ChildCiUsuarios filtered by the cod_acceso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdOptionTipoAsociado(int $id_option_tipo_asociado) Return the first ChildCiUsuarios filtered by the id_option_tipo_asociado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdOptionNivelAsociado(int $id_option_nivel_asociado) Return the first ChildCiUsuarios filtered by the id_option_nivel_asociado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdClub(int $id_club) Return the first ChildCiUsuarios filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdTurno(int $id_turno) Return the first ChildCiUsuarios filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdSesion(int $id_sesion) Return the first ChildCiUsuarios filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdOpcionRole(int $id_opcion_role) Return the first ChildCiUsuarios filtered by the id_opcion_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByFotoPerfil(int $foto_perfil) Return the first ChildCiUsuarios filtered by the foto_perfil column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByAppMonitor(string $app_monitor) Return the first ChildCiUsuarios filtered by the app_monitor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByAppOrders(string $app_orders) Return the first ChildCiUsuarios filtered by the app_orders column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByAppAdmin(string $app_admin) Return the first ChildCiUsuarios filtered by the app_admin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByChangeCount(int $change_count) Return the first ChildCiUsuarios filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByHerbalifeKey(string $herbalife_key) Return the first ChildCiUsuarios filtered by the herbalife_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByIdTipoUsuario(int $id_tipo_usuario) Return the first ChildCiUsuarios filtered by the id_tipo_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByEstado(string $estado) Return the first ChildCiUsuarios filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByDateModified(string $date_modified) Return the first ChildCiUsuarios filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiUsuarios requireOneByDateCreated(string $date_created) Return the first ChildCiUsuarios filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiUsuarios[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCiUsuarios objects based on current ModelCriteria
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdUsuario(int $id_usuario) Return ChildCiUsuarios objects filtered by the id_usuario column
 * @method     ChildCiUsuarios[]|ObjectCollection findByNombre(string $nombre) Return ChildCiUsuarios objects filtered by the nombre column
 * @method     ChildCiUsuarios[]|ObjectCollection findByApellido(string $apellido) Return ChildCiUsuarios objects filtered by the apellido column
 * @method     ChildCiUsuarios[]|ObjectCollection findByUsername(string $username) Return ChildCiUsuarios objects filtered by the username column
 * @method     ChildCiUsuarios[]|ObjectCollection findByEmail(string $email) Return ChildCiUsuarios objects filtered by the email column
 * @method     ChildCiUsuarios[]|ObjectCollection findByPassword(string $password) Return ChildCiUsuarios objects filtered by the password column
 * @method     ChildCiUsuarios[]|ObjectCollection findByFecNacimiento(string $fec_nacimiento) Return ChildCiUsuarios objects filtered by the fec_nacimiento column
 * @method     ChildCiUsuarios[]|ObjectCollection findBySexo(string $sexo) Return ChildCiUsuarios objects filtered by the sexo column
 * @method     ChildCiUsuarios[]|ObjectCollection findByInvitadoPor(int $invitado_por) Return ChildCiUsuarios objects filtered by the invitado_por column
 * @method     ChildCiUsuarios[]|ObjectCollection findByPhoneNumber1(string $phone_number_1) Return ChildCiUsuarios objects filtered by the phone_number_1 column
 * @method     ChildCiUsuarios[]|ObjectCollection findByPhoneNumber2(string $phone_number_2) Return ChildCiUsuarios objects filtered by the phone_number_2 column
 * @method     ChildCiUsuarios[]|ObjectCollection findByCellphoneNumber1(string $cellphone_number_1) Return ChildCiUsuarios objects filtered by the cellphone_number_1 column
 * @method     ChildCiUsuarios[]|ObjectCollection findByCellphoneNumber2(string $cellphone_number_2) Return ChildCiUsuarios objects filtered by the cellphone_number_2 column
 * @method     ChildCiUsuarios[]|ObjectCollection findByCodAcceso(string $cod_acceso) Return ChildCiUsuarios objects filtered by the cod_acceso column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdOptionTipoAsociado(int $id_option_tipo_asociado) Return ChildCiUsuarios objects filtered by the id_option_tipo_asociado column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdOptionNivelAsociado(int $id_option_nivel_asociado) Return ChildCiUsuarios objects filtered by the id_option_nivel_asociado column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdClub(int $id_club) Return ChildCiUsuarios objects filtered by the id_club column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildCiUsuarios objects filtered by the id_turno column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildCiUsuarios objects filtered by the id_sesion column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdOpcionRole(int $id_opcion_role) Return ChildCiUsuarios objects filtered by the id_opcion_role column
 * @method     ChildCiUsuarios[]|ObjectCollection findByFotoPerfil(int $foto_perfil) Return ChildCiUsuarios objects filtered by the foto_perfil column
 * @method     ChildCiUsuarios[]|ObjectCollection findByAppMonitor(string $app_monitor) Return ChildCiUsuarios objects filtered by the app_monitor column
 * @method     ChildCiUsuarios[]|ObjectCollection findByAppOrders(string $app_orders) Return ChildCiUsuarios objects filtered by the app_orders column
 * @method     ChildCiUsuarios[]|ObjectCollection findByAppAdmin(string $app_admin) Return ChildCiUsuarios objects filtered by the app_admin column
 * @method     ChildCiUsuarios[]|ObjectCollection findByChangeCount(int $change_count) Return ChildCiUsuarios objects filtered by the change_count column
 * @method     ChildCiUsuarios[]|ObjectCollection findByHerbalifeKey(string $herbalife_key) Return ChildCiUsuarios objects filtered by the herbalife_key column
 * @method     ChildCiUsuarios[]|ObjectCollection findByIdTipoUsuario(int $id_tipo_usuario) Return ChildCiUsuarios objects filtered by the id_tipo_usuario column
 * @method     ChildCiUsuarios[]|ObjectCollection findByEstado(string $estado) Return ChildCiUsuarios objects filtered by the estado column
 * @method     ChildCiUsuarios[]|ObjectCollection findByDateModified(string $date_modified) Return ChildCiUsuarios objects filtered by the date_modified column
 * @method     ChildCiUsuarios[]|ObjectCollection findByDateCreated(string $date_created) Return ChildCiUsuarios objects filtered by the date_created column
 * @method     ChildCiUsuarios[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiUsuariosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CiUsuariosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\CiUsuarios', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiUsuariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiUsuariosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCiUsuariosQuery) {
            return $criteria;
        }
        $query = new ChildCiUsuariosQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCiUsuarios|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiUsuariosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuarios A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_usuario, nombre, apellido, username, email, password, fec_nacimiento, sexo, invitado_por, phone_number_1, phone_number_2, cellphone_number_1, cellphone_number_2, cod_acceso, id_option_tipo_asociado, id_option_nivel_asociado, id_club, id_turno, id_sesion, id_opcion_role, foto_perfil, app_monitor, app_orders, app_admin, change_count, herbalife_key, id_tipo_usuario, estado, date_modified, date_created FROM ci_usuarios WHERE id_usuario = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCiUsuarios $obj */
            $obj = new ChildCiUsuarios();
            $obj->hydrate($row);
            CiUsuariosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCiUsuarios|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUsuario(1234); // WHERE id_usuario = 1234
     * $query->filterByIdUsuario(array(12, 34)); // WHERE id_usuario IN (12, 34)
     * $query->filterByIdUsuario(array('min' => 12)); // WHERE id_usuario > 12
     * </code>
     *
     * @param     mixed $idUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdUsuario($idUsuario = null, $comparison = null)
    {
        if (is_array($idUsuario)) {
            $useMinMax = false;
            if (isset($idUsuario['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $idUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUsuario['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $idUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $idUsuario, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the apellido column
     *
     * Example usage:
     * <code>
     * $query->filterByApellido('fooValue');   // WHERE apellido = 'fooValue'
     * $query->filterByApellido('%fooValue%', Criteria::LIKE); // WHERE apellido LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apellido The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByApellido($apellido = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellido)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_APELLIDO, $apellido, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the fec_nacimiento column
     *
     * Example usage:
     * <code>
     * $query->filterByFecNacimiento('2011-03-14'); // WHERE fec_nacimiento = '2011-03-14'
     * $query->filterByFecNacimiento('now'); // WHERE fec_nacimiento = '2011-03-14'
     * $query->filterByFecNacimiento(array('max' => 'yesterday')); // WHERE fec_nacimiento > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecNacimiento The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByFecNacimiento($fecNacimiento = null, $comparison = null)
    {
        if (is_array($fecNacimiento)) {
            $useMinMax = false;
            if (isset($fecNacimiento['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_FEC_NACIMIENTO, $fecNacimiento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecNacimiento['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_FEC_NACIMIENTO, $fecNacimiento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_FEC_NACIMIENTO, $fecNacimiento, $comparison);
    }

    /**
     * Filter the query on the sexo column
     *
     * Example usage:
     * <code>
     * $query->filterBySexo('fooValue');   // WHERE sexo = 'fooValue'
     * $query->filterBySexo('%fooValue%', Criteria::LIKE); // WHERE sexo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sexo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterBySexo($sexo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sexo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_SEXO, $sexo, $comparison);
    }

    /**
     * Filter the query on the invitado_por column
     *
     * Example usage:
     * <code>
     * $query->filterByInvitadoPor(1234); // WHERE invitado_por = 1234
     * $query->filterByInvitadoPor(array(12, 34)); // WHERE invitado_por IN (12, 34)
     * $query->filterByInvitadoPor(array('min' => 12)); // WHERE invitado_por > 12
     * </code>
     *
     * @see       filterByCiUsuariosRelatedByInvitadoPor()
     *
     * @param     mixed $invitadoPor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByInvitadoPor($invitadoPor = null, $comparison = null)
    {
        if (is_array($invitadoPor)) {
            $useMinMax = false;
            if (isset($invitadoPor['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_INVITADO_POR, $invitadoPor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($invitadoPor['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_INVITADO_POR, $invitadoPor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_INVITADO_POR, $invitadoPor, $comparison);
    }

    /**
     * Filter the query on the phone_number_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNumber1('fooValue');   // WHERE phone_number_1 = 'fooValue'
     * $query->filterByPhoneNumber1('%fooValue%', Criteria::LIKE); // WHERE phone_number_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneNumber1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByPhoneNumber1($phoneNumber1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneNumber1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_PHONE_NUMBER_1, $phoneNumber1, $comparison);
    }

    /**
     * Filter the query on the phone_number_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNumber2('fooValue');   // WHERE phone_number_2 = 'fooValue'
     * $query->filterByPhoneNumber2('%fooValue%', Criteria::LIKE); // WHERE phone_number_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneNumber2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByPhoneNumber2($phoneNumber2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneNumber2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_PHONE_NUMBER_2, $phoneNumber2, $comparison);
    }

    /**
     * Filter the query on the cellphone_number_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphoneNumber1('fooValue');   // WHERE cellphone_number_1 = 'fooValue'
     * $query->filterByCellphoneNumber1('%fooValue%', Criteria::LIKE); // WHERE cellphone_number_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphoneNumber1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCellphoneNumber1($cellphoneNumber1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphoneNumber1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_1, $cellphoneNumber1, $comparison);
    }

    /**
     * Filter the query on the cellphone_number_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphoneNumber2('fooValue');   // WHERE cellphone_number_2 = 'fooValue'
     * $query->filterByCellphoneNumber2('%fooValue%', Criteria::LIKE); // WHERE cellphone_number_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphoneNumber2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCellphoneNumber2($cellphoneNumber2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphoneNumber2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_CELLPHONE_NUMBER_2, $cellphoneNumber2, $comparison);
    }

    /**
     * Filter the query on the cod_acceso column
     *
     * Example usage:
     * <code>
     * $query->filterByCodAcceso('fooValue');   // WHERE cod_acceso = 'fooValue'
     * $query->filterByCodAcceso('%fooValue%', Criteria::LIKE); // WHERE cod_acceso LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codAcceso The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCodAcceso($codAcceso = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codAcceso)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_COD_ACCESO, $codAcceso, $comparison);
    }

    /**
     * Filter the query on the id_option_tipo_asociado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOptionTipoAsociado(1234); // WHERE id_option_tipo_asociado = 1234
     * $query->filterByIdOptionTipoAsociado(array(12, 34)); // WHERE id_option_tipo_asociado IN (12, 34)
     * $query->filterByIdOptionTipoAsociado(array('min' => 12)); // WHERE id_option_tipo_asociado > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOptionTipoAsociado()
     *
     * @param     mixed $idOptionTipoAsociado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdOptionTipoAsociado($idOptionTipoAsociado = null, $comparison = null)
    {
        if (is_array($idOptionTipoAsociado)) {
            $useMinMax = false;
            if (isset($idOptionTipoAsociado['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $idOptionTipoAsociado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOptionTipoAsociado['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $idOptionTipoAsociado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $idOptionTipoAsociado, $comparison);
    }

    /**
     * Filter the query on the id_option_nivel_asociado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOptionNivelAsociado(1234); // WHERE id_option_nivel_asociado = 1234
     * $query->filterByIdOptionNivelAsociado(array(12, 34)); // WHERE id_option_nivel_asociado IN (12, 34)
     * $query->filterByIdOptionNivelAsociado(array('min' => 12)); // WHERE id_option_nivel_asociado > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOptionNivelAsociado()
     *
     * @param     mixed $idOptionNivelAsociado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdOptionNivelAsociado($idOptionNivelAsociado = null, $comparison = null)
    {
        if (is_array($idOptionNivelAsociado)) {
            $useMinMax = false;
            if (isset($idOptionNivelAsociado['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $idOptionNivelAsociado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOptionNivelAsociado['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $idOptionNivelAsociado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $idOptionNivelAsociado, $comparison);
    }

    /**
     * Filter the query on the id_club column
     *
     * Example usage:
     * <code>
     * $query->filterByIdClub(1234); // WHERE id_club = 1234
     * $query->filterByIdClub(array(12, 34)); // WHERE id_club IN (12, 34)
     * $query->filterByIdClub(array('min' => 12)); // WHERE id_club > 12
     * </code>
     *
     * @see       filterByHbfClubsRelatedByIdClub()
     *
     * @param     mixed $idClub The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_CLUB, $idClub, $comparison);
    }

    /**
     * Filter the query on the id_turno column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTurno(1234); // WHERE id_turno = 1234
     * $query->filterByIdTurno(array(12, 34)); // WHERE id_turno IN (12, 34)
     * $query->filterByIdTurno(array('min' => 12)); // WHERE id_turno > 12
     * </code>
     *
     * @see       filterByHbfTurnosRelatedByIdTurno()
     *
     * @param     mixed $idTurno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TURNO, $idTurno, $comparison);
    }

    /**
     * Filter the query on the id_sesion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSesion(1234); // WHERE id_sesion = 1234
     * $query->filterByIdSesion(array(12, 34)); // WHERE id_sesion IN (12, 34)
     * $query->filterByIdSesion(array('min' => 12)); // WHERE id_sesion > 12
     * </code>
     *
     * @see       filterByHbfSesionesRelatedByIdSesion()
     *
     * @param     mixed $idSesion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_SESION, $idSesion, $comparison);
    }

    /**
     * Filter the query on the id_opcion_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionRole(1234); // WHERE id_opcion_role = 1234
     * $query->filterByIdOpcionRole(array(12, 34)); // WHERE id_opcion_role IN (12, 34)
     * $query->filterByIdOpcionRole(array('min' => 12)); // WHERE id_opcion_role > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOpcionRole()
     *
     * @param     mixed $idOpcionRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdOpcionRole($idOpcionRole = null, $comparison = null)
    {
        if (is_array($idOpcionRole)) {
            $useMinMax = false;
            if (isset($idOpcionRole['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $idOpcionRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionRole['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $idOpcionRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $idOpcionRole, $comparison);
    }

    /**
     * Filter the query on the foto_perfil column
     *
     * Example usage:
     * <code>
     * $query->filterByFotoPerfil(1234); // WHERE foto_perfil = 1234
     * $query->filterByFotoPerfil(array(12, 34)); // WHERE foto_perfil IN (12, 34)
     * $query->filterByFotoPerfil(array('min' => 12)); // WHERE foto_perfil > 12
     * </code>
     *
     * @param     mixed $fotoPerfil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByFotoPerfil($fotoPerfil = null, $comparison = null)
    {
        if (is_array($fotoPerfil)) {
            $useMinMax = false;
            if (isset($fotoPerfil['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_FOTO_PERFIL, $fotoPerfil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fotoPerfil['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_FOTO_PERFIL, $fotoPerfil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_FOTO_PERFIL, $fotoPerfil, $comparison);
    }

    /**
     * Filter the query on the app_monitor column
     *
     * Example usage:
     * <code>
     * $query->filterByAppMonitor('fooValue');   // WHERE app_monitor = 'fooValue'
     * $query->filterByAppMonitor('%fooValue%', Criteria::LIKE); // WHERE app_monitor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appMonitor The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByAppMonitor($appMonitor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appMonitor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_APP_MONITOR, $appMonitor, $comparison);
    }

    /**
     * Filter the query on the app_orders column
     *
     * Example usage:
     * <code>
     * $query->filterByAppOrders('fooValue');   // WHERE app_orders = 'fooValue'
     * $query->filterByAppOrders('%fooValue%', Criteria::LIKE); // WHERE app_orders LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appOrders The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByAppOrders($appOrders = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appOrders)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_APP_ORDERS, $appOrders, $comparison);
    }

    /**
     * Filter the query on the app_admin column
     *
     * Example usage:
     * <code>
     * $query->filterByAppAdmin('fooValue');   // WHERE app_admin = 'fooValue'
     * $query->filterByAppAdmin('%fooValue%', Criteria::LIKE); // WHERE app_admin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appAdmin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByAppAdmin($appAdmin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appAdmin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_APP_ADMIN, $appAdmin, $comparison);
    }

    /**
     * Filter the query on the change_count column
     *
     * Example usage:
     * <code>
     * $query->filterByChangeCount(1234); // WHERE change_count = 1234
     * $query->filterByChangeCount(array(12, 34)); // WHERE change_count IN (12, 34)
     * $query->filterByChangeCount(array('min' => 12)); // WHERE change_count > 12
     * </code>
     *
     * @param     mixed $changeCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
    }

    /**
     * Filter the query on the herbalife_key column
     *
     * Example usage:
     * <code>
     * $query->filterByHerbalifeKey('fooValue');   // WHERE herbalife_key = 'fooValue'
     * $query->filterByHerbalifeKey('%fooValue%', Criteria::LIKE); // WHERE herbalife_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $herbalifeKey The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHerbalifeKey($herbalifeKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($herbalifeKey)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_HERBALIFE_KEY, $herbalifeKey, $comparison);
    }

    /**
     * Filter the query on the id_tipo_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTipoUsuario(1234); // WHERE id_tipo_usuario = 1234
     * $query->filterByIdTipoUsuario(array(12, 34)); // WHERE id_tipo_usuario IN (12, 34)
     * $query->filterByIdTipoUsuario(array('min' => 12)); // WHERE id_tipo_usuario > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdTipoUsuario()
     *
     * @param     mixed $idTipoUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByIdTipoUsuario($idTipoUsuario = null, $comparison = null)
    {
        if (is_array($idTipoUsuario)) {
            $useMinMax = false;
            if (isset($idTipoUsuario['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $idTipoUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTipoUsuario['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $idTipoUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $idTipoUsuario, $comparison);
    }

    /**
     * Filter the query on the estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstado('fooValue');   // WHERE estado = 'fooValue'
     * $query->filterByEstado('%fooValue%', Criteria::LIKE); // WHERE estado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_ESTADO, $estado, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Filter the query on the date_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreated('2011-03-14'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated('now'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated(array('max' => 'yesterday')); // WHERE date_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiUsuariosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOptionTipoAsociado($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_TIPO_ASOCIADO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOptionTipoAsociado() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOptionTipoAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOptionTipoAsociado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOptionTipoAsociado');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOptionTipoAsociado relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOptionTipoAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOptionTipoAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOptionTipoAsociado', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOptionNivelAsociado($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPTION_NIVEL_ASOCIADO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOptionNivelAsociado() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOptionNivelAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOptionNivelAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOptionNivelAsociado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOptionNivelAsociado');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOptionNivelAsociado relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOptionNivelAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOptionNivelAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOptionNivelAsociado', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByInvitadoPor($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_INVITADO_POR, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_INVITADO_POR, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByInvitadoPor() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByInvitadoPor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByInvitadoPor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByInvitadoPor');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiUsuariosRelatedByInvitadoPor');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByInvitadoPor relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByInvitadoPorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByInvitadoPor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByInvitadoPor', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOpcionRole($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_OPCION_ROLE, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOpcionRole() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOpcionRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOpcionRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOpcionRole');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOpcionRole');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOpcionRole relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOpcionRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOpcionRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOpcionRole', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnosRelatedByIdTurno($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
        } else {
            throw new PropelException('filterByHbfTurnosRelatedByIdTurno() only accepts arguments of type \HbfTurnos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfTurnosRelatedByIdTurno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfTurnosRelatedByIdTurno($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfTurnosRelatedByIdTurno');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfTurnosRelatedByIdTurno');
        }

        return $this;
    }

    /**
     * Use the HbfTurnosRelatedByIdTurno relation HbfTurnos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfTurnosQuery A secondary query class using the current class as primary query
     */
    public function useHbfTurnosRelatedByIdTurnoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfTurnosRelatedByIdTurno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnosRelatedByIdTurno', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfSesionesRelatedByIdSesion($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
        } else {
            throw new PropelException('filterByHbfSesionesRelatedByIdSesion() only accepts arguments of type \HbfSesiones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfSesionesRelatedByIdSesion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfSesionesRelatedByIdSesion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfSesionesRelatedByIdSesion');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfSesionesRelatedByIdSesion');
        }

        return $this;
    }

    /**
     * Use the HbfSesionesRelatedByIdSesion relation HbfSesiones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfSesionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfSesionesRelatedByIdSesionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfSesionesRelatedByIdSesion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesionesRelatedByIdSesion', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdTipoUsuario($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_TIPO_USUARIO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdTipoUsuario() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdTipoUsuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdTipoUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdTipoUsuario');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdTipoUsuario');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdTipoUsuario relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdTipoUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdTipoUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdTipoUsuario', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfClubsRelatedByIdClub($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
        } else {
            throw new PropelException('filterByHbfClubsRelatedByIdClub() only accepts arguments of type \HbfClubs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfClubsRelatedByIdClub relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfClubsRelatedByIdClub($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfClubsRelatedByIdClub');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfClubsRelatedByIdClub');
        }

        return $this;
    }

    /**
     * Use the HbfClubsRelatedByIdClub relation HbfClubs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfClubsQuery A secondary query class using the current class as primary query
     */
    public function useHbfClubsRelatedByIdClubQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfClubsRelatedByIdClub($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfClubsRelatedByIdClub', '\HbfClubsQuery');
    }

    /**
     * Filter the query by a related \CiModulos object
     *
     * @param \CiModulos|ObjectCollection $ciModulos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiModulosRelatedByIdUserCreated($ciModulos, $comparison = null)
    {
        if ($ciModulos instanceof \CiModulos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciModulos->getIdUserCreated(), $comparison);
        } elseif ($ciModulos instanceof ObjectCollection) {
            return $this
                ->useCiModulosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($ciModulos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiModulosRelatedByIdUserCreated() only accepts arguments of type \CiModulos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiModulosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiModulosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiModulosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiModulosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the CiModulosRelatedByIdUserCreated relation CiModulos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiModulosQuery A secondary query class using the current class as primary query
     */
    public function useCiModulosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiModulosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiModulosRelatedByIdUserCreated', '\CiModulosQuery');
    }

    /**
     * Filter the query by a related \CiModulos object
     *
     * @param \CiModulos|ObjectCollection $ciModulos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiModulosRelatedByIdUserModified($ciModulos, $comparison = null)
    {
        if ($ciModulos instanceof \CiModulos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciModulos->getIdUserModified(), $comparison);
        } elseif ($ciModulos instanceof ObjectCollection) {
            return $this
                ->useCiModulosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($ciModulos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiModulosRelatedByIdUserModified() only accepts arguments of type \CiModulos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiModulosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiModulosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiModulosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiModulosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the CiModulosRelatedByIdUserModified relation CiModulos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiModulosQuery A secondary query class using the current class as primary query
     */
    public function useCiModulosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiModulosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiModulosRelatedByIdUserModified', '\CiModulosQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdUserCreated($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciOptions->getIdUserCreated(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            return $this
                ->useCiOptionsRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($ciOptions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdUserCreated() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdUserCreated relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdUserCreated', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdUserModified($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciOptions->getIdUserModified(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            return $this
                ->useCiOptionsRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($ciOptions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdUserModified() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiOptionsRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdUserModified relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdUserModified', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiSessions object
     *
     * @param \CiSessions|ObjectCollection $ciSessions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiSessions($ciSessions, $comparison = null)
    {
        if ($ciSessions instanceof \CiSessions) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciSessions->getIdUsuario(), $comparison);
        } elseif ($ciSessions instanceof ObjectCollection) {
            return $this
                ->useCiSessionsQuery()
                ->filterByPrimaryKeys($ciSessions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiSessions() only accepts arguments of type \CiSessions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiSessions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiSessions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiSessions');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiSessions');
        }

        return $this;
    }

    /**
     * Use the CiSessions relation CiSessions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiSessionsQuery A secondary query class using the current class as primary query
     */
    public function useCiSessionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiSessions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiSessions', '\CiSessionsQuery');
    }

    /**
     * Filter the query by a related \CiSettings object
     *
     * @param \CiSettings|ObjectCollection $ciSettings the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiSettingsRelatedByIdUserCreated($ciSettings, $comparison = null)
    {
        if ($ciSettings instanceof \CiSettings) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciSettings->getIdUserCreated(), $comparison);
        } elseif ($ciSettings instanceof ObjectCollection) {
            return $this
                ->useCiSettingsRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($ciSettings->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiSettingsRelatedByIdUserCreated() only accepts arguments of type \CiSettings or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiSettingsRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiSettingsRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiSettingsRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiSettingsRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the CiSettingsRelatedByIdUserCreated relation CiSettings object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiSettingsQuery A secondary query class using the current class as primary query
     */
    public function useCiSettingsRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiSettingsRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiSettingsRelatedByIdUserCreated', '\CiSettingsQuery');
    }

    /**
     * Filter the query by a related \CiSettings object
     *
     * @param \CiSettings|ObjectCollection $ciSettings the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiSettingsRelatedByIdUserModified($ciSettings, $comparison = null)
    {
        if ($ciSettings instanceof \CiSettings) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciSettings->getIdUserModified(), $comparison);
        } elseif ($ciSettings instanceof ObjectCollection) {
            return $this
                ->useCiSettingsRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($ciSettings->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiSettingsRelatedByIdUserModified() only accepts arguments of type \CiSettings or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiSettingsRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiSettingsRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiSettingsRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiSettingsRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the CiSettingsRelatedByIdUserModified relation CiSettings object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiSettingsQuery A secondary query class using the current class as primary query
     */
    public function useCiSettingsRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiSettingsRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiSettingsRelatedByIdUserModified', '\CiSettingsQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUsuario($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciUsuarios->getInvitadoPor(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdUsuarioQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdUsuario() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdUsuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdUsuario');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdUsuario');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdUsuario relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdUsuario', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfClubsRelatedByIdUserCreated($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfClubs->getIdUserCreated(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            return $this
                ->useHbfClubsRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfClubs->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfClubsRelatedByIdUserCreated() only accepts arguments of type \HbfClubs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfClubsRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfClubsRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfClubsRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfClubsRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfClubsRelatedByIdUserCreated relation HbfClubs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfClubsQuery A secondary query class using the current class as primary query
     */
    public function useHbfClubsRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfClubsRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfClubsRelatedByIdUserCreated', '\HbfClubsQuery');
    }

    /**
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfClubsRelatedByIdUserModified($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfClubs->getIdUserModified(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            return $this
                ->useHbfClubsRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfClubs->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfClubsRelatedByIdUserModified() only accepts arguments of type \HbfClubs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfClubsRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfClubsRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfClubsRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfClubsRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfClubsRelatedByIdUserModified relation HbfClubs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfClubsQuery A secondary query class using the current class as primary query
     */
    public function useHbfClubsRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfClubsRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfClubsRelatedByIdUserModified', '\HbfClubsQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfComandasRelatedByIdUserCreated($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfComandas->getIdUserCreated(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            return $this
                ->useHbfComandasRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfComandas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfComandasRelatedByIdUserCreated() only accepts arguments of type \HbfComandas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfComandasRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfComandasRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfComandasRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfComandasRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfComandasRelatedByIdUserCreated relation HbfComandas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfComandasQuery A secondary query class using the current class as primary query
     */
    public function useHbfComandasRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfComandasRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandasRelatedByIdUserCreated', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfComandasRelatedByIdUserModified($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfComandas->getIdUserModified(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            return $this
                ->useHbfComandasRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfComandas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfComandasRelatedByIdUserModified() only accepts arguments of type \HbfComandas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfComandasRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfComandasRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfComandasRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfComandasRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfComandasRelatedByIdUserModified relation HbfComandas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfComandasQuery A secondary query class using the current class as primary query
     */
    public function useHbfComandasRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfComandasRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandasRelatedByIdUserModified', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfComandasRelatedByIdCliente($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfComandas->getIdCliente(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            return $this
                ->useHbfComandasRelatedByIdClienteQuery()
                ->filterByPrimaryKeys($hbfComandas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfComandasRelatedByIdCliente() only accepts arguments of type \HbfComandas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfComandasRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfComandasRelatedByIdCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfComandasRelatedByIdCliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfComandasRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the HbfComandasRelatedByIdCliente relation HbfComandas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfComandasQuery A secondary query class using the current class as primary query
     */
    public function useHbfComandasRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfComandasRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandasRelatedByIdCliente', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfDetallesPedidos object
     *
     * @param \HbfDetallesPedidos|ObjectCollection $hbfDetallesPedidos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfDetallesPedidosRelatedByIdUserCreated($hbfDetallesPedidos, $comparison = null)
    {
        if ($hbfDetallesPedidos instanceof \HbfDetallesPedidos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfDetallesPedidos->getIdUserCreated(), $comparison);
        } elseif ($hbfDetallesPedidos instanceof ObjectCollection) {
            return $this
                ->useHbfDetallesPedidosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfDetallesPedidos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfDetallesPedidosRelatedByIdUserCreated() only accepts arguments of type \HbfDetallesPedidos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfDetallesPedidosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfDetallesPedidosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfDetallesPedidosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfDetallesPedidosRelatedByIdUserCreated relation HbfDetallesPedidos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfDetallesPedidosQuery A secondary query class using the current class as primary query
     */
    public function useHbfDetallesPedidosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfDetallesPedidosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfDetallesPedidosRelatedByIdUserCreated', '\HbfDetallesPedidosQuery');
    }

    /**
     * Filter the query by a related \HbfDetallesPedidos object
     *
     * @param \HbfDetallesPedidos|ObjectCollection $hbfDetallesPedidos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfDetallesPedidosRelatedByIdUserModified($hbfDetallesPedidos, $comparison = null)
    {
        if ($hbfDetallesPedidos instanceof \HbfDetallesPedidos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfDetallesPedidos->getIdUserModified(), $comparison);
        } elseif ($hbfDetallesPedidos instanceof ObjectCollection) {
            return $this
                ->useHbfDetallesPedidosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfDetallesPedidos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfDetallesPedidosRelatedByIdUserModified() only accepts arguments of type \HbfDetallesPedidos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfDetallesPedidosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfDetallesPedidosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfDetallesPedidosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfDetallesPedidosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfDetallesPedidosRelatedByIdUserModified relation HbfDetallesPedidos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfDetallesPedidosQuery A secondary query class using the current class as primary query
     */
    public function useHbfDetallesPedidosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfDetallesPedidosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfDetallesPedidosRelatedByIdUserModified', '\HbfDetallesPedidosQuery');
    }

    /**
     * Filter the query by a related \HbfEgresos object
     *
     * @param \HbfEgresos|ObjectCollection $hbfEgresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfEgresosRelatedByIdUserCreated($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfEgresos->getIdUserCreated(), $comparison);
        } elseif ($hbfEgresos instanceof ObjectCollection) {
            return $this
                ->useHbfEgresosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfEgresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfEgresosRelatedByIdUserCreated() only accepts arguments of type \HbfEgresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfEgresosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfEgresosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfEgresosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfEgresosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfEgresosRelatedByIdUserCreated relation HbfEgresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfEgresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfEgresosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfEgresosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfEgresosRelatedByIdUserCreated', '\HbfEgresosQuery');
    }

    /**
     * Filter the query by a related \HbfEgresos object
     *
     * @param \HbfEgresos|ObjectCollection $hbfEgresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfEgresosRelatedByIdUserModified($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfEgresos->getIdUserModified(), $comparison);
        } elseif ($hbfEgresos instanceof ObjectCollection) {
            return $this
                ->useHbfEgresosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfEgresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfEgresosRelatedByIdUserModified() only accepts arguments of type \HbfEgresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfEgresosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfEgresosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfEgresosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfEgresosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfEgresosRelatedByIdUserModified relation HbfEgresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfEgresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfEgresosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfEgresosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfEgresosRelatedByIdUserModified', '\HbfEgresosQuery');
    }

    /**
     * Filter the query by a related \HbfEgresos object
     *
     * @param \HbfEgresos|ObjectCollection $hbfEgresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfEgresosRelatedByIdCliente($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfEgresos->getIdCliente(), $comparison);
        } elseif ($hbfEgresos instanceof ObjectCollection) {
            return $this
                ->useHbfEgresosRelatedByIdClienteQuery()
                ->filterByPrimaryKeys($hbfEgresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfEgresosRelatedByIdCliente() only accepts arguments of type \HbfEgresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfEgresosRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfEgresosRelatedByIdCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfEgresosRelatedByIdCliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfEgresosRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the HbfEgresosRelatedByIdCliente relation HbfEgresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfEgresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfEgresosRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfEgresosRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfEgresosRelatedByIdCliente', '\HbfEgresosQuery');
    }

    /**
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfIngresosRelatedByIdUserCreated($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfIngresos->getIdUserCreated(), $comparison);
        } elseif ($hbfIngresos instanceof ObjectCollection) {
            return $this
                ->useHbfIngresosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfIngresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfIngresosRelatedByIdUserCreated() only accepts arguments of type \HbfIngresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfIngresosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfIngresosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfIngresosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfIngresosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfIngresosRelatedByIdUserCreated relation HbfIngresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfIngresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfIngresosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfIngresosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfIngresosRelatedByIdUserCreated', '\HbfIngresosQuery');
    }

    /**
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfIngresosRelatedByIdUserModified($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfIngresos->getIdUserModified(), $comparison);
        } elseif ($hbfIngresos instanceof ObjectCollection) {
            return $this
                ->useHbfIngresosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfIngresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfIngresosRelatedByIdUserModified() only accepts arguments of type \HbfIngresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfIngresosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfIngresosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfIngresosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfIngresosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfIngresosRelatedByIdUserModified relation HbfIngresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfIngresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfIngresosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfIngresosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfIngresosRelatedByIdUserModified', '\HbfIngresosQuery');
    }

    /**
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfIngresosRelatedByIdCliente($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfIngresos->getIdCliente(), $comparison);
        } elseif ($hbfIngresos instanceof ObjectCollection) {
            return $this
                ->useHbfIngresosRelatedByIdClienteQuery()
                ->filterByPrimaryKeys($hbfIngresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfIngresosRelatedByIdCliente() only accepts arguments of type \HbfIngresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfIngresosRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfIngresosRelatedByIdCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfIngresosRelatedByIdCliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfIngresosRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the HbfIngresosRelatedByIdCliente relation HbfIngresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfIngresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfIngresosRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfIngresosRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfIngresosRelatedByIdCliente', '\HbfIngresosQuery');
    }

    /**
     * Filter the query by a related \HbfPorciones object
     *
     * @param \HbfPorciones|ObjectCollection $hbfPorciones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfPorcionesRelatedByIdUserCreated($hbfPorciones, $comparison = null)
    {
        if ($hbfPorciones instanceof \HbfPorciones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfPorciones->getIdUserCreated(), $comparison);
        } elseif ($hbfPorciones instanceof ObjectCollection) {
            return $this
                ->useHbfPorcionesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfPorciones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPorcionesRelatedByIdUserCreated() only accepts arguments of type \HbfPorciones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPorcionesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfPorcionesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPorcionesRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfPorcionesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfPorcionesRelatedByIdUserCreated relation HbfPorciones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPorcionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfPorcionesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfPorcionesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPorcionesRelatedByIdUserCreated', '\HbfPorcionesQuery');
    }

    /**
     * Filter the query by a related \HbfPorciones object
     *
     * @param \HbfPorciones|ObjectCollection $hbfPorciones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfPorcionesRelatedByIdUserModified($hbfPorciones, $comparison = null)
    {
        if ($hbfPorciones instanceof \HbfPorciones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfPorciones->getIdUserModified(), $comparison);
        } elseif ($hbfPorciones instanceof ObjectCollection) {
            return $this
                ->useHbfPorcionesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfPorciones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPorcionesRelatedByIdUserModified() only accepts arguments of type \HbfPorciones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPorcionesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfPorcionesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPorcionesRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfPorcionesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfPorcionesRelatedByIdUserModified relation HbfPorciones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPorcionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfPorcionesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfPorcionesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPorcionesRelatedByIdUserModified', '\HbfPorcionesQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagosRelatedByIdCliente($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfPrepagos->getIdCliente(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            return $this
                ->useHbfPrepagosRelatedByIdClienteQuery()
                ->filterByPrimaryKeys($hbfPrepagos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPrepagosRelatedByIdCliente() only accepts arguments of type \HbfPrepagos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPrepagosRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfPrepagosRelatedByIdCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPrepagosRelatedByIdCliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfPrepagosRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the HbfPrepagosRelatedByIdCliente relation HbfPrepagos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPrepagosQuery A secondary query class using the current class as primary query
     */
    public function useHbfPrepagosRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfPrepagosRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPrepagosRelatedByIdCliente', '\HbfPrepagosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagosRelatedByIdUserCreated($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfPrepagos->getIdUserCreated(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            return $this
                ->useHbfPrepagosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfPrepagos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPrepagosRelatedByIdUserCreated() only accepts arguments of type \HbfPrepagos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPrepagosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfPrepagosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPrepagosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfPrepagosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfPrepagosRelatedByIdUserCreated relation HbfPrepagos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPrepagosQuery A secondary query class using the current class as primary query
     */
    public function useHbfPrepagosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfPrepagosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPrepagosRelatedByIdUserCreated', '\HbfPrepagosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagosRelatedByIdUserModified($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfPrepagos->getIdUserModified(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            return $this
                ->useHbfPrepagosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfPrepagos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPrepagosRelatedByIdUserModified() only accepts arguments of type \HbfPrepagos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPrepagosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfPrepagosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPrepagosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfPrepagosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfPrepagosRelatedByIdUserModified relation HbfPrepagos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPrepagosQuery A secondary query class using the current class as primary query
     */
    public function useHbfPrepagosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfPrepagosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPrepagosRelatedByIdUserModified', '\HbfPrepagosQuery');
    }

    /**
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdUserCreated($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfProductos->getIdUserCreated(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdUserCreated() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfProductosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdUserCreated relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdUserCreated', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdUserModified($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfProductos->getIdUserModified(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdUserModified() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfProductosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdUserModified relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdUserModified', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfSesionesRelatedByIdUserCreated($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfSesiones->getIdUserCreated(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            return $this
                ->useHbfSesionesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfSesiones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfSesionesRelatedByIdUserCreated() only accepts arguments of type \HbfSesiones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfSesionesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfSesionesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfSesionesRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfSesionesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfSesionesRelatedByIdUserCreated relation HbfSesiones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfSesionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfSesionesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfSesionesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesionesRelatedByIdUserCreated', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfSesionesRelatedByIdUserModified($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfSesiones->getIdUserModified(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            return $this
                ->useHbfSesionesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfSesiones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfSesionesRelatedByIdUserModified() only accepts arguments of type \HbfSesiones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfSesionesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfSesionesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfSesionesRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfSesionesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfSesionesRelatedByIdUserModified relation HbfSesiones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfSesionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfSesionesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfSesionesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesionesRelatedByIdUserModified', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfSesionesRelatedByIdAsociado($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfSesiones->getIdAsociado(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            return $this
                ->useHbfSesionesRelatedByIdAsociadoQuery()
                ->filterByPrimaryKeys($hbfSesiones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfSesionesRelatedByIdAsociado() only accepts arguments of type \HbfSesiones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfSesionesRelatedByIdAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfSesionesRelatedByIdAsociado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfSesionesRelatedByIdAsociado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfSesionesRelatedByIdAsociado');
        }

        return $this;
    }

    /**
     * Use the HbfSesionesRelatedByIdAsociado relation HbfSesiones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfSesionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfSesionesRelatedByIdAsociadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfSesionesRelatedByIdAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesionesRelatedByIdAsociado', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnosRelatedByIdUserCreated($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfTurnos->getIdUserCreated(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            return $this
                ->useHbfTurnosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfTurnos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfTurnosRelatedByIdUserCreated() only accepts arguments of type \HbfTurnos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfTurnosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfTurnosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfTurnosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfTurnosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfTurnosRelatedByIdUserCreated relation HbfTurnos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfTurnosQuery A secondary query class using the current class as primary query
     */
    public function useHbfTurnosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfTurnosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnosRelatedByIdUserCreated', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnosRelatedByIdUserModified($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfTurnos->getIdUserModified(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            return $this
                ->useHbfTurnosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfTurnos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfTurnosRelatedByIdUserModified() only accepts arguments of type \HbfTurnos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfTurnosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfTurnosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfTurnosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfTurnosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfTurnosRelatedByIdUserModified relation HbfTurnos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfTurnosQuery A secondary query class using the current class as primary query
     */
    public function useHbfTurnosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfTurnosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnosRelatedByIdUserModified', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnosRelatedByIdAsociado($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfTurnos->getIdAsociado(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            return $this
                ->useHbfTurnosRelatedByIdAsociadoQuery()
                ->filterByPrimaryKeys($hbfTurnos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfTurnosRelatedByIdAsociado() only accepts arguments of type \HbfTurnos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfTurnosRelatedByIdAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfTurnosRelatedByIdAsociado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfTurnosRelatedByIdAsociado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfTurnosRelatedByIdAsociado');
        }

        return $this;
    }

    /**
     * Use the HbfTurnosRelatedByIdAsociado relation HbfTurnos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfTurnosQuery A secondary query class using the current class as primary query
     */
    public function useHbfTurnosRelatedByIdAsociadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfTurnosRelatedByIdAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnosRelatedByIdAsociado', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfVasosRelatedByIdUserModified($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfVasos->getIdUserModified(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            return $this
                ->useHbfVasosRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfVasos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVasosRelatedByIdUserModified() only accepts arguments of type \HbfVasos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVasosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfVasosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVasosRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfVasosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfVasosRelatedByIdUserModified relation HbfVasos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVasosQuery A secondary query class using the current class as primary query
     */
    public function useHbfVasosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfVasosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVasosRelatedByIdUserModified', '\HbfVasosQuery');
    }

    /**
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfVasosRelatedByIdUserCreated($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfVasos->getIdUserCreated(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            return $this
                ->useHbfVasosRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfVasos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVasosRelatedByIdUserCreated() only accepts arguments of type \HbfVasos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVasosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfVasosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVasosRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfVasosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfVasosRelatedByIdUserCreated relation HbfVasos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVasosQuery A secondary query class using the current class as primary query
     */
    public function useHbfVasosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfVasosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVasosRelatedByIdUserCreated', '\HbfVasosQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfVentasRelatedByIdUserCreated($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfVentas->getIdUserCreated(), $comparison);
        } elseif ($hbfVentas instanceof ObjectCollection) {
            return $this
                ->useHbfVentasRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($hbfVentas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVentasRelatedByIdUserCreated() only accepts arguments of type \HbfVentas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVentasRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfVentasRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVentasRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfVentasRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the HbfVentasRelatedByIdUserCreated relation HbfVentas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVentasQuery A secondary query class using the current class as primary query
     */
    public function useHbfVentasRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfVentasRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVentasRelatedByIdUserCreated', '\HbfVentasQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfVentasRelatedByIdUserModified($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfVentas->getIdUserModified(), $comparison);
        } elseif ($hbfVentas instanceof ObjectCollection) {
            return $this
                ->useHbfVentasRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($hbfVentas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVentasRelatedByIdUserModified() only accepts arguments of type \HbfVentas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVentasRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfVentasRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVentasRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfVentasRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the HbfVentasRelatedByIdUserModified relation HbfVentas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVentasQuery A secondary query class using the current class as primary query
     */
    public function useHbfVentasRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfVentasRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVentasRelatedByIdUserModified', '\HbfVentasQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function filterByHbfVentasRelatedByIdCliente($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $hbfVentas->getIdCliente(), $comparison);
        } elseif ($hbfVentas instanceof ObjectCollection) {
            return $this
                ->useHbfVentasRelatedByIdClienteQuery()
                ->filterByPrimaryKeys($hbfVentas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVentasRelatedByIdCliente() only accepts arguments of type \HbfVentas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVentasRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function joinHbfVentasRelatedByIdCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVentasRelatedByIdCliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HbfVentasRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the HbfVentasRelatedByIdCliente relation HbfVentas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVentasQuery A secondary query class using the current class as primary query
     */
    public function useHbfVentasRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfVentasRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVentasRelatedByIdCliente', '\HbfVentasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCiUsuarios $ciUsuarios Object to remove from the list of results
     *
     * @return $this|ChildCiUsuariosQuery The current query, for fluid interface
     */
    public function prune($ciUsuarios = null)
    {
        if ($ciUsuarios) {
            $this->addUsingAlias(CiUsuariosTableMap::COL_ID_USUARIO, $ciUsuarios->getIdUsuario(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ci_usuarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiUsuariosTableMap::clearInstancePool();
            CiUsuariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiUsuariosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiUsuariosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiUsuariosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiUsuariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CiUsuariosQuery
