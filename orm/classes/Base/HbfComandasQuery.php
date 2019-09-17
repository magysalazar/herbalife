<?php

namespace Base;

use \HbfComandas as ChildHbfComandas;
use \HbfComandasQuery as ChildHbfComandasQuery;
use \Exception;
use \PDO;
use Map\HbfComandasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_comandas' table.
 *
 *
 *
 * @method     ChildHbfComandasQuery orderByIdComanda($order = Criteria::ASC) Order by the id_comanda column
 * @method     ChildHbfComandasQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfComandasQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfComandasQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildHbfComandasQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildHbfComandasQuery orderByIdsVasos($order = Criteria::ASC) Order by the ids_vasos column
 * @method     ChildHbfComandasQuery orderByImporte($order = Criteria::ASC) Order by the importe column
 * @method     ChildHbfComandasQuery orderByACuenta($order = Criteria::ASC) Order by the a_cuenta column
 * @method     ChildHbfComandasQuery orderBySaldo($order = Criteria::ASC) Order by the saldo column
 * @method     ChildHbfComandasQuery orderByPrioridad($order = Criteria::ASC) Order by the prioridad column
 * @method     ChildHbfComandasQuery orderByHoraEntrega($order = Criteria::ASC) Order by the hora_entrega column
 * @method     ChildHbfComandasQuery orderByTipoConsumo($order = Criteria::ASC) Order by the tipo_consumo column
 * @method     ChildHbfComandasQuery orderByComentarios($order = Criteria::ASC) Order by the comentarios column
 * @method     ChildHbfComandasQuery orderByIdFichaPrepago($order = Criteria::ASC) Order by the id_ficha_prepago column
 * @method     ChildHbfComandasQuery orderByPagado($order = Criteria::ASC) Order by the pagado column
 * @method     ChildHbfComandasQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfComandasQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfComandasQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfComandasQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfComandasQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfComandasQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfComandasQuery groupByIdComanda() Group by the id_comanda column
 * @method     ChildHbfComandasQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfComandasQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfComandasQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildHbfComandasQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildHbfComandasQuery groupByIdsVasos() Group by the ids_vasos column
 * @method     ChildHbfComandasQuery groupByImporte() Group by the importe column
 * @method     ChildHbfComandasQuery groupByACuenta() Group by the a_cuenta column
 * @method     ChildHbfComandasQuery groupBySaldo() Group by the saldo column
 * @method     ChildHbfComandasQuery groupByPrioridad() Group by the prioridad column
 * @method     ChildHbfComandasQuery groupByHoraEntrega() Group by the hora_entrega column
 * @method     ChildHbfComandasQuery groupByTipoConsumo() Group by the tipo_consumo column
 * @method     ChildHbfComandasQuery groupByComentarios() Group by the comentarios column
 * @method     ChildHbfComandasQuery groupByIdFichaPrepago() Group by the id_ficha_prepago column
 * @method     ChildHbfComandasQuery groupByPagado() Group by the pagado column
 * @method     ChildHbfComandasQuery groupByEstado() Group by the estado column
 * @method     ChildHbfComandasQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfComandasQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfComandasQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfComandasQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfComandasQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfComandasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfComandasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfComandasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfComandasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfComandasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfComandasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfComandasQuery leftJoinHbfClubs($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfComandasQuery rightJoinHbfClubs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfComandasQuery innerJoinHbfClubs($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubs relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfClubs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfClubs() Adds a LEFT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfClubs() Adds a RIGHT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfClubs() Adds a INNER JOIN clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfComandasQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfComandasQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfComandasQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfComandasQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfComandasQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfComandasQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfComandasQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfComandasQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfComandasQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfComandasQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfComandasQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfComandasQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfComandasQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfComandasQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfComandasQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfComandasQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfComandasQuery leftJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfComandasQuery rightJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfComandasQuery innerJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfComandasQuery joinWithCiUsuariosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithCiUsuariosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfComandasQuery rightJoinWithCiUsuariosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfComandasQuery innerJoinWithCiUsuariosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfComandasQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfComandasQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfDetallesPedidos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfComandasQuery rightJoinHbfDetallesPedidos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfComandasQuery innerJoinHbfDetallesPedidos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfDetallesPedidos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfDetallesPedidos() Adds a LEFT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfDetallesPedidos() Adds a RIGHT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfDetallesPedidos() Adds a INNER JOIN clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfIngresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfComandasQuery rightJoinHbfIngresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfComandasQuery innerJoinHbfIngresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresos relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfIngresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresos relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfIngresos() Adds a LEFT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfIngresos() Adds a RIGHT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfIngresos() Adds a INNER JOIN clause and with to the query using the HbfIngresos relation
 *
 * @method     ChildHbfComandasQuery leftJoinHbfVasos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfComandasQuery rightJoinHbfVasos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfComandasQuery innerJoinHbfVasos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasos relation
 *
 * @method     ChildHbfComandasQuery joinWithHbfVasos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfComandasQuery leftJoinWithHbfVasos() Adds a LEFT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfComandasQuery rightJoinWithHbfVasos() Adds a RIGHT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfComandasQuery innerJoinWithHbfVasos() Adds a INNER JOIN clause and with to the query using the HbfVasos relation
 *
 * @method     \HbfClubsQuery|\HbfTurnosQuery|\HbfSesionesQuery|\CiUsuariosQuery|\HbfPrepagosQuery|\HbfDetallesPedidosQuery|\HbfIngresosQuery|\HbfVasosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfComandas findOne(ConnectionInterface $con = null) Return the first ChildHbfComandas matching the query
 * @method     ChildHbfComandas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfComandas matching the query, or a new ChildHbfComandas object populated from the query conditions when no match is found
 *
 * @method     ChildHbfComandas findOneByIdComanda(int $id_comanda) Return the first ChildHbfComandas filtered by the id_comanda column
 * @method     ChildHbfComandas findOneByIdClub(int $id_club) Return the first ChildHbfComandas filtered by the id_club column
 * @method     ChildHbfComandas findOneByIdTurno(int $id_turno) Return the first ChildHbfComandas filtered by the id_turno column
 * @method     ChildHbfComandas findOneByIdSesion(int $id_sesion) Return the first ChildHbfComandas filtered by the id_sesion column
 * @method     ChildHbfComandas findOneByIdCliente(int $id_cliente) Return the first ChildHbfComandas filtered by the id_cliente column
 * @method     ChildHbfComandas findOneByIdsVasos(string $ids_vasos) Return the first ChildHbfComandas filtered by the ids_vasos column
 * @method     ChildHbfComandas findOneByImporte(string $importe) Return the first ChildHbfComandas filtered by the importe column
 * @method     ChildHbfComandas findOneByACuenta(string $a_cuenta) Return the first ChildHbfComandas filtered by the a_cuenta column
 * @method     ChildHbfComandas findOneBySaldo(string $saldo) Return the first ChildHbfComandas filtered by the saldo column
 * @method     ChildHbfComandas findOneByPrioridad(string $prioridad) Return the first ChildHbfComandas filtered by the prioridad column
 * @method     ChildHbfComandas findOneByHoraEntrega(string $hora_entrega) Return the first ChildHbfComandas filtered by the hora_entrega column
 * @method     ChildHbfComandas findOneByTipoConsumo(string $tipo_consumo) Return the first ChildHbfComandas filtered by the tipo_consumo column
 * @method     ChildHbfComandas findOneByComentarios(string $comentarios) Return the first ChildHbfComandas filtered by the comentarios column
 * @method     ChildHbfComandas findOneByIdFichaPrepago(int $id_ficha_prepago) Return the first ChildHbfComandas filtered by the id_ficha_prepago column
 * @method     ChildHbfComandas findOneByPagado(string $pagado) Return the first ChildHbfComandas filtered by the pagado column
 * @method     ChildHbfComandas findOneByEstado(string $estado) Return the first ChildHbfComandas filtered by the estado column
 * @method     ChildHbfComandas findOneByChangeCount(int $change_count) Return the first ChildHbfComandas filtered by the change_count column
 * @method     ChildHbfComandas findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfComandas filtered by the id_user_modified column
 * @method     ChildHbfComandas findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfComandas filtered by the id_user_created column
 * @method     ChildHbfComandas findOneByDateModified(string $date_modified) Return the first ChildHbfComandas filtered by the date_modified column
 * @method     ChildHbfComandas findOneByDateCreated(string $date_created) Return the first ChildHbfComandas filtered by the date_created column *

 * @method     ChildHbfComandas requirePk($key, ConnectionInterface $con = null) Return the ChildHbfComandas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOne(ConnectionInterface $con = null) Return the first ChildHbfComandas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfComandas requireOneByIdComanda(int $id_comanda) Return the first ChildHbfComandas filtered by the id_comanda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdClub(int $id_club) Return the first ChildHbfComandas filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdTurno(int $id_turno) Return the first ChildHbfComandas filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdSesion(int $id_sesion) Return the first ChildHbfComandas filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdCliente(int $id_cliente) Return the first ChildHbfComandas filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdsVasos(string $ids_vasos) Return the first ChildHbfComandas filtered by the ids_vasos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByImporte(string $importe) Return the first ChildHbfComandas filtered by the importe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByACuenta(string $a_cuenta) Return the first ChildHbfComandas filtered by the a_cuenta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneBySaldo(string $saldo) Return the first ChildHbfComandas filtered by the saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByPrioridad(string $prioridad) Return the first ChildHbfComandas filtered by the prioridad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByHoraEntrega(string $hora_entrega) Return the first ChildHbfComandas filtered by the hora_entrega column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByTipoConsumo(string $tipo_consumo) Return the first ChildHbfComandas filtered by the tipo_consumo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByComentarios(string $comentarios) Return the first ChildHbfComandas filtered by the comentarios column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdFichaPrepago(int $id_ficha_prepago) Return the first ChildHbfComandas filtered by the id_ficha_prepago column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByPagado(string $pagado) Return the first ChildHbfComandas filtered by the pagado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByEstado(string $estado) Return the first ChildHbfComandas filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByChangeCount(int $change_count) Return the first ChildHbfComandas filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfComandas filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfComandas filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByDateModified(string $date_modified) Return the first ChildHbfComandas filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfComandas requireOneByDateCreated(string $date_created) Return the first ChildHbfComandas filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfComandas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfComandas objects based on current ModelCriteria
 * @method     ChildHbfComandas[]|ObjectCollection findByIdComanda(int $id_comanda) Return ChildHbfComandas objects filtered by the id_comanda column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfComandas objects filtered by the id_club column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfComandas objects filtered by the id_turno column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildHbfComandas objects filtered by the id_sesion column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildHbfComandas objects filtered by the id_cliente column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdsVasos(string $ids_vasos) Return ChildHbfComandas objects filtered by the ids_vasos column
 * @method     ChildHbfComandas[]|ObjectCollection findByImporte(string $importe) Return ChildHbfComandas objects filtered by the importe column
 * @method     ChildHbfComandas[]|ObjectCollection findByACuenta(string $a_cuenta) Return ChildHbfComandas objects filtered by the a_cuenta column
 * @method     ChildHbfComandas[]|ObjectCollection findBySaldo(string $saldo) Return ChildHbfComandas objects filtered by the saldo column
 * @method     ChildHbfComandas[]|ObjectCollection findByPrioridad(string $prioridad) Return ChildHbfComandas objects filtered by the prioridad column
 * @method     ChildHbfComandas[]|ObjectCollection findByHoraEntrega(string $hora_entrega) Return ChildHbfComandas objects filtered by the hora_entrega column
 * @method     ChildHbfComandas[]|ObjectCollection findByTipoConsumo(string $tipo_consumo) Return ChildHbfComandas objects filtered by the tipo_consumo column
 * @method     ChildHbfComandas[]|ObjectCollection findByComentarios(string $comentarios) Return ChildHbfComandas objects filtered by the comentarios column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdFichaPrepago(int $id_ficha_prepago) Return ChildHbfComandas objects filtered by the id_ficha_prepago column
 * @method     ChildHbfComandas[]|ObjectCollection findByPagado(string $pagado) Return ChildHbfComandas objects filtered by the pagado column
 * @method     ChildHbfComandas[]|ObjectCollection findByEstado(string $estado) Return ChildHbfComandas objects filtered by the estado column
 * @method     ChildHbfComandas[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfComandas objects filtered by the change_count column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfComandas objects filtered by the id_user_modified column
 * @method     ChildHbfComandas[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfComandas objects filtered by the id_user_created column
 * @method     ChildHbfComandas[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfComandas objects filtered by the date_modified column
 * @method     ChildHbfComandas[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfComandas objects filtered by the date_created column
 * @method     ChildHbfComandas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfComandasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfComandasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfComandas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfComandasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfComandasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfComandasQuery) {
            return $criteria;
        }
        $query = new ChildHbfComandasQuery();
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
     * @return ChildHbfComandas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfComandasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfComandas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_comanda, id_club, id_turno, id_sesion, id_cliente, ids_vasos, importe, a_cuenta, saldo, prioridad, hora_entrega, tipo_consumo, comentarios, id_ficha_prepago, pagado, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_comandas WHERE id_comanda = :p0';
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
            /** @var ChildHbfComandas $obj */
            $obj = new ChildHbfComandas();
            $obj->hydrate($row);
            HbfComandasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfComandas|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_comanda column
     *
     * Example usage:
     * <code>
     * $query->filterByIdComanda(1234); // WHERE id_comanda = 1234
     * $query->filterByIdComanda(array(12, 34)); // WHERE id_comanda IN (12, 34)
     * $query->filterByIdComanda(array('min' => 12)); // WHERE id_comanda > 12
     * </code>
     *
     * @param     mixed $idComanda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdComanda($idComanda = null, $comparison = null)
    {
        if (is_array($idComanda)) {
            $useMinMax = false;
            if (isset($idComanda['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $idComanda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComanda['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $idComanda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $idComanda, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_TURNO, $idTurno, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_SESION, $idSesion, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
    }

    /**
     * Filter the query on the ids_vasos column
     *
     * Example usage:
     * <code>
     * $query->filterByIdsVasos('fooValue');   // WHERE ids_vasos = 'fooValue'
     * $query->filterByIdsVasos('%fooValue%', Criteria::LIKE); // WHERE ids_vasos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idsVasos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdsVasos($idsVasos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idsVasos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_IDS_VASOS, $idsVasos, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByImporte($importe = null, $comparison = null)
    {
        if (is_array($importe)) {
            $useMinMax = false;
            if (isset($importe['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_IMPORTE, $importe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($importe['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_IMPORTE, $importe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_IMPORTE, $importe, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByACuenta($aCuenta = null, $comparison = null)
    {
        if (is_array($aCuenta)) {
            $useMinMax = false;
            if (isset($aCuenta['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_A_CUENTA, $aCuenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aCuenta['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_A_CUENTA, $aCuenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_A_CUENTA, $aCuenta, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterBySaldo($saldo = null, $comparison = null)
    {
        if (is_array($saldo)) {
            $useMinMax = false;
            if (isset($saldo['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_SALDO, $saldo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldo['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_SALDO, $saldo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_SALDO, $saldo, $comparison);
    }

    /**
     * Filter the query on the prioridad column
     *
     * Example usage:
     * <code>
     * $query->filterByPrioridad('fooValue');   // WHERE prioridad = 'fooValue'
     * $query->filterByPrioridad('%fooValue%', Criteria::LIKE); // WHERE prioridad LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prioridad The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByPrioridad($prioridad = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prioridad)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_PRIORIDAD, $prioridad, $comparison);
    }

    /**
     * Filter the query on the hora_entrega column
     *
     * Example usage:
     * <code>
     * $query->filterByHoraEntrega('2011-03-14'); // WHERE hora_entrega = '2011-03-14'
     * $query->filterByHoraEntrega('now'); // WHERE hora_entrega = '2011-03-14'
     * $query->filterByHoraEntrega(array('max' => 'yesterday')); // WHERE hora_entrega > '2011-03-13'
     * </code>
     *
     * @param     mixed $horaEntrega The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHoraEntrega($horaEntrega = null, $comparison = null)
    {
        if (is_array($horaEntrega)) {
            $useMinMax = false;
            if (isset($horaEntrega['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_HORA_ENTREGA, $horaEntrega['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($horaEntrega['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_HORA_ENTREGA, $horaEntrega['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_HORA_ENTREGA, $horaEntrega, $comparison);
    }

    /**
     * Filter the query on the tipo_consumo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoConsumo('fooValue');   // WHERE tipo_consumo = 'fooValue'
     * $query->filterByTipoConsumo('%fooValue%', Criteria::LIKE); // WHERE tipo_consumo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipoConsumo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByTipoConsumo($tipoConsumo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipoConsumo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_TIPO_CONSUMO, $tipoConsumo, $comparison);
    }

    /**
     * Filter the query on the comentarios column
     *
     * Example usage:
     * <code>
     * $query->filterByComentarios('fooValue');   // WHERE comentarios = 'fooValue'
     * $query->filterByComentarios('%fooValue%', Criteria::LIKE); // WHERE comentarios LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comentarios The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByComentarios($comentarios = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comentarios)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_COMENTARIOS, $comentarios, $comparison);
    }

    /**
     * Filter the query on the id_ficha_prepago column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFichaPrepago(1234); // WHERE id_ficha_prepago = 1234
     * $query->filterByIdFichaPrepago(array(12, 34)); // WHERE id_ficha_prepago IN (12, 34)
     * $query->filterByIdFichaPrepago(array('min' => 12)); // WHERE id_ficha_prepago > 12
     * </code>
     *
     * @see       filterByHbfPrepagos()
     *
     * @param     mixed $idFichaPrepago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdFichaPrepago($idFichaPrepago = null, $comparison = null)
    {
        if (is_array($idFichaPrepago)) {
            $useMinMax = false;
            if (isset($idFichaPrepago['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $idFichaPrepago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFichaPrepago['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $idFichaPrepago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $idFichaPrepago, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByPagado($pagado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pagado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_PAGADO, $pagado, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfComandasTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfComandasTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfClubs($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdCliente($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_CLIENTE, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_CLIENTE, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useCiUsuariosRelatedByIdClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdCliente', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $hbfPrepagos->getIdPrepago(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_FICHA_PREPAGO, $hbfPrepagos->toKeyValue('PrimaryKey', 'IdPrepago'), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfDetallesPedidos object
     *
     * @param \HbfDetallesPedidos|ObjectCollection $hbfDetallesPedidos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfDetallesPedidos($hbfDetallesPedidos, $comparison = null)
    {
        if ($hbfDetallesPedidos instanceof \HbfDetallesPedidos) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $hbfDetallesPedidos->getIdComanda(), $comparison);
        } elseif ($hbfDetallesPedidos instanceof ObjectCollection) {
            return $this
                ->useHbfDetallesPedidosQuery()
                ->filterByPrimaryKeys($hbfDetallesPedidos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfDetallesPedidos() only accepts arguments of type \HbfDetallesPedidos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfDetallesPedidos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function joinHbfDetallesPedidos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfDetallesPedidos');

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
            $this->addJoinObject($join, 'HbfDetallesPedidos');
        }

        return $this;
    }

    /**
     * Use the HbfDetallesPedidos relation HbfDetallesPedidos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfDetallesPedidosQuery A secondary query class using the current class as primary query
     */
    public function useHbfDetallesPedidosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfDetallesPedidos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfDetallesPedidos', '\HbfDetallesPedidosQuery');
    }

    /**
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfIngresos($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $hbfIngresos->getIdComanda(), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfComandasQuery The current query, for fluid interface
     */
    public function filterByHbfVasos($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $hbfVasos->getIdComanda(), $comparison);
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
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
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
     * @param   ChildHbfComandas $hbfComandas Object to remove from the list of results
     *
     * @return $this|ChildHbfComandasQuery The current query, for fluid interface
     */
    public function prune($hbfComandas = null)
    {
        if ($hbfComandas) {
            $this->addUsingAlias(HbfComandasTableMap::COL_ID_COMANDA, $hbfComandas->getIdComanda(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_comandas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfComandasTableMap::clearInstancePool();
            HbfComandasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfComandasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfComandasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfComandasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfComandasQuery
