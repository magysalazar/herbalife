<?php

namespace Base;

use \CiOptions as ChildCiOptions;
use \CiOptionsQuery as ChildCiOptionsQuery;
use \Exception;
use \PDO;
use Map\CiOptionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ci_options' table.
 *
 *
 *
 * @method     ChildCiOptionsQuery orderByIdOption($order = Criteria::ASC) Order by the id_option column
 * @method     ChildCiOptionsQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildCiOptionsQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildCiOptionsQuery orderByIdSetting($order = Criteria::ASC) Order by the id_setting column
 * @method     ChildCiOptionsQuery orderByNivel($order = Criteria::ASC) Order by the nivel column
 * @method     ChildCiOptionsQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ChildCiOptionsQuery orderByNumFichas($order = Criteria::ASC) Order by the num_fichas column
 * @method     ChildCiOptionsQuery orderByIdModulo($order = Criteria::ASC) Order by the id_modulo column
 * @method     ChildCiOptionsQuery orderByEditTag($order = Criteria::ASC) Order by the edit_tag column
 * @method     ChildCiOptionsQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildCiOptionsQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildCiOptionsQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildCiOptionsQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildCiOptionsQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildCiOptionsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildCiOptionsQuery groupByIdOption() Group by the id_option column
 * @method     ChildCiOptionsQuery groupByNombre() Group by the nombre column
 * @method     ChildCiOptionsQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildCiOptionsQuery groupByIdSetting() Group by the id_setting column
 * @method     ChildCiOptionsQuery groupByNivel() Group by the nivel column
 * @method     ChildCiOptionsQuery groupByPrecio() Group by the precio column
 * @method     ChildCiOptionsQuery groupByNumFichas() Group by the num_fichas column
 * @method     ChildCiOptionsQuery groupByIdModulo() Group by the id_modulo column
 * @method     ChildCiOptionsQuery groupByEditTag() Group by the edit_tag column
 * @method     ChildCiOptionsQuery groupByEstado() Group by the estado column
 * @method     ChildCiOptionsQuery groupByChangeCount() Group by the change_count column
 * @method     ChildCiOptionsQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildCiOptionsQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildCiOptionsQuery groupByDateModified() Group by the date_modified column
 * @method     ChildCiOptionsQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildCiOptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiOptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiOptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiOptionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiOptionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiOptionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiSettings($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiSettings relation
 * @method     ChildCiOptionsQuery rightJoinCiSettings($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiSettings relation
 * @method     ChildCiOptionsQuery innerJoinCiSettings($relationAlias = null) Adds a INNER JOIN clause to the query using the CiSettings relation
 *
 * @method     ChildCiOptionsQuery joinWithCiSettings($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiSettings relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiSettings() Adds a LEFT JOIN clause and with to the query using the CiSettings relation
 * @method     ChildCiOptionsQuery rightJoinWithCiSettings() Adds a RIGHT JOIN clause and with to the query using the CiSettings relation
 * @method     ChildCiOptionsQuery innerJoinWithCiSettings() Adds a INNER JOIN clause and with to the query using the CiSettings relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiModulosRelatedByIdOpcionModulo($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiModulosRelatedByIdOpcionModulo relation
 * @method     ChildCiOptionsQuery rightJoinCiModulosRelatedByIdOpcionModulo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiModulosRelatedByIdOpcionModulo relation
 * @method     ChildCiOptionsQuery innerJoinCiModulosRelatedByIdOpcionModulo($relationAlias = null) Adds a INNER JOIN clause to the query using the CiModulosRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiOptionsQuery joinWithCiModulosRelatedByIdOpcionModulo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiModulosRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiModulosRelatedByIdOpcionModulo() Adds a LEFT JOIN clause and with to the query using the CiModulosRelatedByIdOpcionModulo relation
 * @method     ChildCiOptionsQuery rightJoinWithCiModulosRelatedByIdOpcionModulo() Adds a RIGHT JOIN clause and with to the query using the CiModulosRelatedByIdOpcionModulo relation
 * @method     ChildCiOptionsQuery innerJoinWithCiModulosRelatedByIdOpcionModulo() Adds a INNER JOIN clause and with to the query using the CiModulosRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiModulosRelatedByIdOpcionRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiModulosRelatedByIdOpcionRoles relation
 * @method     ChildCiOptionsQuery rightJoinCiModulosRelatedByIdOpcionRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiModulosRelatedByIdOpcionRoles relation
 * @method     ChildCiOptionsQuery innerJoinCiModulosRelatedByIdOpcionRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the CiModulosRelatedByIdOpcionRoles relation
 *
 * @method     ChildCiOptionsQuery joinWithCiModulosRelatedByIdOpcionRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiModulosRelatedByIdOpcionRoles relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiModulosRelatedByIdOpcionRoles() Adds a LEFT JOIN clause and with to the query using the CiModulosRelatedByIdOpcionRoles relation
 * @method     ChildCiOptionsQuery rightJoinWithCiModulosRelatedByIdOpcionRoles() Adds a RIGHT JOIN clause and with to the query using the CiModulosRelatedByIdOpcionRoles relation
 * @method     ChildCiOptionsQuery innerJoinWithCiModulosRelatedByIdOpcionRoles() Adds a INNER JOIN clause and with to the query using the CiModulosRelatedByIdOpcionRoles relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdOptionTipoAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdOptionNivelAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdOpcionRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOpcionRole relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdOpcionRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOpcionRole relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdOpcionRole($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOpcionRole relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdOpcionRole($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOpcionRole relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdOpcionRole() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOpcionRole relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdOpcionRole() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOpcionRole relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdOpcionRole() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOpcionRole relation
 *
 * @method     ChildCiOptionsQuery leftJoinCiUsuariosRelatedByIdTipoUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 * @method     ChildCiOptionsQuery rightJoinCiUsuariosRelatedByIdTipoUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 * @method     ChildCiOptionsQuery innerJoinCiUsuariosRelatedByIdTipoUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiOptionsQuery joinWithCiUsuariosRelatedByIdTipoUsuario($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithCiUsuariosRelatedByIdTipoUsuario() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 * @method     ChildCiOptionsQuery rightJoinWithCiUsuariosRelatedByIdTipoUsuario() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 * @method     ChildCiOptionsQuery innerJoinWithCiUsuariosRelatedByIdTipoUsuario() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdTipoUsuario relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildCiOptionsQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildCiOptionsQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildCiOptionsQuery rightJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildCiOptionsQuery innerJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfProductosRelatedByIdOptionCategoriaProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildCiOptionsQuery rightJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildCiOptionsQuery innerJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfProductosRelatedByIdOptionTipoProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildCiOptionsQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildCiOptionsQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildCiOptionsQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildCiOptionsQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildCiOptionsQuery leftJoinHbfVasos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasos relation
 * @method     ChildCiOptionsQuery rightJoinHbfVasos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasos relation
 * @method     ChildCiOptionsQuery innerJoinHbfVasos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasos relation
 *
 * @method     ChildCiOptionsQuery joinWithHbfVasos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasos relation
 *
 * @method     ChildCiOptionsQuery leftJoinWithHbfVasos() Adds a LEFT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildCiOptionsQuery rightJoinWithHbfVasos() Adds a RIGHT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildCiOptionsQuery innerJoinWithHbfVasos() Adds a INNER JOIN clause and with to the query using the HbfVasos relation
 *
 * @method     \CiUsuariosQuery|\CiSettingsQuery|\CiModulosQuery|\HbfPrepagosQuery|\HbfProductosQuery|\HbfSesionesQuery|\HbfTurnosQuery|\HbfVasosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCiOptions findOne(ConnectionInterface $con = null) Return the first ChildCiOptions matching the query
 * @method     ChildCiOptions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCiOptions matching the query, or a new ChildCiOptions object populated from the query conditions when no match is found
 *
 * @method     ChildCiOptions findOneByIdOption(int $id_option) Return the first ChildCiOptions filtered by the id_option column
 * @method     ChildCiOptions findOneByNombre(string $nombre) Return the first ChildCiOptions filtered by the nombre column
 * @method     ChildCiOptions findOneByDescripcion(string $descripcion) Return the first ChildCiOptions filtered by the descripcion column
 * @method     ChildCiOptions findOneByIdSetting(int $id_setting) Return the first ChildCiOptions filtered by the id_setting column
 * @method     ChildCiOptions findOneByNivel(string $nivel) Return the first ChildCiOptions filtered by the nivel column
 * @method     ChildCiOptions findOneByPrecio(string $precio) Return the first ChildCiOptions filtered by the precio column
 * @method     ChildCiOptions findOneByNumFichas(int $num_fichas) Return the first ChildCiOptions filtered by the num_fichas column
 * @method     ChildCiOptions findOneByIdModulo(int $id_modulo) Return the first ChildCiOptions filtered by the id_modulo column
 * @method     ChildCiOptions findOneByEditTag(string $edit_tag) Return the first ChildCiOptions filtered by the edit_tag column
 * @method     ChildCiOptions findOneByEstado(string $estado) Return the first ChildCiOptions filtered by the estado column
 * @method     ChildCiOptions findOneByChangeCount(int $change_count) Return the first ChildCiOptions filtered by the change_count column
 * @method     ChildCiOptions findOneByIdUserModified(int $id_user_modified) Return the first ChildCiOptions filtered by the id_user_modified column
 * @method     ChildCiOptions findOneByIdUserCreated(int $id_user_created) Return the first ChildCiOptions filtered by the id_user_created column
 * @method     ChildCiOptions findOneByDateModified(string $date_modified) Return the first ChildCiOptions filtered by the date_modified column
 * @method     ChildCiOptions findOneByDateCreated(string $date_created) Return the first ChildCiOptions filtered by the date_created column *

 * @method     ChildCiOptions requirePk($key, ConnectionInterface $con = null) Return the ChildCiOptions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOne(ConnectionInterface $con = null) Return the first ChildCiOptions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiOptions requireOneByIdOption(int $id_option) Return the first ChildCiOptions filtered by the id_option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByNombre(string $nombre) Return the first ChildCiOptions filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByDescripcion(string $descripcion) Return the first ChildCiOptions filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByIdSetting(int $id_setting) Return the first ChildCiOptions filtered by the id_setting column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByNivel(string $nivel) Return the first ChildCiOptions filtered by the nivel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByPrecio(string $precio) Return the first ChildCiOptions filtered by the precio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByNumFichas(int $num_fichas) Return the first ChildCiOptions filtered by the num_fichas column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByIdModulo(int $id_modulo) Return the first ChildCiOptions filtered by the id_modulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByEditTag(string $edit_tag) Return the first ChildCiOptions filtered by the edit_tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByEstado(string $estado) Return the first ChildCiOptions filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByChangeCount(int $change_count) Return the first ChildCiOptions filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByIdUserModified(int $id_user_modified) Return the first ChildCiOptions filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByIdUserCreated(int $id_user_created) Return the first ChildCiOptions filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByDateModified(string $date_modified) Return the first ChildCiOptions filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiOptions requireOneByDateCreated(string $date_created) Return the first ChildCiOptions filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiOptions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCiOptions objects based on current ModelCriteria
 * @method     ChildCiOptions[]|ObjectCollection findByIdOption(int $id_option) Return ChildCiOptions objects filtered by the id_option column
 * @method     ChildCiOptions[]|ObjectCollection findByNombre(string $nombre) Return ChildCiOptions objects filtered by the nombre column
 * @method     ChildCiOptions[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildCiOptions objects filtered by the descripcion column
 * @method     ChildCiOptions[]|ObjectCollection findByIdSetting(int $id_setting) Return ChildCiOptions objects filtered by the id_setting column
 * @method     ChildCiOptions[]|ObjectCollection findByNivel(string $nivel) Return ChildCiOptions objects filtered by the nivel column
 * @method     ChildCiOptions[]|ObjectCollection findByPrecio(string $precio) Return ChildCiOptions objects filtered by the precio column
 * @method     ChildCiOptions[]|ObjectCollection findByNumFichas(int $num_fichas) Return ChildCiOptions objects filtered by the num_fichas column
 * @method     ChildCiOptions[]|ObjectCollection findByIdModulo(int $id_modulo) Return ChildCiOptions objects filtered by the id_modulo column
 * @method     ChildCiOptions[]|ObjectCollection findByEditTag(string $edit_tag) Return ChildCiOptions objects filtered by the edit_tag column
 * @method     ChildCiOptions[]|ObjectCollection findByEstado(string $estado) Return ChildCiOptions objects filtered by the estado column
 * @method     ChildCiOptions[]|ObjectCollection findByChangeCount(int $change_count) Return ChildCiOptions objects filtered by the change_count column
 * @method     ChildCiOptions[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildCiOptions objects filtered by the id_user_modified column
 * @method     ChildCiOptions[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildCiOptions objects filtered by the id_user_created column
 * @method     ChildCiOptions[]|ObjectCollection findByDateModified(string $date_modified) Return ChildCiOptions objects filtered by the date_modified column
 * @method     ChildCiOptions[]|ObjectCollection findByDateCreated(string $date_created) Return ChildCiOptions objects filtered by the date_created column
 * @method     ChildCiOptions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiOptionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CiOptionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\CiOptions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiOptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiOptionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCiOptionsQuery) {
            return $criteria;
        }
        $query = new ChildCiOptionsQuery();
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
     * @return ChildCiOptions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiOptionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCiOptions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_option, nombre, descripcion, id_setting, nivel, precio, num_fichas, id_modulo, edit_tag, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM ci_options WHERE id_option = :p0';
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
            /** @var ChildCiOptions $obj */
            $obj = new ChildCiOptions();
            $obj->hydrate($row);
            CiOptionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCiOptions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOption(1234); // WHERE id_option = 1234
     * $query->filterByIdOption(array(12, 34)); // WHERE id_option IN (12, 34)
     * $query->filterByIdOption(array('min' => 12)); // WHERE id_option > 12
     * </code>
     *
     * @param     mixed $idOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByIdOption($idOption = null, $comparison = null)
    {
        if (is_array($idOption)) {
            $useMinMax = false;
            if (isset($idOption['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $idOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOption['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $idOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $idOption, $comparison);
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%', Criteria::LIKE); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the id_setting column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSetting(1234); // WHERE id_setting = 1234
     * $query->filterByIdSetting(array(12, 34)); // WHERE id_setting IN (12, 34)
     * $query->filterByIdSetting(array('min' => 12)); // WHERE id_setting > 12
     * </code>
     *
     * @see       filterByCiSettings()
     *
     * @param     mixed $idSetting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByIdSetting($idSetting = null, $comparison = null)
    {
        if (is_array($idSetting)) {
            $useMinMax = false;
            if (isset($idSetting['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_SETTING, $idSetting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSetting['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_SETTING, $idSetting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_SETTING, $idSetting, $comparison);
    }

    /**
     * Filter the query on the nivel column
     *
     * Example usage:
     * <code>
     * $query->filterByNivel('fooValue');   // WHERE nivel = 'fooValue'
     * $query->filterByNivel('%fooValue%', Criteria::LIKE); // WHERE nivel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nivel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByNivel($nivel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nivel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_NIVEL, $nivel, $comparison);
    }

    /**
     * Filter the query on the precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query on the num_fichas column
     *
     * Example usage:
     * <code>
     * $query->filterByNumFichas(1234); // WHERE num_fichas = 1234
     * $query->filterByNumFichas(array(12, 34)); // WHERE num_fichas IN (12, 34)
     * $query->filterByNumFichas(array('min' => 12)); // WHERE num_fichas > 12
     * </code>
     *
     * @param     mixed $numFichas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByNumFichas($numFichas = null, $comparison = null)
    {
        if (is_array($numFichas)) {
            $useMinMax = false;
            if (isset($numFichas['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_NUM_FICHAS, $numFichas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numFichas['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_NUM_FICHAS, $numFichas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_NUM_FICHAS, $numFichas, $comparison);
    }

    /**
     * Filter the query on the id_modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdModulo(1234); // WHERE id_modulo = 1234
     * $query->filterByIdModulo(array(12, 34)); // WHERE id_modulo IN (12, 34)
     * $query->filterByIdModulo(array('min' => 12)); // WHERE id_modulo > 12
     * </code>
     *
     * @param     mixed $idModulo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByIdModulo($idModulo = null, $comparison = null)
    {
        if (is_array($idModulo)) {
            $useMinMax = false;
            if (isset($idModulo['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_MODULO, $idModulo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModulo['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_MODULO, $idModulo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_MODULO, $idModulo, $comparison);
    }

    /**
     * Filter the query on the edit_tag column
     *
     * Example usage:
     * <code>
     * $query->filterByEditTag('fooValue');   // WHERE edit_tag = 'fooValue'
     * $query->filterByEditTag('%fooValue%', Criteria::LIKE); // WHERE edit_tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editTag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByEditTag($editTag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editTag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_EDIT_TAG, $editTag, $comparison);
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
    }

    /**
     * Filter the query on the id_user_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUserModified(1234); // WHERE id_user_modified = 1234
     * $query->filterByIdUserModified(array(12, 34)); // WHERE id_user_modified IN (12, 34)
     * $query->filterByIdUserModified(array('min' => 12)); // WHERE id_user_modified > 12
     * </code>
     *
     * @see       filterByCiUsuariosRelatedByIdUserModified()
     *
     * @param     mixed $idUserModified The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
    }

    /**
     * Filter the query on the id_user_created column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUserCreated(1234); // WHERE id_user_created = 1234
     * $query->filterByIdUserCreated(array(12, 34)); // WHERE id_user_created IN (12, 34)
     * $query->filterByIdUserCreated(array('min' => 12)); // WHERE id_user_created > 12
     * </code>
     *
     * @see       filterByCiUsuariosRelatedByIdUserCreated()
     *
     * @param     mixed $idUserCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(CiOptionsTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiOptionsTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdUserCreated() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdUserCreated relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdUserCreated', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdUserModified() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdUserModified relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdUserModified', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiSettings object
     *
     * @param \CiSettings|ObjectCollection $ciSettings The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiSettings($ciSettings, $comparison = null)
    {
        if ($ciSettings instanceof \CiSettings) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_SETTING, $ciSettings->getIdSetting(), $comparison);
        } elseif ($ciSettings instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_SETTING, $ciSettings->toKeyValue('PrimaryKey', 'IdSetting'), $comparison);
        } else {
            throw new PropelException('filterByCiSettings() only accepts arguments of type \CiSettings or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiSettings relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiSettings($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiSettings');

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
            $this->addJoinObject($join, 'CiSettings');
        }

        return $this;
    }

    /**
     * Use the CiSettings relation CiSettings object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiSettingsQuery A secondary query class using the current class as primary query
     */
    public function useCiSettingsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiSettings($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiSettings', '\CiSettingsQuery');
    }

    /**
     * Filter the query by a related \CiModulos object
     *
     * @param \CiModulos|ObjectCollection $ciModulos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiModulosRelatedByIdOpcionModulo($ciModulos, $comparison = null)
    {
        if ($ciModulos instanceof \CiModulos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciModulos->getIdOpcionModulo(), $comparison);
        } elseif ($ciModulos instanceof ObjectCollection) {
            return $this
                ->useCiModulosRelatedByIdOpcionModuloQuery()
                ->filterByPrimaryKeys($ciModulos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiModulosRelatedByIdOpcionModulo() only accepts arguments of type \CiModulos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiModulosRelatedByIdOpcionModulo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiModulosRelatedByIdOpcionModulo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiModulosRelatedByIdOpcionModulo');

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
            $this->addJoinObject($join, 'CiModulosRelatedByIdOpcionModulo');
        }

        return $this;
    }

    /**
     * Use the CiModulosRelatedByIdOpcionModulo relation CiModulos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiModulosQuery A secondary query class using the current class as primary query
     */
    public function useCiModulosRelatedByIdOpcionModuloQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiModulosRelatedByIdOpcionModulo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiModulosRelatedByIdOpcionModulo', '\CiModulosQuery');
    }

    /**
     * Filter the query by a related \CiModulos object
     *
     * @param \CiModulos|ObjectCollection $ciModulos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiModulosRelatedByIdOpcionRoles($ciModulos, $comparison = null)
    {
        if ($ciModulos instanceof \CiModulos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciModulos->getIdOpcionRoles(), $comparison);
        } elseif ($ciModulos instanceof ObjectCollection) {
            return $this
                ->useCiModulosRelatedByIdOpcionRolesQuery()
                ->filterByPrimaryKeys($ciModulos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiModulosRelatedByIdOpcionRoles() only accepts arguments of type \CiModulos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiModulosRelatedByIdOpcionRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiModulosRelatedByIdOpcionRoles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiModulosRelatedByIdOpcionRoles');

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
            $this->addJoinObject($join, 'CiModulosRelatedByIdOpcionRoles');
        }

        return $this;
    }

    /**
     * Use the CiModulosRelatedByIdOpcionRoles relation CiModulos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiModulosQuery A secondary query class using the current class as primary query
     */
    public function useCiModulosRelatedByIdOpcionRolesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiModulosRelatedByIdOpcionRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiModulosRelatedByIdOpcionRoles', '\CiModulosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOptionTipoAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciUsuarios->getIdOptionTipoAsociado(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOptionTipoAsociadoQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOptionTipoAsociado() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOptionTipoAsociado');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOptionTipoAsociado');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOptionTipoAsociado relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOptionTipoAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOptionTipoAsociado', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOptionNivelAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciUsuarios->getIdOptionNivelAsociado(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOptionNivelAsociadoQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOptionNivelAsociado() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOptionNivelAsociado');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOptionNivelAsociado');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOptionNivelAsociado relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOptionNivelAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOptionNivelAsociado', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOpcionRole($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciUsuarios->getIdOpcionRole(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOpcionRoleQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOpcionRole() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOpcionRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOpcionRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOpcionRole');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOpcionRole');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOpcionRole relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOpcionRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOpcionRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOpcionRole', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdTipoUsuario($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciUsuarios->getIdTipoUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdTipoUsuarioQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdTipoUsuario() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdTipoUsuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdTipoUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdTipoUsuario');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdTipoUsuario');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdTipoUsuario relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdTipoUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdTipoUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdTipoUsuario', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfPrepagos->getIdOptionTipoPrepago(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            return $this
                ->useHbfPrepagosQuery()
                ->filterByPrimaryKeys($hbfPrepagos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPrepagos() only accepts arguments of type \HbfPrepagos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPrepagos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfPrepagos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPrepagos');

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
            $this->addJoinObject($join, 'HbfPrepagos');
        }

        return $this;
    }

    /**
     * Use the HbfPrepagos relation HbfPrepagos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPrepagosQuery A secondary query class using the current class as primary query
     */
    public function useHbfPrepagosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfPrepagos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPrepagos', '\HbfPrepagosQuery');
    }

    /**
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdOptionCategoriaProducto($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfProductos->getIdOptionCategoriaProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdOptionCategoriaProductoQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdOptionCategoriaProducto() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdOptionCategoriaProducto');

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
            $this->addJoinObject($join, 'HbfProductosRelatedByIdOptionCategoriaProducto');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdOptionCategoriaProducto relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdOptionCategoriaProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdOptionCategoriaProducto', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdOptionTipoProducto($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfProductos->getIdOptionTipoProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdOptionTipoProductoQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdOptionTipoProducto() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdOptionTipoProducto');

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
            $this->addJoinObject($join, 'HbfProductosRelatedByIdOptionTipoProducto');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdOptionTipoProducto relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdOptionTipoProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdOptionTipoProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdOptionTipoProducto', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfSesiones->getIdOpcionSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            return $this
                ->useHbfSesionesQuery()
                ->filterByPrimaryKeys($hbfSesiones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfSesiones() only accepts arguments of type \HbfSesiones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfSesiones relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfSesiones($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfSesiones');

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
            $this->addJoinObject($join, 'HbfSesiones');
        }

        return $this;
    }

    /**
     * Use the HbfSesiones relation HbfSesiones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfSesionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfSesionesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfSesiones($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesiones', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfTurnos->getIdOpcionTurnos(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            return $this
                ->useHbfTurnosQuery()
                ->filterByPrimaryKeys($hbfTurnos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfTurnos() only accepts arguments of type \HbfTurnos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfTurnos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfTurnos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfTurnos');

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
            $this->addJoinObject($join, 'HbfTurnos');
        }

        return $this;
    }

    /**
     * Use the HbfTurnos relation HbfTurnos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfTurnosQuery A secondary query class using the current class as primary query
     */
    public function useHbfTurnosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfTurnos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnos', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiOptionsQuery The current query, for fluid interface
     */
    public function filterByHbfVasos($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $hbfVasos->getIdOpcionTipoProducto(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            return $this
                ->useHbfVasosQuery()
                ->filterByPrimaryKeys($hbfVasos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVasos() only accepts arguments of type \HbfVasos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVasos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function joinHbfVasos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVasos');

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
            $this->addJoinObject($join, 'HbfVasos');
        }

        return $this;
    }

    /**
     * Use the HbfVasos relation HbfVasos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVasosQuery A secondary query class using the current class as primary query
     */
    public function useHbfVasosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfVasos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVasos', '\HbfVasosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCiOptions $ciOptions Object to remove from the list of results
     *
     * @return $this|ChildCiOptionsQuery The current query, for fluid interface
     */
    public function prune($ciOptions = null)
    {
        if ($ciOptions) {
            $this->addUsingAlias(CiOptionsTableMap::COL_ID_OPTION, $ciOptions->getIdOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ci_options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiOptionsTableMap::clearInstancePool();
            CiOptionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiOptionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiOptionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiOptionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CiOptionsQuery
