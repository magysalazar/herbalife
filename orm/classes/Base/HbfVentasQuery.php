<?php

namespace Base;

use \HbfVentas as ChildHbfVentas;
use \HbfVentasQuery as ChildHbfVentasQuery;
use \Exception;
use \PDO;
use Map\HbfVentasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_ventas' table.
 *
 *
 *
 * @method     ChildHbfVentasQuery orderByIdVenta($order = Criteria::ASC) Order by the id_venta column
 * @method     ChildHbfVentasQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfVentasQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfVentasQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildHbfVentasQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildHbfVentasQuery orderByFechaVenta($order = Criteria::ASC) Order by the fecha_venta column
 * @method     ChildHbfVentasQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfVentasQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ChildHbfVentasQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ChildHbfVentasQuery orderByACuenta($order = Criteria::ASC) Order by the a_cuenta column
 * @method     ChildHbfVentasQuery orderBySaldo($order = Criteria::ASC) Order by the saldo column
 * @method     ChildHbfVentasQuery orderByEntregado($order = Criteria::ASC) Order by the entregado column
 * @method     ChildHbfVentasQuery orderByPagado($order = Criteria::ASC) Order by the pagado column
 * @method     ChildHbfVentasQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfVentasQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfVentasQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfVentasQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfVentasQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfVentasQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfVentasQuery groupByIdVenta() Group by the id_venta column
 * @method     ChildHbfVentasQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfVentasQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfVentasQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildHbfVentasQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildHbfVentasQuery groupByFechaVenta() Group by the fecha_venta column
 * @method     ChildHbfVentasQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfVentasQuery groupByPrecio() Group by the precio column
 * @method     ChildHbfVentasQuery groupByObservaciones() Group by the observaciones column
 * @method     ChildHbfVentasQuery groupByACuenta() Group by the a_cuenta column
 * @method     ChildHbfVentasQuery groupBySaldo() Group by the saldo column
 * @method     ChildHbfVentasQuery groupByEntregado() Group by the entregado column
 * @method     ChildHbfVentasQuery groupByPagado() Group by the pagado column
 * @method     ChildHbfVentasQuery groupByEstado() Group by the estado column
 * @method     ChildHbfVentasQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfVentasQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfVentasQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfVentasQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfVentasQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfVentasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfVentasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfVentasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfVentasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfVentasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfVentasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfVentasQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVentasQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVentasQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVentasQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVentasQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVentasQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVentasQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVentasQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVentasQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVentasQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVentasQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVentasQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVentasQuery leftJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfVentasQuery rightJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfVentasQuery innerJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfVentasQuery joinWithCiUsuariosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithCiUsuariosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfVentasQuery rightJoinWithCiUsuariosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfVentasQuery innerJoinWithCiUsuariosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfVentasQuery leftJoinHbfClubs($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfVentasQuery rightJoinHbfClubs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfVentasQuery innerJoinHbfClubs($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubs relation
 *
 * @method     ChildHbfVentasQuery joinWithHbfClubs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithHbfClubs() Adds a LEFT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfVentasQuery rightJoinWithHbfClubs() Adds a RIGHT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfVentasQuery innerJoinWithHbfClubs() Adds a INNER JOIN clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfVentasQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfVentasQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfVentasQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfVentasQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfVentasQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfVentasQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfVentasQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfVentasQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfVentasQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfVentasQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfVentasQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfVentasQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfVentasQuery leftJoinHbfProductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfVentasQuery rightJoinHbfProductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfVentasQuery innerJoinHbfProductos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductos relation
 *
 * @method     ChildHbfVentasQuery joinWithHbfProductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfVentasQuery leftJoinWithHbfProductos() Adds a LEFT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfVentasQuery rightJoinWithHbfProductos() Adds a RIGHT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfVentasQuery innerJoinWithHbfProductos() Adds a INNER JOIN clause and with to the query using the HbfProductos relation
 *
 * @method     \CiUsuariosQuery|\HbfClubsQuery|\HbfTurnosQuery|\HbfSesionesQuery|\HbfProductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfVentas findOne(ConnectionInterface $con = null) Return the first ChildHbfVentas matching the query
 * @method     ChildHbfVentas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfVentas matching the query, or a new ChildHbfVentas object populated from the query conditions when no match is found
 *
 * @method     ChildHbfVentas findOneByIdVenta(int $id_venta) Return the first ChildHbfVentas filtered by the id_venta column
 * @method     ChildHbfVentas findOneByIdClub(int $id_club) Return the first ChildHbfVentas filtered by the id_club column
 * @method     ChildHbfVentas findOneByIdTurno(int $id_turno) Return the first ChildHbfVentas filtered by the id_turno column
 * @method     ChildHbfVentas findOneByIdSesion(int $id_sesion) Return the first ChildHbfVentas filtered by the id_sesion column
 * @method     ChildHbfVentas findOneByIdCliente(int $id_cliente) Return the first ChildHbfVentas filtered by the id_cliente column
 * @method     ChildHbfVentas findOneByFechaVenta(string $fecha_venta) Return the first ChildHbfVentas filtered by the fecha_venta column
 * @method     ChildHbfVentas findOneByIdProducto(int $id_producto) Return the first ChildHbfVentas filtered by the id_producto column
 * @method     ChildHbfVentas findOneByPrecio(string $precio) Return the first ChildHbfVentas filtered by the precio column
 * @method     ChildHbfVentas findOneByObservaciones(string $observaciones) Return the first ChildHbfVentas filtered by the observaciones column
 * @method     ChildHbfVentas findOneByACuenta(string $a_cuenta) Return the first ChildHbfVentas filtered by the a_cuenta column
 * @method     ChildHbfVentas findOneBySaldo(string $saldo) Return the first ChildHbfVentas filtered by the saldo column
 * @method     ChildHbfVentas findOneByEntregado(string $entregado) Return the first ChildHbfVentas filtered by the entregado column
 * @method     ChildHbfVentas findOneByPagado(string $pagado) Return the first ChildHbfVentas filtered by the pagado column
 * @method     ChildHbfVentas findOneByEstado(string $estado) Return the first ChildHbfVentas filtered by the estado column
 * @method     ChildHbfVentas findOneByChangeCount(int $change_count) Return the first ChildHbfVentas filtered by the change_count column
 * @method     ChildHbfVentas findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfVentas filtered by the id_user_modified column
 * @method     ChildHbfVentas findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfVentas filtered by the id_user_created column
 * @method     ChildHbfVentas findOneByDateModified(int $date_modified) Return the first ChildHbfVentas filtered by the date_modified column
 * @method     ChildHbfVentas findOneByDateCreated(int $date_created) Return the first ChildHbfVentas filtered by the date_created column *

 * @method     ChildHbfVentas requirePk($key, ConnectionInterface $con = null) Return the ChildHbfVentas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOne(ConnectionInterface $con = null) Return the first ChildHbfVentas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfVentas requireOneByIdVenta(int $id_venta) Return the first ChildHbfVentas filtered by the id_venta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdClub(int $id_club) Return the first ChildHbfVentas filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdTurno(int $id_turno) Return the first ChildHbfVentas filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdSesion(int $id_sesion) Return the first ChildHbfVentas filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdCliente(int $id_cliente) Return the first ChildHbfVentas filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByFechaVenta(string $fecha_venta) Return the first ChildHbfVentas filtered by the fecha_venta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdProducto(int $id_producto) Return the first ChildHbfVentas filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByPrecio(string $precio) Return the first ChildHbfVentas filtered by the precio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByObservaciones(string $observaciones) Return the first ChildHbfVentas filtered by the observaciones column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByACuenta(string $a_cuenta) Return the first ChildHbfVentas filtered by the a_cuenta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneBySaldo(string $saldo) Return the first ChildHbfVentas filtered by the saldo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByEntregado(string $entregado) Return the first ChildHbfVentas filtered by the entregado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByPagado(string $pagado) Return the first ChildHbfVentas filtered by the pagado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByEstado(string $estado) Return the first ChildHbfVentas filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByChangeCount(int $change_count) Return the first ChildHbfVentas filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfVentas filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfVentas filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByDateModified(int $date_modified) Return the first ChildHbfVentas filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVentas requireOneByDateCreated(int $date_created) Return the first ChildHbfVentas filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfVentas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfVentas objects based on current ModelCriteria
 * @method     ChildHbfVentas[]|ObjectCollection findByIdVenta(int $id_venta) Return ChildHbfVentas objects filtered by the id_venta column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfVentas objects filtered by the id_club column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfVentas objects filtered by the id_turno column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildHbfVentas objects filtered by the id_sesion column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildHbfVentas objects filtered by the id_cliente column
 * @method     ChildHbfVentas[]|ObjectCollection findByFechaVenta(string $fecha_venta) Return ChildHbfVentas objects filtered by the fecha_venta column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfVentas objects filtered by the id_producto column
 * @method     ChildHbfVentas[]|ObjectCollection findByPrecio(string $precio) Return ChildHbfVentas objects filtered by the precio column
 * @method     ChildHbfVentas[]|ObjectCollection findByObservaciones(string $observaciones) Return ChildHbfVentas objects filtered by the observaciones column
 * @method     ChildHbfVentas[]|ObjectCollection findByACuenta(string $a_cuenta) Return ChildHbfVentas objects filtered by the a_cuenta column
 * @method     ChildHbfVentas[]|ObjectCollection findBySaldo(string $saldo) Return ChildHbfVentas objects filtered by the saldo column
 * @method     ChildHbfVentas[]|ObjectCollection findByEntregado(string $entregado) Return ChildHbfVentas objects filtered by the entregado column
 * @method     ChildHbfVentas[]|ObjectCollection findByPagado(string $pagado) Return ChildHbfVentas objects filtered by the pagado column
 * @method     ChildHbfVentas[]|ObjectCollection findByEstado(string $estado) Return ChildHbfVentas objects filtered by the estado column
 * @method     ChildHbfVentas[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfVentas objects filtered by the change_count column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfVentas objects filtered by the id_user_modified column
 * @method     ChildHbfVentas[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfVentas objects filtered by the id_user_created column
 * @method     ChildHbfVentas[]|ObjectCollection findByDateModified(int $date_modified) Return ChildHbfVentas objects filtered by the date_modified column
 * @method     ChildHbfVentas[]|ObjectCollection findByDateCreated(int $date_created) Return ChildHbfVentas objects filtered by the date_created column
 * @method     ChildHbfVentas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfVentasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfVentasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfVentas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfVentasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfVentasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfVentasQuery) {
            return $criteria;
        }
        $query = new ChildHbfVentasQuery();
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
     * @return ChildHbfVentas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfVentasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfVentas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_venta, id_club, id_turno, id_sesion, id_cliente, fecha_venta, id_producto, precio, observaciones, a_cuenta, saldo, entregado, pagado, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_ventas WHERE id_venta = :p0';
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
            /** @var ChildHbfVentas $obj */
            $obj = new ChildHbfVentas();
            $obj->hydrate($row);
            HbfVentasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfVentas|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVenta(1234); // WHERE id_venta = 1234
     * $query->filterByIdVenta(array(12, 34)); // WHERE id_venta IN (12, 34)
     * $query->filterByIdVenta(array('min' => 12)); // WHERE id_venta > 12
     * </code>
     *
     * @param     mixed $idVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdVenta($idVenta = null, $comparison = null)
    {
        if (is_array($idVenta)) {
            $useMinMax = false;
            if (isset($idVenta['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $idVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVenta['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $idVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $idVenta, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_TURNO, $idTurno, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_SESION, $idSesion, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
    }

    /**
     * Filter the query on the fecha_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaVenta('2011-03-14'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta('now'); // WHERE fecha_venta = '2011-03-14'
     * $query->filterByFechaVenta(array('max' => 'yesterday')); // WHERE fecha_venta > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaVenta The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByFechaVenta($fechaVenta = null, $comparison = null)
    {
        if (is_array($fechaVenta)) {
            $useMinMax = false;
            if (isset($fechaVenta['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_FECHA_VENTA, $fechaVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaVenta['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_FECHA_VENTA, $fechaVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_FECHA_VENTA, $fechaVenta, $comparison);
    }

    /**
     * Filter the query on the id_producto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProducto(1234); // WHERE id_producto = 1234
     * $query->filterByIdProducto(array(12, 34)); // WHERE id_producto IN (12, 34)
     * $query->filterByIdProducto(array('min' => 12)); // WHERE id_producto > 12
     * </code>
     *
     * @see       filterByHbfProductos()
     *
     * @param     mixed $idProducto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_PRECIO, $precio, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByObservaciones($observaciones = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($observaciones)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_OBSERVACIONES, $observaciones, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByACuenta($aCuenta = null, $comparison = null)
    {
        if (is_array($aCuenta)) {
            $useMinMax = false;
            if (isset($aCuenta['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_A_CUENTA, $aCuenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aCuenta['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_A_CUENTA, $aCuenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_A_CUENTA, $aCuenta, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterBySaldo($saldo = null, $comparison = null)
    {
        if (is_array($saldo)) {
            $useMinMax = false;
            if (isset($saldo['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_SALDO, $saldo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saldo['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_SALDO, $saldo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_SALDO, $saldo, $comparison);
    }

    /**
     * Filter the query on the entregado column
     *
     * Example usage:
     * <code>
     * $query->filterByEntregado('fooValue');   // WHERE entregado = 'fooValue'
     * $query->filterByEntregado('%fooValue%', Criteria::LIKE); // WHERE entregado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $entregado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByEntregado($entregado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($entregado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ENTREGADO, $entregado, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByPagado($pagado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pagado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_PAGADO, $pagado, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified(1234); // WHERE date_modified = 1234
     * $query->filterByDateModified(array(12, 34)); // WHERE date_modified IN (12, 34)
     * $query->filterByDateModified(array('min' => 12)); // WHERE date_modified > 12
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Filter the query on the date_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreated(1234); // WHERE date_created = 1234
     * $query->filterByDateCreated(array(12, 34)); // WHERE date_created IN (12, 34)
     * $query->filterByDateCreated(array('min' => 12)); // WHERE date_created > 12
     * </code>
     *
     * @param     mixed $dateCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfVentasTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVentasTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
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
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
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
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdCliente($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_CLIENTE, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_CLIENTE, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByHbfClubs($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function joinHbfClubs($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useHbfClubsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
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
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVentasQuery The current query, for fluid interface
     */
    public function filterByHbfProductos($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVentasTableMap::COL_ID_PRODUCTO, $hbfProductos->toKeyValue('PrimaryKey', 'IdProducto'), $comparison);
        } else {
            throw new PropelException('filterByHbfProductos() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function joinHbfProductos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductos');

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
            $this->addJoinObject($join, 'HbfProductos');
        }

        return $this;
    }

    /**
     * Use the HbfProductos relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfProductos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductos', '\HbfProductosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfVentas $hbfVentas Object to remove from the list of results
     *
     * @return $this|ChildHbfVentasQuery The current query, for fluid interface
     */
    public function prune($hbfVentas = null)
    {
        if ($hbfVentas) {
            $this->addUsingAlias(HbfVentasTableMap::COL_ID_VENTA, $hbfVentas->getIdVenta(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_ventas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfVentasTableMap::clearInstancePool();
            HbfVentasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfVentasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfVentasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfVentasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfVentasQuery
