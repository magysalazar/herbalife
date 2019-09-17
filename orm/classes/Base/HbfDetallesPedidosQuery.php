<?php

namespace Base;

use \HbfDetallesPedidos as ChildHbfDetallesPedidos;
use \HbfDetallesPedidosQuery as ChildHbfDetallesPedidosQuery;
use \Exception;
use \PDO;
use Map\HbfDetallesPedidosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_detalles_pedidos' table.
 *
 *
 *
 * @method     ChildHbfDetallesPedidosQuery orderByIdDetallePedido($order = Criteria::ASC) Order by the id_detalle_pedido column
 * @method     ChildHbfDetallesPedidosQuery orderByIdComanda($order = Criteria::ASC) Order by the id_comanda column
 * @method     ChildHbfDetallesPedidosQuery orderByIdVaso($order = Criteria::ASC) Order by the id_vaso column
 * @method     ChildHbfDetallesPedidosQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfDetallesPedidosQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildHbfDetallesPedidosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfDetallesPedidosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfDetallesPedidosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfDetallesPedidosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfDetallesPedidosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfDetallesPedidosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfDetallesPedidosQuery groupByIdDetallePedido() Group by the id_detalle_pedido column
 * @method     ChildHbfDetallesPedidosQuery groupByIdComanda() Group by the id_comanda column
 * @method     ChildHbfDetallesPedidosQuery groupByIdVaso() Group by the id_vaso column
 * @method     ChildHbfDetallesPedidosQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfDetallesPedidosQuery groupByCantidad() Group by the cantidad column
 * @method     ChildHbfDetallesPedidosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfDetallesPedidosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfDetallesPedidosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfDetallesPedidosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfDetallesPedidosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfDetallesPedidosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfDetallesPedidosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfDetallesPedidosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfDetallesPedidosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfDetallesPedidosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesPedidosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesPedidosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinHbfProductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinHbfProductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinHbfProductos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesPedidosQuery joinWithHbfProductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWithHbfProductos() Adds a LEFT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinWithHbfProductos() Adds a RIGHT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinWithHbfProductos() Adds a INNER JOIN clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinHbfVasos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinHbfVasos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinHbfVasos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesPedidosQuery joinWithHbfVasos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWithHbfVasos() Adds a LEFT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinWithHbfVasos() Adds a RIGHT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinWithHbfVasos() Adds a INNER JOIN clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfDetallesPedidosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfDetallesPedidosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfDetallesPedidosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfDetallesPedidosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     \CiUsuariosQuery|\HbfProductosQuery|\HbfVasosQuery|\HbfComandasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfDetallesPedidos findOne(ConnectionInterface $con = null) Return the first ChildHbfDetallesPedidos matching the query
 * @method     ChildHbfDetallesPedidos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfDetallesPedidos matching the query, or a new ChildHbfDetallesPedidos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfDetallesPedidos findOneByIdDetallePedido(int $id_detalle_pedido) Return the first ChildHbfDetallesPedidos filtered by the id_detalle_pedido column
 * @method     ChildHbfDetallesPedidos findOneByIdComanda(int $id_comanda) Return the first ChildHbfDetallesPedidos filtered by the id_comanda column
 * @method     ChildHbfDetallesPedidos findOneByIdVaso(int $id_vaso) Return the first ChildHbfDetallesPedidos filtered by the id_vaso column
 * @method     ChildHbfDetallesPedidos findOneByIdProducto(int $id_producto) Return the first ChildHbfDetallesPedidos filtered by the id_producto column
 * @method     ChildHbfDetallesPedidos findOneByCantidad(int $cantidad) Return the first ChildHbfDetallesPedidos filtered by the cantidad column
 * @method     ChildHbfDetallesPedidos findOneByEstado(string $estado) Return the first ChildHbfDetallesPedidos filtered by the estado column
 * @method     ChildHbfDetallesPedidos findOneByChangeCount(int $change_count) Return the first ChildHbfDetallesPedidos filtered by the change_count column
 * @method     ChildHbfDetallesPedidos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfDetallesPedidos filtered by the id_user_modified column
 * @method     ChildHbfDetallesPedidos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfDetallesPedidos filtered by the id_user_created column
 * @method     ChildHbfDetallesPedidos findOneByDateModified(string $date_modified) Return the first ChildHbfDetallesPedidos filtered by the date_modified column
 * @method     ChildHbfDetallesPedidos findOneByDateCreated(string $date_created) Return the first ChildHbfDetallesPedidos filtered by the date_created column *

 * @method     ChildHbfDetallesPedidos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfDetallesPedidos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOne(ConnectionInterface $con = null) Return the first ChildHbfDetallesPedidos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfDetallesPedidos requireOneByIdDetallePedido(int $id_detalle_pedido) Return the first ChildHbfDetallesPedidos filtered by the id_detalle_pedido column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByIdComanda(int $id_comanda) Return the first ChildHbfDetallesPedidos filtered by the id_comanda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByIdVaso(int $id_vaso) Return the first ChildHbfDetallesPedidos filtered by the id_vaso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByIdProducto(int $id_producto) Return the first ChildHbfDetallesPedidos filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByCantidad(int $cantidad) Return the first ChildHbfDetallesPedidos filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByEstado(string $estado) Return the first ChildHbfDetallesPedidos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByChangeCount(int $change_count) Return the first ChildHbfDetallesPedidos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfDetallesPedidos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfDetallesPedidos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByDateModified(string $date_modified) Return the first ChildHbfDetallesPedidos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesPedidos requireOneByDateCreated(string $date_created) Return the first ChildHbfDetallesPedidos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfDetallesPedidos objects based on current ModelCriteria
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdDetallePedido(int $id_detalle_pedido) Return ChildHbfDetallesPedidos objects filtered by the id_detalle_pedido column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdComanda(int $id_comanda) Return ChildHbfDetallesPedidos objects filtered by the id_comanda column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdVaso(int $id_vaso) Return ChildHbfDetallesPedidos objects filtered by the id_vaso column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfDetallesPedidos objects filtered by the id_producto column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByCantidad(int $cantidad) Return ChildHbfDetallesPedidos objects filtered by the cantidad column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfDetallesPedidos objects filtered by the estado column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfDetallesPedidos objects filtered by the change_count column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfDetallesPedidos objects filtered by the id_user_modified column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfDetallesPedidos objects filtered by the id_user_created column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfDetallesPedidos objects filtered by the date_modified column
 * @method     ChildHbfDetallesPedidos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfDetallesPedidos objects filtered by the date_created column
 * @method     ChildHbfDetallesPedidos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfDetallesPedidosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfDetallesPedidosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfDetallesPedidos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfDetallesPedidosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfDetallesPedidosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfDetallesPedidosQuery) {
            return $criteria;
        }
        $query = new ChildHbfDetallesPedidosQuery();
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
     * @return ChildHbfDetallesPedidos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfDetallesPedidosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfDetallesPedidosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfDetallesPedidos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_detalle_pedido, id_comanda, id_vaso, id_producto, cantidad, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_detalles_pedidos WHERE id_detalle_pedido = :p0';
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
            /** @var ChildHbfDetallesPedidos $obj */
            $obj = new ChildHbfDetallesPedidos();
            $obj->hydrate($row);
            HbfDetallesPedidosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfDetallesPedidos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_detalle_pedido column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDetallePedido(1234); // WHERE id_detalle_pedido = 1234
     * $query->filterByIdDetallePedido(array(12, 34)); // WHERE id_detalle_pedido IN (12, 34)
     * $query->filterByIdDetallePedido(array('min' => 12)); // WHERE id_detalle_pedido > 12
     * </code>
     *
     * @param     mixed $idDetallePedido The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdDetallePedido($idDetallePedido = null, $comparison = null)
    {
        if (is_array($idDetallePedido)) {
            $useMinMax = false;
            if (isset($idDetallePedido['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $idDetallePedido['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDetallePedido['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $idDetallePedido['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $idDetallePedido, $comparison);
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
     * @see       filterByHbfComandas()
     *
     * @param     mixed $idComanda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdComanda($idComanda = null, $comparison = null)
    {
        if (is_array($idComanda)) {
            $useMinMax = false;
            if (isset($idComanda['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_COMANDA, $idComanda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComanda['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_COMANDA, $idComanda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_COMANDA, $idComanda, $comparison);
    }

    /**
     * Filter the query on the id_vaso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdVaso(1234); // WHERE id_vaso = 1234
     * $query->filterByIdVaso(array(12, 34)); // WHERE id_vaso IN (12, 34)
     * $query->filterByIdVaso(array('min' => 12)); // WHERE id_vaso > 12
     * </code>
     *
     * @see       filterByHbfVasos()
     *
     * @param     mixed $idVaso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdVaso($idVaso = null, $comparison = null)
    {
        if (is_array($idVaso)) {
            $useMinMax = false;
            if (isset($idVaso['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_VASO, $idVaso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVaso['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_VASO, $idVaso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_VASO, $idVaso, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
    }

    /**
     * Filter the query on the cantidad column
     *
     * Example usage:
     * <code>
     * $query->filterByCantidad(1234); // WHERE cantidad = 1234
     * $query->filterByCantidad(array(12, 34)); // WHERE cantidad IN (12, 34)
     * $query->filterByCantidad(array('min' => 12)); // WHERE cantidad > 12
     * </code>
     *
     * @param     mixed $cantidad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CANTIDAD, $cantidad, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
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
     * @return ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByHbfProductos($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, $hbfProductos->toKeyValue('PrimaryKey', 'IdProducto'), $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function joinHbfProductos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfProductosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductos', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByHbfVasos($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_VASO, $hbfVasos->getIdVaso(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_VASO, $hbfVasos->toKeyValue('PrimaryKey', 'IdVaso'), $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function joinHbfVasos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfVasosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfVasos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVasos', '\HbfVasosQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_COMANDA, $hbfComandas->getIdComanda(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_COMANDA, $hbfComandas->toKeyValue('PrimaryKey', 'IdComanda'), $comparison);
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
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildHbfDetallesPedidos $hbfDetallesPedidos Object to remove from the list of results
     *
     * @return $this|ChildHbfDetallesPedidosQuery The current query, for fluid interface
     */
    public function prune($hbfDetallesPedidos = null)
    {
        if ($hbfDetallesPedidos) {
            $this->addUsingAlias(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, $hbfDetallesPedidos->getIdDetallePedido(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_detalles_pedidos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesPedidosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfDetallesPedidosTableMap::clearInstancePool();
            HbfDetallesPedidosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesPedidosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfDetallesPedidosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfDetallesPedidosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfDetallesPedidosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfDetallesPedidosQuery
