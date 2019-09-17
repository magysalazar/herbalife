<?php

namespace Base;

use \HbfPrepagos as ChildHbfPrepagos;
use \HbfPrepagosQuery as ChildHbfPrepagosQuery;
use \Exception;
use \PDO;
use Map\HbfPrepagosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_prepagos' table.
 *
 *
 *
 * @method     ChildHbfPrepagosQuery orderByIdPrepago($order = Criteria::ASC) Order by the id_prepago column
 * @method     ChildHbfPrepagosQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildHbfPrepagosQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfPrepagosQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildHbfPrepagosQuery orderByFichasTotal($order = Criteria::ASC) Order by the fichas_total column
 * @method     ChildHbfPrepagosQuery orderByFichasUsadas($order = Criteria::ASC) Order by the fichas_usadas column
 * @method     ChildHbfPrepagosQuery orderByFichasGratis($order = Criteria::ASC) Order by the fichas_gratis column
 * @method     ChildHbfPrepagosQuery orderByFichasRestantes($order = Criteria::ASC) Order by the fichas_restantes column
 * @method     ChildHbfPrepagosQuery orderByIdOptionTipoPrepago($order = Criteria::ASC) Order by the id_option_tipo_prepago column
 * @method     ChildHbfPrepagosQuery orderByACuenta($order = Criteria::ASC) Order by the a_cuenta column
 * @method     ChildHbfPrepagosQuery orderBySaldo($order = Criteria::ASC) Order by the saldo column
 * @method     ChildHbfPrepagosQuery orderByImporte($order = Criteria::ASC) Order by the importe column
 * @method     ChildHbfPrepagosQuery orderByPagado($order = Criteria::ASC) Order by the pagado column
 * @method     ChildHbfPrepagosQuery orderByFinalizado($order = Criteria::ASC) Order by the finalizado column
 * @method     ChildHbfPrepagosQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ChildHbfPrepagosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfPrepagosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfPrepagosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfPrepagosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfPrepagosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfPrepagosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfPrepagosQuery groupByIdPrepago() Group by the id_prepago column
 * @method     ChildHbfPrepagosQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildHbfPrepagosQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfPrepagosQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildHbfPrepagosQuery groupByFichasTotal() Group by the fichas_total column
 * @method     ChildHbfPrepagosQuery groupByFichasUsadas() Group by the fichas_usadas column
 * @method     ChildHbfPrepagosQuery groupByFichasGratis() Group by the fichas_gratis column
 * @method     ChildHbfPrepagosQuery groupByFichasRestantes() Group by the fichas_restantes column
 * @method     ChildHbfPrepagosQuery groupByIdOptionTipoPrepago() Group by the id_option_tipo_prepago column
 * @method     ChildHbfPrepagosQuery groupByACuenta() Group by the a_cuenta column
 * @method     ChildHbfPrepagosQuery groupBySaldo() Group by the saldo column
 * @method     ChildHbfPrepagosQuery groupByImporte() Group by the importe column
 * @method     ChildHbfPrepagosQuery groupByPagado() Group by the pagado column
 * @method     ChildHbfPrepagosQuery groupByFinalizado() Group by the finalizado column
 * @method     ChildHbfPrepagosQuery groupByObservaciones() Group by the observaciones column
 * @method     ChildHbfPrepagosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfPrepagosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfPrepagosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfPrepagosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfPrepagosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfPrepagosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfPrepagosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfPrepagosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfPrepagosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfPrepagosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfPrepagosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfPrepagosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfPrepagosQuery leftJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfPrepagosQuery rightJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfPrepagosQuery innerJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfPrepagosQuery joinWithCiUsuariosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithCiUsuariosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfPrepagosQuery rightJoinWithCiUsuariosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfPrepagosQuery innerJoinWithCiUsuariosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPrepagosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPrepagosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPrepagosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPrepagosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPrepagosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPrepagosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPrepagosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPrepagosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPrepagosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPrepagosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfPrepagosQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfPrepagosQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfPrepagosQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfPrepagosQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfPrepagosQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinCiOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfPrepagosQuery rightJoinCiOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfPrepagosQuery innerJoinCiOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptions relation
 *
 * @method     ChildHbfPrepagosQuery joinWithCiOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithCiOptions() Adds a LEFT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfPrepagosQuery rightJoinWithCiOptions() Adds a RIGHT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfPrepagosQuery innerJoinWithCiOptions() Adds a INNER JOIN clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfPrepagosQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfPrepagosQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfPrepagosQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfPrepagosQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfPrepagosQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfPrepagosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfPrepagosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfPrepagosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfPrepagosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfPrepagosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinHbfIngresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfPrepagosQuery rightJoinHbfIngresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfPrepagosQuery innerJoinHbfIngresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresos relation
 *
 * @method     ChildHbfPrepagosQuery joinWithHbfIngresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresos relation
 *
 * @method     ChildHbfPrepagosQuery leftJoinWithHbfIngresos() Adds a LEFT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfPrepagosQuery rightJoinWithHbfIngresos() Adds a RIGHT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfPrepagosQuery innerJoinWithHbfIngresos() Adds a INNER JOIN clause and with to the query using the HbfIngresos relation
 *
 * @method     \CiUsuariosQuery|\HbfSesionesQuery|\CiOptionsQuery|\HbfTurnosQuery|\HbfComandasQuery|\HbfIngresosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfPrepagos findOne(ConnectionInterface $con = null) Return the first ChildHbfPrepagos matching the query
 * @method     ChildHbfPrepagos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfPrepagos matching the query, or a new ChildHbfPrepagos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfPrepagos findOneByIdPrepago(int $id_prepago) Return the first ChildHbfPrepagos filtered by the id_prepago column
 * @method     ChildHbfPrepagos findOneByIdCliente(int $id_cliente) Return the first ChildHbfPrepagos filtered by the id_cliente column
 * @method     ChildHbfPrepagos findOneByIdTurno(int $id_turno) Return the first ChildHbfPrepagos filtered by the id_turno column
 * @method     ChildHbfPrepagos findOneByIdSesion(int $id_sesion) Return the first ChildHbfPrepagos filtered by the id_sesion column
 * @method     ChildHbfPrepagos findOneByFichasTotal(int $fichas_total) Return the first ChildHbfPrepagos filtered by the fichas_total column
 * @method     ChildHbfPrepagos findOneByFichasUsadas(int $fichas_usadas) Return the first ChildHbfPrepagos filtered by the fichas_usadas column
 * @method     ChildHbfPrepagos findOneByFichasGratis(int $fichas_gratis) Return the first ChildHbfPrepagos filtered by the fichas_gratis column
 * @method     ChildHbfPrepagos findOneByFichasRestantes(int $fichas_restantes) Return the first ChildHbfPrepagos filtered by the fichas_restantes column
 * @method     ChildHbfPrepagos findOneByIdOptionTipoPrepago(int $id_option_tipo_prepago) Return the first ChildHbfPrepagos filtered by the id_option_tipo_prepago column
 * @method     ChildHbfPrepagos findOneByACuenta(string $a_cuenta) Return the first ChildHbfPrepagos filtered by the a_cuenta column
 * @method     ChildHbfPrepagos findOneBySaldo(string $saldo) Return the first ChildHbfPrepagos filtered by the saldo column
 * @method     ChildHbfPrepagos findOneByImporte(string $importe) Return the first ChildHbfPrepagos filtered by the importe column
 * @method     ChildHbfPrepagos findOneByPagado(string $pagado) Return the first ChildHbfPrepagos filtered by the pagado column
 * @method     ChildHbfPrepagos findOneByFinalizado(string $finalizado) Return the first ChildHbfPrepagos filtered by the finalizado column
 * @method     ChildHbfPrepagos findOneByObservaciones(int $observaciones) Return the first ChildHbfPrepagos filtered by the observaciones column
 * @method     ChildHbfPrepagos findOneByEstado(string $estado) Return the first ChildHbfPrepagos filtered by the estado column
 * @method     ChildHbfPrepagos findOneByChangeCount(int $change_count) Return the first ChildHbfPrepagos filtered by the change_count column
 * @method     ChildHbfPrepagos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfPrepagos filtered by the id_user_created column
 * @method     ChildHbfPrepagos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfPrepagos filtered by the id_user_modified column
 * @method     ChildHbfPrepagos findOneByDateModified(string $date_modified) Return the first ChildHbfPrepagos filtered by the date_modified column
 * @method     ChildHbfPrepagos findOneByDateCreated(string $date_created) Return the first ChildHbfPrepagos filtered by the date_created column *

 * @method     ChildHbfPrepagos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfPrepagos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOne(ConnectionInterface $con = null) Return the first ChildHbfPrepagos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfPrepagos requireOneByIdPrepago(int $id_prepago) Return the first ChildHbfPrepagos filtered by the id_prepago column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdCliente(int $id_cliente) Return the first ChildHbfPrepagos filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdTurno(int $id_turno) Return the first ChildHbfPrepagos filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdSesion(int $id_sesion) Return the first ChildHbfPrepagos filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByFichasTotal(int $fichas_total) Return the first ChildHbfPrepagos filtered by the fichas_total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByFichasUsadas(int $fichas_usadas) Return the first ChildHbfPrepagos filtered by the fichas_usadas column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByFichasGratis(int $fichas_gratis) Return the first ChildHbfPrepagos filtered by the fichas_gratis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByFichasRestantes(int $fichas_restantes) Return the first ChildHbfPrepagos filtered by the fichas_restantes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdOptionTipoPrepago(int $id_option_tipo_prepago) Return the first ChildHbfPrepagos filtered by the id_option_tipo_prepago column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByACuenta(string $a_cuenta) Return the first ChildHbfPrepagos filtered by the a_cuenta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneBySaldo(string $saldo) Return the first ChildHbfPrepagos filtered by the saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByImporte(string $importe) Return the first ChildHbfPrepagos filtered by the importe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByPagado(string $pagado) Return the first ChildHbfPrepagos filtered by the pagado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByFinalizado(string $finalizado) Return the first ChildHbfPrepagos filtered by the finalizado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByObservaciones(int $observaciones) Return the first ChildHbfPrepagos filtered by the observaciones column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByEstado(string $estado) Return the first ChildHbfPrepagos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByChangeCount(int $change_count) Return the first ChildHbfPrepagos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfPrepagos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfPrepagos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByDateModified(string $date_modified) Return the first ChildHbfPrepagos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPrepagos requireOneByDateCreated(string $date_created) Return the first ChildHbfPrepagos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfPrepagos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfPrepagos objects based on current ModelCriteria
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdPrepago(int $id_prepago) Return ChildHbfPrepagos objects filtered by the id_prepago column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildHbfPrepagos objects filtered by the id_cliente column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfPrepagos objects filtered by the id_turno column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildHbfPrepagos objects filtered by the id_sesion column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByFichasTotal(int $fichas_total) Return ChildHbfPrepagos objects filtered by the fichas_total column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByFichasUsadas(int $fichas_usadas) Return ChildHbfPrepagos objects filtered by the fichas_usadas column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByFichasGratis(int $fichas_gratis) Return ChildHbfPrepagos objects filtered by the fichas_gratis column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByFichasRestantes(int $fichas_restantes) Return ChildHbfPrepagos objects filtered by the fichas_restantes column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdOptionTipoPrepago(int $id_option_tipo_prepago) Return ChildHbfPrepagos objects filtered by the id_option_tipo_prepago column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByACuenta(string $a_cuenta) Return ChildHbfPrepagos objects filtered by the a_cuenta column
 * @method     ChildHbfPrepagos[]|ObjectCollection findBySaldo(string $saldo) Return ChildHbfPrepagos objects filtered by the saldo column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByImporte(string $importe) Return ChildHbfPrepagos objects filtered by the importe column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByPagado(string $pagado) Return ChildHbfPrepagos objects filtered by the pagado column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByFinalizado(string $finalizado) Return ChildHbfPrepagos objects filtered by the finalizado column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByObservaciones(int $observaciones) Return ChildHbfPrepagos objects filtered by the observaciones column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfPrepagos objects filtered by the estado column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfPrepagos objects filtered by the change_count column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfPrepagos objects filtered by the id_user_created column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfPrepagos objects filtered by the id_user_modified column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfPrepagos objects filtered by the date_modified column
 * @method     ChildHbfPrepagos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfPrepagos objects filtered by the date_created column
 * @method     ChildHbfPrepagos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfPrepagosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfPrepagosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfPrepagos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfPrepagosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfPrepagosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfPrepagosQuery) {
            return $criteria;
        }
        $query = new ChildHbfPrepagosQuery();
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
     * @return ChildHbfPrepagos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfPrepagosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfPrepagos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_prepago, id_cliente, id_turno, id_sesion, fichas_total, fichas_usadas, fichas_gratis, fichas_restantes, id_option_tipo_prepago, a_cuenta, saldo, importe, pagado, finalizado, observaciones, estado, change_count, id_user_created, id_user_modified, date_modified, date_created FROM hbf_prepagos WHERE id_prepago = :p0';
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
            /** @var ChildHbfPrepagos $obj */
            $obj = new ChildHbfPrepagos();
            $obj->hydrate($row);
            HbfPrepagosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfPrepagos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_prepago column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPrepago(1234); // WHERE id_prepago = 1234
     * $query->filterByIdPrepago(array(12, 34)); // WHERE id_prepago IN (12, 34)
     * $query->filterByIdPrepago(array('min' => 12)); // WHERE id_prepago > 12
     * </code>
     *
     * @param     mixed $idPrepago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdPrepago($idPrepago = null, $comparison = null)
    {
        if (is_array($idPrepago)) {
            $useMinMax = false;
            if (isset($idPrepago['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $idPrepago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPrepago['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $idPrepago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $idPrepago, $comparison);
    }

    /**
     * Filter the query on the id_cliente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCliente(1234); // WHERE id_cliente = 1234
     * $query->filterByIdCliente(array(12, 34)); // WHERE id_cliente IN (12, 34)
     * $query->filterByIdCliente(array('min' => 12)); // WHERE id_cliente > 12
     * </code>
     *
     * @see       filterByCiUsuariosRelatedByIdCliente()
     *
     * @param     mixed $idCliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
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
     * @see       filterByHbfTurnos()
     *
     * @param     mixed $idTurno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_TURNO, $idTurno, $comparison);
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
     * @see       filterByHbfSesiones()
     *
     * @param     mixed $idSesion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_SESION, $idSesion, $comparison);
    }

    /**
     * Filter the query on the fichas_total column
     *
     * Example usage:
     * <code>
     * $query->filterByFichasTotal(1234); // WHERE fichas_total = 1234
     * $query->filterByFichasTotal(array(12, 34)); // WHERE fichas_total IN (12, 34)
     * $query->filterByFichasTotal(array('min' => 12)); // WHERE fichas_total > 12
     * </code>
     *
     * @param     mixed $fichasTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByFichasTotal($fichasTotal = null, $comparison = null)
    {
        if (is_array($fichasTotal)) {
            $useMinMax = false;
            if (isset($fichasTotal['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_TOTAL, $fichasTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fichasTotal['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_TOTAL, $fichasTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_TOTAL, $fichasTotal, $comparison);
    }

    /**
     * Filter the query on the fichas_usadas column
     *
     * Example usage:
     * <code>
     * $query->filterByFichasUsadas(1234); // WHERE fichas_usadas = 1234
     * $query->filterByFichasUsadas(array(12, 34)); // WHERE fichas_usadas IN (12, 34)
     * $query->filterByFichasUsadas(array('min' => 12)); // WHERE fichas_usadas > 12
     * </code>
     *
     * @param     mixed $fichasUsadas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByFichasUsadas($fichasUsadas = null, $comparison = null)
    {
        if (is_array($fichasUsadas)) {
            $useMinMax = false;
            if (isset($fichasUsadas['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_USADAS, $fichasUsadas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fichasUsadas['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_USADAS, $fichasUsadas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_USADAS, $fichasUsadas, $comparison);
    }

    /**
     * Filter the query on the fichas_gratis column
     *
     * Example usage:
     * <code>
     * $query->filterByFichasGratis(1234); // WHERE fichas_gratis = 1234
     * $query->filterByFichasGratis(array(12, 34)); // WHERE fichas_gratis IN (12, 34)
     * $query->filterByFichasGratis(array('min' => 12)); // WHERE fichas_gratis > 12
     * </code>
     *
     * @param     mixed $fichasGratis The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByFichasGratis($fichasGratis = null, $comparison = null)
    {
        if (is_array($fichasGratis)) {
            $useMinMax = false;
            if (isset($fichasGratis['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_GRATIS, $fichasGratis['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fichasGratis['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_GRATIS, $fichasGratis['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_GRATIS, $fichasGratis, $comparison);
    }

    /**
     * Filter the query on the fichas_restantes column
     *
     * Example usage:
     * <code>
     * $query->filterByFichasRestantes(1234); // WHERE fichas_restantes = 1234
     * $query->filterByFichasRestantes(array(12, 34)); // WHERE fichas_restantes IN (12, 34)
     * $query->filterByFichasRestantes(array('min' => 12)); // WHERE fichas_restantes > 12
     * </code>
     *
     * @param     mixed $fichasRestantes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByFichasRestantes($fichasRestantes = null, $comparison = null)
    {
        if (is_array($fichasRestantes)) {
            $useMinMax = false;
            if (isset($fichasRestantes['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_RESTANTES, $fichasRestantes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fichasRestantes['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_RESTANTES, $fichasRestantes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_FICHAS_RESTANTES, $fichasRestantes, $comparison);
    }

    /**
     * Filter the query on the id_option_tipo_prepago column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOptionTipoPrepago(1234); // WHERE id_option_tipo_prepago = 1234
     * $query->filterByIdOptionTipoPrepago(array(12, 34)); // WHERE id_option_tipo_prepago IN (12, 34)
     * $query->filterByIdOptionTipoPrepago(array('min' => 12)); // WHERE id_option_tipo_prepago > 12
     * </code>
     *
     * @see       filterByCiOptions()
     *
     * @param     mixed $idOptionTipoPrepago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdOptionTipoPrepago($idOptionTipoPrepago = null, $comparison = null)
    {
        if (is_array($idOptionTipoPrepago)) {
            $useMinMax = false;
            if (isset($idOptionTipoPrepago['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $idOptionTipoPrepago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOptionTipoPrepago['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $idOptionTipoPrepago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $idOptionTipoPrepago, $comparison);
    }

    /**
     * Filter the query on the a_cuenta column
     *
     * Example usage:
     * <code>
     * $query->filterByACuenta(1234); // WHERE a_cuenta = 1234
     * $query->filterByACuenta(array(12, 34)); // WHERE a_cuenta IN (12, 34)
     * $query->filterByACuenta(array('min' => 12)); // WHERE a_cuenta > 12
     * </code>
     *
     * @param     mixed $aCuenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByACuenta($aCuenta = null, $comparison = null)
    {
        if (is_array($aCuenta)) {
            $useMinMax = false;
            if (isset($aCuenta['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_A_CUENTA, $aCuenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aCuenta['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_A_CUENTA, $aCuenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_A_CUENTA, $aCuenta, $comparison);
    }

    /**
     * Filter the query on the saldo column
     *
     * Example usage:
     * <code>
     * $query->filterBySaldo(1234); // WHERE saldo = 1234
     * $query->filterBySaldo(array(12, 34)); // WHERE saldo IN (12, 34)
     * $query->filterBySaldo(array('min' => 12)); // WHERE saldo > 12
     * </code>
     *
     * @param     mixed $saldo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterBySaldo($saldo = null, $comparison = null)
    {
        if (is_array($saldo)) {
            $useMinMax = false;
            if (isset($saldo['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_SALDO, $saldo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldo['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_SALDO, $saldo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_SALDO, $saldo, $comparison);
    }

    /**
     * Filter the query on the importe column
     *
     * Example usage:
     * <code>
     * $query->filterByImporte(1234); // WHERE importe = 1234
     * $query->filterByImporte(array(12, 34)); // WHERE importe IN (12, 34)
     * $query->filterByImporte(array('min' => 12)); // WHERE importe > 12
     * </code>
     *
     * @param     mixed $importe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByImporte($importe = null, $comparison = null)
    {
        if (is_array($importe)) {
            $useMinMax = false;
            if (isset($importe['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_IMPORTE, $importe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($importe['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_IMPORTE, $importe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_IMPORTE, $importe, $comparison);
    }

    /**
     * Filter the query on the pagado column
     *
     * Example usage:
     * <code>
     * $query->filterByPagado('fooValue');   // WHERE pagado = 'fooValue'
     * $query->filterByPagado('%fooValue%', Criteria::LIKE); // WHERE pagado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pagado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByPagado($pagado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pagado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_PAGADO, $pagado, $comparison);
    }

    /**
     * Filter the query on the finalizado column
     *
     * Example usage:
     * <code>
     * $query->filterByFinalizado('fooValue');   // WHERE finalizado = 'fooValue'
     * $query->filterByFinalizado('%fooValue%', Criteria::LIKE); // WHERE finalizado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $finalizado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByFinalizado($finalizado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($finalizado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_FINALIZADO, $finalizado, $comparison);
    }

    /**
     * Filter the query on the observaciones column
     *
     * Example usage:
     * <code>
     * $query->filterByObservaciones(1234); // WHERE observaciones = 1234
     * $query->filterByObservaciones(array(12, 34)); // WHERE observaciones IN (12, 34)
     * $query->filterByObservaciones(array('min' => 12)); // WHERE observaciones > 12
     * </code>
     *
     * @param     mixed $observaciones The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByObservaciones($observaciones = null, $comparison = null)
    {
        if (is_array($observaciones)) {
            $useMinMax = false;
            if (isset($observaciones['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_OBSERVACIONES, $observaciones['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($observaciones['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_OBSERVACIONES, $observaciones['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_OBSERVACIONES, $observaciones, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPrepagosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdCliente($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_CLIENTE, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_CLIENTE, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdCliente() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdCliente');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdCliente');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdCliente relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdCliente', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
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
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function joinHbfSesiones($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfSesionesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfSesiones($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesiones', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByCiOptions($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptions() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function joinCiOptions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptions');

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
            $this->addJoinObject($join, 'CiOptions');
        }

        return $this;
    }

    /**
     * Use the CiOptions relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptions', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
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
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $hbfComandas->getIdFichaPrepago(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            return $this
                ->useHbfComandasQuery()
                ->filterByPrimaryKeys($hbfComandas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfComandas() only accepts arguments of type \HbfComandas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfComandas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function joinHbfComandas($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfComandas');

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
            $this->addJoinObject($join, 'HbfComandas');
        }

        return $this;
    }

    /**
     * Use the HbfComandas relation HbfComandas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfComandasQuery A secondary query class using the current class as primary query
     */
    public function useHbfComandasQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfComandas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandas', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function filterByHbfIngresos($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $hbfIngresos->getIdPrepago(), $comparison);
        } elseif ($hbfIngresos instanceof ObjectCollection) {
            return $this
                ->useHbfIngresosQuery()
                ->filterByPrimaryKeys($hbfIngresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfIngresos() only accepts arguments of type \HbfIngresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfIngresos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function joinHbfIngresos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfIngresos');

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
            $this->addJoinObject($join, 'HbfIngresos');
        }

        return $this;
    }

    /**
     * Use the HbfIngresos relation HbfIngresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfIngresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfIngresosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfIngresos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfIngresos', '\HbfIngresosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfPrepagos $hbfPrepagos Object to remove from the list of results
     *
     * @return $this|ChildHbfPrepagosQuery The current query, for fluid interface
     */
    public function prune($hbfPrepagos = null)
    {
        if ($hbfPrepagos) {
            $this->addUsingAlias(HbfPrepagosTableMap::COL_ID_PREPAGO, $hbfPrepagos->getIdPrepago(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_prepagos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfPrepagosTableMap::clearInstancePool();
            HbfPrepagosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfPrepagosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfPrepagosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfPrepagosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfPrepagosQuery
