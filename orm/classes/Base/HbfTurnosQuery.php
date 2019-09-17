<?php

namespace Base;

use \HbfTurnos as ChildHbfTurnos;
use \HbfTurnosQuery as ChildHbfTurnosQuery;
use \Exception;
use \PDO;
use Map\HbfTurnosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_turnos' table.
 *
 *
 *
 * @method     ChildHbfTurnosQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfTurnosQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfTurnosQuery orderByIdAsociado($order = Criteria::ASC) Order by the id_asociado column
 * @method     ChildHbfTurnosQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildHbfTurnosQuery orderByFecInicio($order = Criteria::ASC) Order by the fec_inicio column
 * @method     ChildHbfTurnosQuery orderByFecFin($order = Criteria::ASC) Order by the fec_fin column
 * @method     ChildHbfTurnosQuery orderByHorarioDesde($order = Criteria::ASC) Order by the horario_desde column
 * @method     ChildHbfTurnosQuery orderByHorarioHasta($order = Criteria::ASC) Order by the horario_hasta column
 * @method     ChildHbfTurnosQuery orderByTotalConsumos($order = Criteria::ASC) Order by the total_consumos column
 * @method     ChildHbfTurnosQuery orderByIdOpcionTurnos($order = Criteria::ASC) Order by the id_opcion_turnos column
 * @method     ChildHbfTurnosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfTurnosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfTurnosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfTurnosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfTurnosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfTurnosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfTurnosQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfTurnosQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfTurnosQuery groupByIdAsociado() Group by the id_asociado column
 * @method     ChildHbfTurnosQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildHbfTurnosQuery groupByFecInicio() Group by the fec_inicio column
 * @method     ChildHbfTurnosQuery groupByFecFin() Group by the fec_fin column
 * @method     ChildHbfTurnosQuery groupByHorarioDesde() Group by the horario_desde column
 * @method     ChildHbfTurnosQuery groupByHorarioHasta() Group by the horario_hasta column
 * @method     ChildHbfTurnosQuery groupByTotalConsumos() Group by the total_consumos column
 * @method     ChildHbfTurnosQuery groupByIdOpcionTurnos() Group by the id_opcion_turnos column
 * @method     ChildHbfTurnosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfTurnosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfTurnosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfTurnosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfTurnosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfTurnosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfTurnosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfTurnosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfTurnosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfTurnosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfTurnosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfTurnosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfTurnosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfTurnosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfTurnosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfTurnosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfTurnosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfTurnosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfTurnosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfTurnosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfTurnosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfTurnosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfTurnosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfTurnosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfTurnosQuery leftJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfTurnosQuery rightJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfTurnosQuery innerJoinCiUsuariosRelatedByIdAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfTurnosQuery joinWithCiUsuariosRelatedByIdAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithCiUsuariosRelatedByIdAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfTurnosQuery rightJoinWithCiUsuariosRelatedByIdAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 * @method     ChildHbfTurnosQuery innerJoinWithCiUsuariosRelatedByIdAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdAsociado relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfClubs($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfTurnosQuery rightJoinHbfClubs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfTurnosQuery innerJoinHbfClubs($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubs relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfClubs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfClubs() Adds a LEFT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfClubs() Adds a RIGHT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfClubs() Adds a INNER JOIN clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfTurnosQuery leftJoinCiOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfTurnosQuery rightJoinCiOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfTurnosQuery innerJoinCiOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptions relation
 *
 * @method     ChildHbfTurnosQuery joinWithCiOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithCiOptions() Adds a LEFT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfTurnosQuery rightJoinWithCiOptions() Adds a RIGHT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfTurnosQuery innerJoinWithCiOptions() Adds a INNER JOIN clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfTurnosQuery leftJoinCiUsuariosRelatedByIdTurno($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdTurno relation
 * @method     ChildHbfTurnosQuery rightJoinCiUsuariosRelatedByIdTurno($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdTurno relation
 * @method     ChildHbfTurnosQuery innerJoinCiUsuariosRelatedByIdTurno($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdTurno relation
 *
 * @method     ChildHbfTurnosQuery joinWithCiUsuariosRelatedByIdTurno($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdTurno relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithCiUsuariosRelatedByIdTurno() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdTurno relation
 * @method     ChildHbfTurnosQuery rightJoinWithCiUsuariosRelatedByIdTurno() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdTurno relation
 * @method     ChildHbfTurnosQuery innerJoinWithCiUsuariosRelatedByIdTurno() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdTurno relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfTurnosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfTurnosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfEgresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfTurnosQuery rightJoinHbfEgresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfTurnosQuery innerJoinHbfEgresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresos relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfEgresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfEgresos() Adds a LEFT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfEgresos() Adds a RIGHT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfEgresos() Adds a INNER JOIN clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfTurnosQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfTurnosQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfTurnosQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfTurnosQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfTurnosQuery leftJoinHbfVentas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfTurnosQuery rightJoinHbfVentas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfTurnosQuery innerJoinHbfVentas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentas relation
 *
 * @method     ChildHbfTurnosQuery joinWithHbfVentas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentas relation
 *
 * @method     ChildHbfTurnosQuery leftJoinWithHbfVentas() Adds a LEFT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfTurnosQuery rightJoinWithHbfVentas() Adds a RIGHT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfTurnosQuery innerJoinWithHbfVentas() Adds a INNER JOIN clause and with to the query using the HbfVentas relation
 *
 * @method     \CiUsuariosQuery|\HbfClubsQuery|\CiOptionsQuery|\HbfComandasQuery|\HbfEgresosQuery|\HbfPrepagosQuery|\HbfSesionesQuery|\HbfVentasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfTurnos findOne(ConnectionInterface $con = null) Return the first ChildHbfTurnos matching the query
 * @method     ChildHbfTurnos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfTurnos matching the query, or a new ChildHbfTurnos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfTurnos findOneByIdTurno(int $id_turno) Return the first ChildHbfTurnos filtered by the id_turno column
 * @method     ChildHbfTurnos findOneByIdClub(int $id_club) Return the first ChildHbfTurnos filtered by the id_club column
 * @method     ChildHbfTurnos findOneByIdAsociado(int $id_asociado) Return the first ChildHbfTurnos filtered by the id_asociado column
 * @method     ChildHbfTurnos findOneByDescripcion(string $descripcion) Return the first ChildHbfTurnos filtered by the descripcion column
 * @method     ChildHbfTurnos findOneByFecInicio(string $fec_inicio) Return the first ChildHbfTurnos filtered by the fec_inicio column
 * @method     ChildHbfTurnos findOneByFecFin(string $fec_fin) Return the first ChildHbfTurnos filtered by the fec_fin column
 * @method     ChildHbfTurnos findOneByHorarioDesde(string $horario_desde) Return the first ChildHbfTurnos filtered by the horario_desde column
 * @method     ChildHbfTurnos findOneByHorarioHasta(string $horario_hasta) Return the first ChildHbfTurnos filtered by the horario_hasta column
 * @method     ChildHbfTurnos findOneByTotalConsumos(int $total_consumos) Return the first ChildHbfTurnos filtered by the total_consumos column
 * @method     ChildHbfTurnos findOneByIdOpcionTurnos(int $id_opcion_turnos) Return the first ChildHbfTurnos filtered by the id_opcion_turnos column
 * @method     ChildHbfTurnos findOneByChangeCount(int $change_count) Return the first ChildHbfTurnos filtered by the change_count column
 * @method     ChildHbfTurnos findOneByEstado(string $estado) Return the first ChildHbfTurnos filtered by the estado column
 * @method     ChildHbfTurnos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfTurnos filtered by the id_user_modified column
 * @method     ChildHbfTurnos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfTurnos filtered by the id_user_created column
 * @method     ChildHbfTurnos findOneByDateModified(string $date_modified) Return the first ChildHbfTurnos filtered by the date_modified column
 * @method     ChildHbfTurnos findOneByDateCreated(string $date_created) Return the first ChildHbfTurnos filtered by the date_created column *

 * @method     ChildHbfTurnos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfTurnos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOne(ConnectionInterface $con = null) Return the first ChildHbfTurnos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfTurnos requireOneByIdTurno(int $id_turno) Return the first ChildHbfTurnos filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByIdClub(int $id_club) Return the first ChildHbfTurnos filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByIdAsociado(int $id_asociado) Return the first ChildHbfTurnos filtered by the id_asociado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByDescripcion(string $descripcion) Return the first ChildHbfTurnos filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByFecInicio(string $fec_inicio) Return the first ChildHbfTurnos filtered by the fec_inicio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByFecFin(string $fec_fin) Return the first ChildHbfTurnos filtered by the fec_fin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByHorarioDesde(string $horario_desde) Return the first ChildHbfTurnos filtered by the horario_desde column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByHorarioHasta(string $horario_hasta) Return the first ChildHbfTurnos filtered by the horario_hasta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByTotalConsumos(int $total_consumos) Return the first ChildHbfTurnos filtered by the total_consumos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByIdOpcionTurnos(int $id_opcion_turnos) Return the first ChildHbfTurnos filtered by the id_opcion_turnos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByChangeCount(int $change_count) Return the first ChildHbfTurnos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByEstado(string $estado) Return the first ChildHbfTurnos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfTurnos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfTurnos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByDateModified(string $date_modified) Return the first ChildHbfTurnos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfTurnos requireOneByDateCreated(string $date_created) Return the first ChildHbfTurnos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfTurnos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfTurnos objects based on current ModelCriteria
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfTurnos objects filtered by the id_turno column
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfTurnos objects filtered by the id_club column
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdAsociado(int $id_asociado) Return ChildHbfTurnos objects filtered by the id_asociado column
 * @method     ChildHbfTurnos[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildHbfTurnos objects filtered by the descripcion column
 * @method     ChildHbfTurnos[]|ObjectCollection findByFecInicio(string $fec_inicio) Return ChildHbfTurnos objects filtered by the fec_inicio column
 * @method     ChildHbfTurnos[]|ObjectCollection findByFecFin(string $fec_fin) Return ChildHbfTurnos objects filtered by the fec_fin column
 * @method     ChildHbfTurnos[]|ObjectCollection findByHorarioDesde(string $horario_desde) Return ChildHbfTurnos objects filtered by the horario_desde column
 * @method     ChildHbfTurnos[]|ObjectCollection findByHorarioHasta(string $horario_hasta) Return ChildHbfTurnos objects filtered by the horario_hasta column
 * @method     ChildHbfTurnos[]|ObjectCollection findByTotalConsumos(int $total_consumos) Return ChildHbfTurnos objects filtered by the total_consumos column
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdOpcionTurnos(int $id_opcion_turnos) Return ChildHbfTurnos objects filtered by the id_opcion_turnos column
 * @method     ChildHbfTurnos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfTurnos objects filtered by the change_count column
 * @method     ChildHbfTurnos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfTurnos objects filtered by the estado column
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfTurnos objects filtered by the id_user_modified column
 * @method     ChildHbfTurnos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfTurnos objects filtered by the id_user_created column
 * @method     ChildHbfTurnos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfTurnos objects filtered by the date_modified column
 * @method     ChildHbfTurnos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfTurnos objects filtered by the date_created column
 * @method     ChildHbfTurnos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfTurnosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfTurnosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfTurnos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfTurnosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfTurnosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfTurnosQuery) {
            return $criteria;
        }
        $query = new ChildHbfTurnosQuery();
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
     * @return ChildHbfTurnos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfTurnosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfTurnos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_turno, id_club, id_asociado, descripcion, fec_inicio, fec_fin, horario_desde, horario_hasta, total_consumos, id_opcion_turnos, change_count, estado, id_user_modified, id_user_created, date_modified, date_created FROM hbf_turnos WHERE id_turno = :p0';
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
            /** @var ChildHbfTurnos $obj */
            $obj = new ChildHbfTurnos();
            $obj->hydrate($row);
            HbfTurnosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfTurnos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $keys, Criteria::IN);
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
     * @param     mixed $idTurno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $idTurno, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdAsociado($idAsociado = null, $comparison = null)
    {
        if (is_array($idAsociado)) {
            $useMinMax = false;
            if (isset($idAsociado['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_ASOCIADO, $idAsociado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAsociado['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_ASOCIADO, $idAsociado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_ASOCIADO, $idAsociado, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the fec_inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByFecInicio('2011-03-14'); // WHERE fec_inicio = '2011-03-14'
     * $query->filterByFecInicio('now'); // WHERE fec_inicio = '2011-03-14'
     * $query->filterByFecInicio(array('max' => 'yesterday')); // WHERE fec_inicio > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecInicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByFecInicio($fecInicio = null, $comparison = null)
    {
        if (is_array($fecInicio)) {
            $useMinMax = false;
            if (isset($fecInicio['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_INICIO, $fecInicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecInicio['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_INICIO, $fecInicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_INICIO, $fecInicio, $comparison);
    }

    /**
     * Filter the query on the fec_fin column
     *
     * Example usage:
     * <code>
     * $query->filterByFecFin('2011-03-14'); // WHERE fec_fin = '2011-03-14'
     * $query->filterByFecFin('now'); // WHERE fec_fin = '2011-03-14'
     * $query->filterByFecFin(array('max' => 'yesterday')); // WHERE fec_fin > '2011-03-13'
     * </code>
     *
     * @param     mixed $fecFin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByFecFin($fecFin = null, $comparison = null)
    {
        if (is_array($fecFin)) {
            $useMinMax = false;
            if (isset($fecFin['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_FIN, $fecFin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecFin['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_FIN, $fecFin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_FEC_FIN, $fecFin, $comparison);
    }

    /**
     * Filter the query on the horario_desde column
     *
     * Example usage:
     * <code>
     * $query->filterByHorarioDesde('2011-03-14'); // WHERE horario_desde = '2011-03-14'
     * $query->filterByHorarioDesde('now'); // WHERE horario_desde = '2011-03-14'
     * $query->filterByHorarioDesde(array('max' => 'yesterday')); // WHERE horario_desde > '2011-03-13'
     * </code>
     *
     * @param     mixed $horarioDesde The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHorarioDesde($horarioDesde = null, $comparison = null)
    {
        if (is_array($horarioDesde)) {
            $useMinMax = false;
            if (isset($horarioDesde['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_DESDE, $horarioDesde['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horarioDesde['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_DESDE, $horarioDesde['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_DESDE, $horarioDesde, $comparison);
    }

    /**
     * Filter the query on the horario_hasta column
     *
     * Example usage:
     * <code>
     * $query->filterByHorarioHasta('2011-03-14'); // WHERE horario_hasta = '2011-03-14'
     * $query->filterByHorarioHasta('now'); // WHERE horario_hasta = '2011-03-14'
     * $query->filterByHorarioHasta(array('max' => 'yesterday')); // WHERE horario_hasta > '2011-03-13'
     * </code>
     *
     * @param     mixed $horarioHasta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHorarioHasta($horarioHasta = null, $comparison = null)
    {
        if (is_array($horarioHasta)) {
            $useMinMax = false;
            if (isset($horarioHasta['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_HASTA, $horarioHasta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horarioHasta['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_HASTA, $horarioHasta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_HORARIO_HASTA, $horarioHasta, $comparison);
    }

    /**
     * Filter the query on the total_consumos column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalConsumos(1234); // WHERE total_consumos = 1234
     * $query->filterByTotalConsumos(array(12, 34)); // WHERE total_consumos IN (12, 34)
     * $query->filterByTotalConsumos(array('min' => 12)); // WHERE total_consumos > 12
     * </code>
     *
     * @param     mixed $totalConsumos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByTotalConsumos($totalConsumos = null, $comparison = null)
    {
        if (is_array($totalConsumos)) {
            $useMinMax = false;
            if (isset($totalConsumos['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_TOTAL_CONSUMOS, $totalConsumos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalConsumos['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_TOTAL_CONSUMOS, $totalConsumos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_TOTAL_CONSUMOS, $totalConsumos, $comparison);
    }

    /**
     * Filter the query on the id_opcion_turnos column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionTurnos(1234); // WHERE id_opcion_turnos = 1234
     * $query->filterByIdOpcionTurnos(array(12, 34)); // WHERE id_opcion_turnos IN (12, 34)
     * $query->filterByIdOpcionTurnos(array('min' => 12)); // WHERE id_opcion_turnos > 12
     * </code>
     *
     * @see       filterByCiOptions()
     *
     * @param     mixed $idOpcionTurnos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdOpcionTurnos($idOpcionTurnos = null, $comparison = null)
    {
        if (is_array($idOpcionTurnos)) {
            $useMinMax = false;
            if (isset($idOpcionTurnos['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $idOpcionTurnos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionTurnos['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $idOpcionTurnos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $idOpcionTurnos, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfTurnosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_ASOCIADO, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_ASOCIADO, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfClubs($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByCiOptions($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_OPCION_TURNOS, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdTurno($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $ciUsuarios->getIdTurno(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdTurnoQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdTurno() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdTurno relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdTurno($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdTurno');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdTurno');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdTurno relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdTurnoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdTurno($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdTurno', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfComandas->getIdTurno(), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfEgresos($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfEgresos->getIdTurno(), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfPrepagos->getIdTurno(), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfSesiones->getIdTurno(), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function filterByHbfVentas($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfVentas->getIdTurno(), $comparison);
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
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
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
     * @param   ChildHbfTurnos $hbfTurnos Object to remove from the list of results
     *
     * @return $this|ChildHbfTurnosQuery The current query, for fluid interface
     */
    public function prune($hbfTurnos = null)
    {
        if ($hbfTurnos) {
            $this->addUsingAlias(HbfTurnosTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_turnos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfTurnosTableMap::clearInstancePool();
            HbfTurnosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfTurnosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfTurnosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfTurnosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfTurnosQuery
