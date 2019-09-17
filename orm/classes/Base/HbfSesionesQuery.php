<?php

namespace Base;

use \HbfSesiones as ChildHbfSesiones;
use \HbfSesionesQuery as ChildHbfSesionesQuery;
use \Exception;
use \PDO;
use Map\HbfSesionesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_sesiones' table.
 *
 *
 *
 * @method     ChildHbfSesionesQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildHbfSesionesQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfSesionesQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfSesionesQuery orderByIdAsociado($order = Criteria::ASC) Order by the id_asociado column
 * @method     ChildHbfSesionesQuery orderByDetalle($order = Criteria::ASC) Order by the detalle column
 * @method     ChildHbfSesionesQuery orderByCajaInicial($order = Criteria::ASC) Order by the caja_inicial column
 * @method     ChildHbfSesionesQuery orderByCajaFinal($order = Criteria::ASC) Order by the caja_final column
 * @method     ChildHbfSesionesQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildHbfSesionesQuery orderByNumConsumos($order = Criteria::ASC) Order by the num_consumos column
 * @method     ChildHbfSesionesQuery orderByTotalIngresos($order = Criteria::ASC) Order by the total_ingresos column
 * @method     ChildHbfSesionesQuery orderByTotalEgresos($order = Criteria::ASC) Order by the total_egresos column
 * @method     ChildHbfSesionesQuery orderByTotalDeben($order = Criteria::ASC) Order by the total_deben column
 * @method     ChildHbfSesionesQuery orderByTotalSobra($order = Criteria::ASC) Order by the total_sobra column
 * @method     ChildHbfSesionesQuery orderByTotalFalta($order = Criteria::ASC) Order by the total_falta column
 * @method     ChildHbfSesionesQuery orderBySobreRojo($order = Criteria::ASC) Order by the sobre_rojo column
 * @method     ChildHbfSesionesQuery orderBySobreVerde($order = Criteria::ASC) Order by the sobre_verde column
 * @method     ChildHbfSesionesQuery orderByDeposito($order = Criteria::ASC) Order by the deposito column
 * @method     ChildHbfSesionesQuery orderByCerrado($order = Criteria::ASC) Order by the cerrado column
 * @method     ChildHbfSesionesQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ChildHbfSesionesQuery orderByFecSesion($order = Criteria::ASC) Order by the fec_sesion column
 * @method     ChildHbfSesionesQuery orderByIdOpcionSesion($order = Criteria::ASC) Order by the id_opcion_sesion column
 * @method     ChildHbfSesionesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfSesionesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfSesionesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfSesionesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfSesionesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfSesionesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfSesionesQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildHbfSesionesQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfSesionesQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfSesionesQuery groupByIdAsociado() Group by the id_asociado column
 * @method     ChildHbfSesionesQuery groupByDetalle() Group by the detalle column
 * @method     ChildHbfSesionesQuery groupByCajaInicial() Group by the caja_inicial column
 * @method     ChildHbfSesionesQuery groupByCajaFinal() Group by the caja_final column
 * @method     ChildHbfSesionesQuery groupByTotal() Group by the total column
 * @method     ChildHbfSesionesQuery groupByNumConsumos() Group by the num_consumos column
 * @method     ChildHbfSesionesQuery groupByTotalIngresos() Group by the total_ingresos column
 * @method     ChildHbfSesionesQuery groupByTotalEgresos() Group by the total_egresos column
 * @method     ChildHbfSesionesQuery groupByTotalDeben() Group by the total_deben column
 * @method     ChildHbfSesionesQuery groupByTotalSobra() Group by the total_sobra column
 * @method     ChildHbfSesionesQuery groupByTotalFalta() Group by the total_falta column
 * @method     ChildHbfSesionesQuery groupBySobreRojo() Group by the sobre_rojo column
 * @method     ChildHbfSesionesQuery groupBySobreVerde() Group by the sobre_verde column
 * @method     ChildHbfSesionesQuery groupByDeposito() Group by the deposito column
 * @method     ChildHbfSesionesQuery groupByCerrado() Group by the cerrado column
 * @method     ChildHbfSesionesQuery groupByObservaciones() Group by the observaciones column
 * @method     ChildHbfSesionesQuery groupByFecSesion() Group by the fec_sesion column
 * @method     ChildHbfSesionesQuery groupByIdOpcionSesion() Group by the id_opcion_sesion column
 * @method     ChildHbfSesionesQuery groupByEstado() Group by the estado column
 * @method     ChildHbfSesionesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfSesionesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfSesionesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfSesionesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfSesionesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfSesionesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfSesionesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfSesionesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfSesionesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfSesionesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfSesionesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfSesionesQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfSesionesQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfSesionesQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfSesionesQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfSesionesQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfSesionesQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfClubs($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfSesionesQuery rightJoinHbfClubs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfSesionesQuery innerJoinHbfClubs($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubs relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfClubs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfClubs() Adds a LEFT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfClubs() Adds a RIGHT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfClubs() Adds a INNER JOIN clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfSesionesQuery leftJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfSesionesQuery rightJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfSesionesQuery innerJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiUsuariosRelatedByIdAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiUsuariosRelatedByIdAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiUsuariosRelatedByIdAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiUsuariosRelatedByIdAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfSesionesQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfSesionesQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinCiOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfSesionesQuery rightJoinCiOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfSesionesQuery innerJoinCiOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptions relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiOptions() Adds a LEFT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiOptions() Adds a RIGHT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiOptions() Adds a INNER JOIN clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfSesionesQuery leftJoinCiSessions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiSessions relation
 * @method     ChildHbfSesionesQuery rightJoinCiSessions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiSessions relation
 * @method     ChildHbfSesionesQuery innerJoinCiSessions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiSessions relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiSessions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiSessions relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiSessions() Adds a LEFT JOIN clause and with to the query using the CiSessions relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiSessions() Adds a RIGHT JOIN clause and with to the query using the CiSessions relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiSessions() Adds a INNER JOIN clause and with to the query using the CiSessions relation
 *
 * @method     ChildHbfSesionesQuery leftJoinCiUsuariosRelatedByIdSesion($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdSesion relation
 * @method     ChildHbfSesionesQuery rightJoinCiUsuariosRelatedByIdSesion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdSesion relation
 * @method     ChildHbfSesionesQuery innerJoinCiUsuariosRelatedByIdSesion($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdSesion relation
 *
 * @method     ChildHbfSesionesQuery joinWithCiUsuariosRelatedByIdSesion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdSesion relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithCiUsuariosRelatedByIdSesion() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdSesion relation
 * @method     ChildHbfSesionesQuery rightJoinWithCiUsuariosRelatedByIdSesion() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdSesion relation
 * @method     ChildHbfSesionesQuery innerJoinWithCiUsuariosRelatedByIdSesion() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdSesion relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfSesionesQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfSesionesQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfEgresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfSesionesQuery rightJoinHbfEgresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfSesionesQuery innerJoinHbfEgresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresos relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfEgresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfEgresos() Adds a LEFT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfEgresos() Adds a RIGHT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfEgresos() Adds a INNER JOIN clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfSesionesQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfSesionesQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfSesionesQuery leftJoinHbfVentas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfSesionesQuery rightJoinHbfVentas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfSesionesQuery innerJoinHbfVentas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentas relation
 *
 * @method     ChildHbfSesionesQuery joinWithHbfVentas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentas relation
 *
 * @method     ChildHbfSesionesQuery leftJoinWithHbfVentas() Adds a LEFT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfSesionesQuery rightJoinWithHbfVentas() Adds a RIGHT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfSesionesQuery innerJoinWithHbfVentas() Adds a INNER JOIN clause and with to the query using the HbfVentas relation
 *
 * @method     \CiUsuariosQuery|\HbfClubsQuery|\HbfTurnosQuery|\CiOptionsQuery|\CiSessionsQuery|\HbfComandasQuery|\HbfEgresosQuery|\HbfPrepagosQuery|\HbfVentasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfSesiones findOne(ConnectionInterface $con = null) Return the first ChildHbfSesiones matching the query
 * @method     ChildHbfSesiones findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfSesiones matching the query, or a new ChildHbfSesiones object populated from the query conditions when no match is found
 *
 * @method     ChildHbfSesiones findOneByIdSesion(int $id_sesion) Return the first ChildHbfSesiones filtered by the id_sesion column
 * @method     ChildHbfSesiones findOneByIdClub(int $id_club) Return the first ChildHbfSesiones filtered by the id_club column
 * @method     ChildHbfSesiones findOneByIdTurno(int $id_turno) Return the first ChildHbfSesiones filtered by the id_turno column
 * @method     ChildHbfSesiones findOneByIdAsociado(int $id_asociado) Return the first ChildHbfSesiones filtered by the id_asociado column
 * @method     ChildHbfSesiones findOneByDetalle(string $detalle) Return the first ChildHbfSesiones filtered by the detalle column
 * @method     ChildHbfSesiones findOneByCajaInicial(string $caja_inicial) Return the first ChildHbfSesiones filtered by the caja_inicial column
 * @method     ChildHbfSesiones findOneByCajaFinal(string $caja_final) Return the first ChildHbfSesiones filtered by the caja_final column
 * @method     ChildHbfSesiones findOneByTotal(string $total) Return the first ChildHbfSesiones filtered by the total column
 * @method     ChildHbfSesiones findOneByNumConsumos(string $num_consumos) Return the first ChildHbfSesiones filtered by the num_consumos column
 * @method     ChildHbfSesiones findOneByTotalIngresos(string $total_ingresos) Return the first ChildHbfSesiones filtered by the total_ingresos column
 * @method     ChildHbfSesiones findOneByTotalEgresos(string $total_egresos) Return the first ChildHbfSesiones filtered by the total_egresos column
 * @method     ChildHbfSesiones findOneByTotalDeben(string $total_deben) Return the first ChildHbfSesiones filtered by the total_deben column
 * @method     ChildHbfSesiones findOneByTotalSobra(string $total_sobra) Return the first ChildHbfSesiones filtered by the total_sobra column
 * @method     ChildHbfSesiones findOneByTotalFalta(string $total_falta) Return the first ChildHbfSesiones filtered by the total_falta column
 * @method     ChildHbfSesiones findOneBySobreRojo(string $sobre_rojo) Return the first ChildHbfSesiones filtered by the sobre_rojo column
 * @method     ChildHbfSesiones findOneBySobreVerde(string $sobre_verde) Return the first ChildHbfSesiones filtered by the sobre_verde column
 * @method     ChildHbfSesiones findOneByDeposito(string $deposito) Return the first ChildHbfSesiones filtered by the deposito column
 * @method     ChildHbfSesiones findOneByCerrado(string $cerrado) Return the first ChildHbfSesiones filtered by the cerrado column
 * @method     ChildHbfSesiones findOneByObservaciones(string $observaciones) Return the first ChildHbfSesiones filtered by the observaciones column
 * @method     ChildHbfSesiones findOneByFecSesion(string $fec_sesion) Return the first ChildHbfSesiones filtered by the fec_sesion column
 * @method     ChildHbfSesiones findOneByIdOpcionSesion(int $id_opcion_sesion) Return the first ChildHbfSesiones filtered by the id_opcion_sesion column
 * @method     ChildHbfSesiones findOneByEstado(string $estado) Return the first ChildHbfSesiones filtered by the estado column
 * @method     ChildHbfSesiones findOneByChangeCount(int $change_count) Return the first ChildHbfSesiones filtered by the change_count column
 * @method     ChildHbfSesiones findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfSesiones filtered by the id_user_modified column
 * @method     ChildHbfSesiones findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfSesiones filtered by the id_user_created column
 * @method     ChildHbfSesiones findOneByDateModified(string $date_modified) Return the first ChildHbfSesiones filtered by the date_modified column
 * @method     ChildHbfSesiones findOneByDateCreated(string $date_created) Return the first ChildHbfSesiones filtered by the date_created column *

 * @method     ChildHbfSesiones requirePk($key, ConnectionInterface $con = null) Return the ChildHbfSesiones by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOne(ConnectionInterface $con = null) Return the first ChildHbfSesiones matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfSesiones requireOneByIdSesion(int $id_sesion) Return the first ChildHbfSesiones filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdClub(int $id_club) Return the first ChildHbfSesiones filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdTurno(int $id_turno) Return the first ChildHbfSesiones filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdAsociado(int $id_asociado) Return the first ChildHbfSesiones filtered by the id_asociado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByDetalle(string $detalle) Return the first ChildHbfSesiones filtered by the detalle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByCajaInicial(string $caja_inicial) Return the first ChildHbfSesiones filtered by the caja_inicial column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByCajaFinal(string $caja_final) Return the first ChildHbfSesiones filtered by the caja_final column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotal(string $total) Return the first ChildHbfSesiones filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByNumConsumos(string $num_consumos) Return the first ChildHbfSesiones filtered by the num_consumos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotalIngresos(string $total_ingresos) Return the first ChildHbfSesiones filtered by the total_ingresos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotalEgresos(string $total_egresos) Return the first ChildHbfSesiones filtered by the total_egresos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotalDeben(string $total_deben) Return the first ChildHbfSesiones filtered by the total_deben column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotalSobra(string $total_sobra) Return the first ChildHbfSesiones filtered by the total_sobra column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByTotalFalta(string $total_falta) Return the first ChildHbfSesiones filtered by the total_falta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneBySobreRojo(string $sobre_rojo) Return the first ChildHbfSesiones filtered by the sobre_rojo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneBySobreVerde(string $sobre_verde) Return the first ChildHbfSesiones filtered by the sobre_verde column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByDeposito(string $deposito) Return the first ChildHbfSesiones filtered by the deposito column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByCerrado(string $cerrado) Return the first ChildHbfSesiones filtered by the cerrado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByObservaciones(string $observaciones) Return the first ChildHbfSesiones filtered by the observaciones column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByFecSesion(string $fec_sesion) Return the first ChildHbfSesiones filtered by the fec_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdOpcionSesion(int $id_opcion_sesion) Return the first ChildHbfSesiones filtered by the id_opcion_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByEstado(string $estado) Return the first ChildHbfSesiones filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByChangeCount(int $change_count) Return the first ChildHbfSesiones filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfSesiones filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfSesiones filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByDateModified(string $date_modified) Return the first ChildHbfSesiones filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfSesiones requireOneByDateCreated(string $date_created) Return the first ChildHbfSesiones filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfSesiones[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfSesiones objects based on current ModelCriteria
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildHbfSesiones objects filtered by the id_sesion column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfSesiones objects filtered by the id_club column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfSesiones objects filtered by the id_turno column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdAsociado(int $id_asociado) Return ChildHbfSesiones objects filtered by the id_asociado column
 * @method     ChildHbfSesiones[]|ObjectCollection findByDetalle(string $detalle) Return ChildHbfSesiones objects filtered by the detalle column
 * @method     ChildHbfSesiones[]|ObjectCollection findByCajaInicial(string $caja_inicial) Return ChildHbfSesiones objects filtered by the caja_inicial column
 * @method     ChildHbfSesiones[]|ObjectCollection findByCajaFinal(string $caja_final) Return ChildHbfSesiones objects filtered by the caja_final column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotal(string $total) Return ChildHbfSesiones objects filtered by the total column
 * @method     ChildHbfSesiones[]|ObjectCollection findByNumConsumos(string $num_consumos) Return ChildHbfSesiones objects filtered by the num_consumos column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotalIngresos(string $total_ingresos) Return ChildHbfSesiones objects filtered by the total_ingresos column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotalEgresos(string $total_egresos) Return ChildHbfSesiones objects filtered by the total_egresos column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotalDeben(string $total_deben) Return ChildHbfSesiones objects filtered by the total_deben column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotalSobra(string $total_sobra) Return ChildHbfSesiones objects filtered by the total_sobra column
 * @method     ChildHbfSesiones[]|ObjectCollection findByTotalFalta(string $total_falta) Return ChildHbfSesiones objects filtered by the total_falta column
 * @method     ChildHbfSesiones[]|ObjectCollection findBySobreRojo(string $sobre_rojo) Return ChildHbfSesiones objects filtered by the sobre_rojo column
 * @method     ChildHbfSesiones[]|ObjectCollection findBySobreVerde(string $sobre_verde) Return ChildHbfSesiones objects filtered by the sobre_verde column
 * @method     ChildHbfSesiones[]|ObjectCollection findByDeposito(string $deposito) Return ChildHbfSesiones objects filtered by the deposito column
 * @method     ChildHbfSesiones[]|ObjectCollection findByCerrado(string $cerrado) Return ChildHbfSesiones objects filtered by the cerrado column
 * @method     ChildHbfSesiones[]|ObjectCollection findByObservaciones(string $observaciones) Return ChildHbfSesiones objects filtered by the observaciones column
 * @method     ChildHbfSesiones[]|ObjectCollection findByFecSesion(string $fec_sesion) Return ChildHbfSesiones objects filtered by the fec_sesion column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdOpcionSesion(int $id_opcion_sesion) Return ChildHbfSesiones objects filtered by the id_opcion_sesion column
 * @method     ChildHbfSesiones[]|ObjectCollection findByEstado(string $estado) Return ChildHbfSesiones objects filtered by the estado column
 * @method     ChildHbfSesiones[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfSesiones objects filtered by the change_count column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfSesiones objects filtered by the id_user_modified column
 * @method     ChildHbfSesiones[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfSesiones objects filtered by the id_user_created column
 * @method     ChildHbfSesiones[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfSesiones objects filtered by the date_modified column
 * @method     ChildHbfSesiones[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfSesiones objects filtered by the date_created column
 * @method     ChildHbfSesiones[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfSesionesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfSesionesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfSesiones', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfSesionesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfSesionesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfSesionesQuery) {
            return $criteria;
        }
        $query = new ChildHbfSesionesQuery();
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
     * @return ChildHbfSesiones|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfSesionesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfSesiones A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_sesion, id_club, id_turno, id_asociado, detalle, caja_inicial, caja_final, total, num_consumos, total_ingresos, total_egresos, total_deben, total_sobra, total_falta, sobre_rojo, sobre_verde, deposito, cerrado, observaciones, fec_sesion, id_opcion_sesion, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_sesiones WHERE id_sesion = :p0';
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
            /** @var ChildHbfSesiones $obj */
            $obj = new ChildHbfSesiones();
            $obj->hydrate($row);
            HbfSesionesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfSesiones|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $keys, Criteria::IN);
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
     * @param     mixed $idSesion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $idSesion, $comparison);
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
     * @see       filterByHbfClubs()
     *
     * @param     mixed $idClub The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_TURNO, $idTurno, $comparison);
    }

    /**
     * Filter the query on the id_asociado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAsociado(1234); // WHERE id_asociado = 1234
     * $query->filterByIdAsociado(array(12, 34)); // WHERE id_asociado IN (12, 34)
     * $query->filterByIdAsociado(array('min' => 12)); // WHERE id_asociado > 12
     * </code>
     *
     * @see       filterByCiUsuariosRelatedByIdAsociado()
     *
     * @param     mixed $idAsociado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdAsociado($idAsociado = null, $comparison = null)
    {
        if (is_array($idAsociado)) {
            $useMinMax = false;
            if (isset($idAsociado['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_ASOCIADO, $idAsociado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAsociado['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_ASOCIADO, $idAsociado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_ASOCIADO, $idAsociado, $comparison);
    }

    /**
     * Filter the query on the detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalle('fooValue');   // WHERE detalle = 'fooValue'
     * $query->filterByDetalle('%fooValue%', Criteria::LIKE); // WHERE detalle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByDetalle($detalle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_DETALLE, $detalle, $comparison);
    }

    /**
     * Filter the query on the caja_inicial column
     *
     * Example usage:
     * <code>
     * $query->filterByCajaInicial(1234); // WHERE caja_inicial = 1234
     * $query->filterByCajaInicial(array(12, 34)); // WHERE caja_inicial IN (12, 34)
     * $query->filterByCajaInicial(array('min' => 12)); // WHERE caja_inicial > 12
     * </code>
     *
     * @param     mixed $cajaInicial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCajaInicial($cajaInicial = null, $comparison = null)
    {
        if (is_array($cajaInicial)) {
            $useMinMax = false;
            if (isset($cajaInicial['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_INICIAL, $cajaInicial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cajaInicial['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_INICIAL, $cajaInicial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_INICIAL, $cajaInicial, $comparison);
    }

    /**
     * Filter the query on the caja_final column
     *
     * Example usage:
     * <code>
     * $query->filterByCajaFinal(1234); // WHERE caja_final = 1234
     * $query->filterByCajaFinal(array(12, 34)); // WHERE caja_final IN (12, 34)
     * $query->filterByCajaFinal(array('min' => 12)); // WHERE caja_final > 12
     * </code>
     *
     * @param     mixed $cajaFinal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCajaFinal($cajaFinal = null, $comparison = null)
    {
        if (is_array($cajaFinal)) {
            $useMinMax = false;
            if (isset($cajaFinal['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_FINAL, $cajaFinal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cajaFinal['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_FINAL, $cajaFinal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_CAJA_FINAL, $cajaFinal, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the num_consumos column
     *
     * Example usage:
     * <code>
     * $query->filterByNumConsumos(1234); // WHERE num_consumos = 1234
     * $query->filterByNumConsumos(array(12, 34)); // WHERE num_consumos IN (12, 34)
     * $query->filterByNumConsumos(array('min' => 12)); // WHERE num_consumos > 12
     * </code>
     *
     * @param     mixed $numConsumos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByNumConsumos($numConsumos = null, $comparison = null)
    {
        if (is_array($numConsumos)) {
            $useMinMax = false;
            if (isset($numConsumos['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_NUM_CONSUMOS, $numConsumos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numConsumos['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_NUM_CONSUMOS, $numConsumos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_NUM_CONSUMOS, $numConsumos, $comparison);
    }

    /**
     * Filter the query on the total_ingresos column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalIngresos(1234); // WHERE total_ingresos = 1234
     * $query->filterByTotalIngresos(array(12, 34)); // WHERE total_ingresos IN (12, 34)
     * $query->filterByTotalIngresos(array('min' => 12)); // WHERE total_ingresos > 12
     * </code>
     *
     * @param     mixed $totalIngresos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotalIngresos($totalIngresos = null, $comparison = null)
    {
        if (is_array($totalIngresos)) {
            $useMinMax = false;
            if (isset($totalIngresos['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_INGRESOS, $totalIngresos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalIngresos['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_INGRESOS, $totalIngresos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_INGRESOS, $totalIngresos, $comparison);
    }

    /**
     * Filter the query on the total_egresos column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalEgresos(1234); // WHERE total_egresos = 1234
     * $query->filterByTotalEgresos(array(12, 34)); // WHERE total_egresos IN (12, 34)
     * $query->filterByTotalEgresos(array('min' => 12)); // WHERE total_egresos > 12
     * </code>
     *
     * @param     mixed $totalEgresos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotalEgresos($totalEgresos = null, $comparison = null)
    {
        if (is_array($totalEgresos)) {
            $useMinMax = false;
            if (isset($totalEgresos['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_EGRESOS, $totalEgresos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalEgresos['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_EGRESOS, $totalEgresos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_EGRESOS, $totalEgresos, $comparison);
    }

    /**
     * Filter the query on the total_deben column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDeben(1234); // WHERE total_deben = 1234
     * $query->filterByTotalDeben(array(12, 34)); // WHERE total_deben IN (12, 34)
     * $query->filterByTotalDeben(array('min' => 12)); // WHERE total_deben > 12
     * </code>
     *
     * @param     mixed $totalDeben The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotalDeben($totalDeben = null, $comparison = null)
    {
        if (is_array($totalDeben)) {
            $useMinMax = false;
            if (isset($totalDeben['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_DEBEN, $totalDeben['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalDeben['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_DEBEN, $totalDeben['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_DEBEN, $totalDeben, $comparison);
    }

    /**
     * Filter the query on the total_sobra column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalSobra(1234); // WHERE total_sobra = 1234
     * $query->filterByTotalSobra(array(12, 34)); // WHERE total_sobra IN (12, 34)
     * $query->filterByTotalSobra(array('min' => 12)); // WHERE total_sobra > 12
     * </code>
     *
     * @param     mixed $totalSobra The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotalSobra($totalSobra = null, $comparison = null)
    {
        if (is_array($totalSobra)) {
            $useMinMax = false;
            if (isset($totalSobra['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_SOBRA, $totalSobra['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalSobra['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_SOBRA, $totalSobra['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_SOBRA, $totalSobra, $comparison);
    }

    /**
     * Filter the query on the total_falta column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalFalta(1234); // WHERE total_falta = 1234
     * $query->filterByTotalFalta(array(12, 34)); // WHERE total_falta IN (12, 34)
     * $query->filterByTotalFalta(array('min' => 12)); // WHERE total_falta > 12
     * </code>
     *
     * @param     mixed $totalFalta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByTotalFalta($totalFalta = null, $comparison = null)
    {
        if (is_array($totalFalta)) {
            $useMinMax = false;
            if (isset($totalFalta['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_FALTA, $totalFalta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalFalta['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_FALTA, $totalFalta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_TOTAL_FALTA, $totalFalta, $comparison);
    }

    /**
     * Filter the query on the sobre_rojo column
     *
     * Example usage:
     * <code>
     * $query->filterBySobreRojo(1234); // WHERE sobre_rojo = 1234
     * $query->filterBySobreRojo(array(12, 34)); // WHERE sobre_rojo IN (12, 34)
     * $query->filterBySobreRojo(array('min' => 12)); // WHERE sobre_rojo > 12
     * </code>
     *
     * @param     mixed $sobreRojo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterBySobreRojo($sobreRojo = null, $comparison = null)
    {
        if (is_array($sobreRojo)) {
            $useMinMax = false;
            if (isset($sobreRojo['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_ROJO, $sobreRojo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sobreRojo['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_ROJO, $sobreRojo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_ROJO, $sobreRojo, $comparison);
    }

    /**
     * Filter the query on the sobre_verde column
     *
     * Example usage:
     * <code>
     * $query->filterBySobreVerde(1234); // WHERE sobre_verde = 1234
     * $query->filterBySobreVerde(array(12, 34)); // WHERE sobre_verde IN (12, 34)
     * $query->filterBySobreVerde(array('min' => 12)); // WHERE sobre_verde > 12
     * </code>
     *
     * @param     mixed $sobreVerde The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterBySobreVerde($sobreVerde = null, $comparison = null)
    {
        if (is_array($sobreVerde)) {
            $useMinMax = false;
            if (isset($sobreVerde['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_VERDE, $sobreVerde['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sobreVerde['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_VERDE, $sobreVerde['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_SOBRE_VERDE, $sobreVerde, $comparison);
    }

    /**
     * Filter the query on the deposito column
     *
     * Example usage:
     * <code>
     * $query->filterByDeposito(1234); // WHERE deposito = 1234
     * $query->filterByDeposito(array(12, 34)); // WHERE deposito IN (12, 34)
     * $query->filterByDeposito(array('min' => 12)); // WHERE deposito > 12
     * </code>
     *
     * @param     mixed $deposito The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByDeposito($deposito = null, $comparison = null)
    {
        if (is_array($deposito)) {
            $useMinMax = false;
            if (isset($deposito['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DEPOSITO, $deposito['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deposito['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DEPOSITO, $deposito['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_DEPOSITO, $deposito, $comparison);
    }

    /**
     * Filter the query on the cerrado column
     *
     * Example usage:
     * <code>
     * $query->filterByCerrado('fooValue');   // WHERE cerrado = 'fooValue'
     * $query->filterByCerrado('%fooValue%', Criteria::LIKE); // WHERE cerrado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cerrado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCerrado($cerrado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cerrado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_CERRADO, $cerrado, $comparison);
    }

    /**
     * Filter the query on the observaciones column
     *
     * Example usage:
     * <code>
     * $query->filterByObservaciones('fooValue');   // WHERE observaciones = 'fooValue'
     * $query->filterByObservaciones('%fooValue%', Criteria::LIKE); // WHERE observaciones LIKE '%fooValue%'
     * </code>
     *
     * @param     string $observaciones The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByObservaciones($observaciones = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observaciones)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_OBSERVACIONES, $observaciones, $comparison);
    }

    /**
     * Filter the query on the fec_sesion column
     *
     * Example usage:
     * <code>
     * $query->filterByFecSesion('2011-03-14'); // WHERE fec_sesion = '2011-03-14'
     * $query->filterByFecSesion('now'); // WHERE fec_sesion = '2011-03-14'
     * $query->filterByFecSesion(array('max' => 'yesterday')); // WHERE fec_sesion > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecSesion The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByFecSesion($fecSesion = null, $comparison = null)
    {
        if (is_array($fecSesion)) {
            $useMinMax = false;
            if (isset($fecSesion['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_FEC_SESION, $fecSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecSesion['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_FEC_SESION, $fecSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_FEC_SESION, $fecSesion, $comparison);
    }

    /**
     * Filter the query on the id_opcion_sesion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionSesion(1234); // WHERE id_opcion_sesion = 1234
     * $query->filterByIdOpcionSesion(array(12, 34)); // WHERE id_opcion_sesion IN (12, 34)
     * $query->filterByIdOpcionSesion(array('min' => 12)); // WHERE id_opcion_sesion > 12
     * </code>
     *
     * @see       filterByCiOptions()
     *
     * @param     mixed $idOpcionSesion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdOpcionSesion($idOpcionSesion = null, $comparison = null)
    {
        if (is_array($idOpcionSesion)) {
            $useMinMax = false;
            if (isset($idOpcionSesion['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_OPCION_SESION, $idOpcionSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionSesion['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_OPCION_SESION, $idOpcionSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_OPCION_SESION, $idOpcionSesion, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfSesionesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
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
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfClubs($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
        } else {
            throw new PropelException('filterByHbfClubs() only accepts arguments of type \HbfClubs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfClubs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfClubs($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfClubs');

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
            $this->addJoinObject($join, 'HbfClubs');
        }

        return $this;
    }

    /**
     * Use the HbfClubs relation HbfClubs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfClubsQuery A secondary query class using the current class as primary query
     */
    public function useHbfClubsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfClubs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfClubs', '\HbfClubsQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_ASOCIADO, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_ASOCIADO, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdAsociado() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdAsociado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdAsociado');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdAsociado');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdAsociado relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdAsociadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdAsociado', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfTurnos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfTurnosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfTurnos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnos', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiOptions($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_OPCION_SESION, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_OPCION_SESION, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
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
     * Filter the query by a related \CiSessions object
     *
     * @param \CiSessions|ObjectCollection $ciSessions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiSessions($ciSessions, $comparison = null)
    {
        if ($ciSessions instanceof \CiSessions) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $ciSessions->getIdHbfSesion(), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
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
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdSesion($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $ciUsuarios->getIdSesion(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdSesionQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdSesion() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdSesion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdSesion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdSesion');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdSesion');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdSesion relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdSesionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdSesion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdSesion', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $hbfComandas->getIdSesion(), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfComandas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfComandasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfComandas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandas', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfEgresos object
     *
     * @param \HbfEgresos|ObjectCollection $hbfEgresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfEgresos($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $hbfEgresos->getIdSesion(), $comparison);
        } elseif ($hbfEgresos instanceof ObjectCollection) {
            return $this
                ->useHbfEgresosQuery()
                ->filterByPrimaryKeys($hbfEgresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfEgresos() only accepts arguments of type \HbfEgresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfEgresos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfEgresos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfEgresos');

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
            $this->addJoinObject($join, 'HbfEgresos');
        }

        return $this;
    }

    /**
     * Use the HbfEgresos relation HbfEgresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfEgresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfEgresosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfEgresos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfEgresos', '\HbfEgresosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $hbfPrepagos->getIdSesion(), $comparison);
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
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfPrepagos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfPrepagosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfPrepagos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPrepagos', '\HbfPrepagosQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function filterByHbfVentas($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $hbfVentas->getIdSesion(), $comparison);
        } elseif ($hbfVentas instanceof ObjectCollection) {
            return $this
                ->useHbfVentasQuery()
                ->filterByPrimaryKeys($hbfVentas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVentas() only accepts arguments of type \HbfVentas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVentas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function joinHbfVentas($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVentas');

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
            $this->addJoinObject($join, 'HbfVentas');
        }

        return $this;
    }

    /**
     * Use the HbfVentas relation HbfVentas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVentasQuery A secondary query class using the current class as primary query
     */
    public function useHbfVentasQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfVentas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVentas', '\HbfVentasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfSesiones $hbfSesiones Object to remove from the list of results
     *
     * @return $this|ChildHbfSesionesQuery The current query, for fluid interface
     */
    public function prune($hbfSesiones = null)
    {
        if ($hbfSesiones) {
            $this->addUsingAlias(HbfSesionesTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_sesiones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfSesionesTableMap::clearInstancePool();
            HbfSesionesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfSesionesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfSesionesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfSesionesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfSesionesQuery
