<?php

namespace Base;

use \HbfDetallesVasos as ChildHbfDetallesVasos;
use \HbfDetallesVasosQuery as ChildHbfDetallesVasosQuery;
use \Exception;
use \PDO;
use Map\HbfDetallesVasosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_detalles_vasos' table.
 *
 *
 *
 * @method     ChildHbfDetallesVasosQuery orderByIdDetalleVaso($order = Criteria::ASC) Order by the id_detalle_vaso column
 * @method     ChildHbfDetallesVasosQuery orderByIdComanda($order = Criteria::ASC) Order by the id_comanda column
 * @method     ChildHbfDetallesVasosQuery orderByIdVaso($order = Criteria::ASC) Order by the id_vaso column
 * @method     ChildHbfDetallesVasosQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfDetallesVasosQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildHbfDetallesVasosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfDetallesVasosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfDetallesVasosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfDetallesVasosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfDetallesVasosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfDetallesVasosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfDetallesVasosQuery groupByIdDetalleVaso() Group by the id_detalle_vaso column
 * @method     ChildHbfDetallesVasosQuery groupByIdComanda() Group by the id_comanda column
 * @method     ChildHbfDetallesVasosQuery groupByIdVaso() Group by the id_vaso column
 * @method     ChildHbfDetallesVasosQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfDetallesVasosQuery groupByCantidad() Group by the cantidad column
 * @method     ChildHbfDetallesVasosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfDetallesVasosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfDetallesVasosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfDetallesVasosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfDetallesVasosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfDetallesVasosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfDetallesVasosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfDetallesVasosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfDetallesVasosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfDetallesVasosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfDetallesVasosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesVasosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesVasosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesVasosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesVasosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfDetallesVasosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesVasosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesVasosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesVasosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesVasosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfDetallesVasosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinHbfVasos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfDetallesVasosQuery rightJoinHbfVasos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfDetallesVasosQuery innerJoinHbfVasos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesVasosQuery joinWithHbfVasos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWithHbfVasos() Adds a LEFT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfDetallesVasosQuery rightJoinWithHbfVasos() Adds a RIGHT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfDetallesVasosQuery innerJoinWithHbfVasos() Adds a INNER JOIN clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinHbfProductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfDetallesVasosQuery rightJoinHbfProductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfDetallesVasosQuery innerJoinHbfProductos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesVasosQuery joinWithHbfProductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWithHbfProductos() Adds a LEFT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfDetallesVasosQuery rightJoinWithHbfProductos() Adds a RIGHT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfDetallesVasosQuery innerJoinWithHbfProductos() Adds a INNER JOIN clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfDetallesVasosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfDetallesVasosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfDetallesVasosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfDetallesVasosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfDetallesVasosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfDetallesVasosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     \CiUsuariosQuery|\HbfVasosQuery|\HbfProductosQuery|\HbfComandasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfDetallesVasos findOne(ConnectionInterface $con = null) Return the first ChildHbfDetallesVasos matching the query
 * @method     ChildHbfDetallesVasos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfDetallesVasos matching the query, or a new ChildHbfDetallesVasos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfDetallesVasos findOneByIdDetalleVaso(int $id_detalle_vaso) Return the first ChildHbfDetallesVasos filtered by the id_detalle_vaso column
 * @method     ChildHbfDetallesVasos findOneByIdComanda(int $id_comanda) Return the first ChildHbfDetallesVasos filtered by the id_comanda column
 * @method     ChildHbfDetallesVasos findOneByIdVaso(int $id_vaso) Return the first ChildHbfDetallesVasos filtered by the id_vaso column
 * @method     ChildHbfDetallesVasos findOneByIdProducto(int $id_producto) Return the first ChildHbfDetallesVasos filtered by the id_producto column
 * @method     ChildHbfDetallesVasos findOneByCantidad(int $cantidad) Return the first ChildHbfDetallesVasos filtered by the cantidad column
 * @method     ChildHbfDetallesVasos findOneByEstado(string $estado) Return the first ChildHbfDetallesVasos filtered by the estado column
 * @method     ChildHbfDetallesVasos findOneByChangeCount(int $change_count) Return the first ChildHbfDetallesVasos filtered by the change_count column
 * @method     ChildHbfDetallesVasos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfDetallesVasos filtered by the id_user_modified column
 * @method     ChildHbfDetallesVasos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfDetallesVasos filtered by the id_user_created column
 * @method     ChildHbfDetallesVasos findOneByDateModified(string $date_modified) Return the first ChildHbfDetallesVasos filtered by the date_modified column
 * @method     ChildHbfDetallesVasos findOneByDateCreated(string $date_created) Return the first ChildHbfDetallesVasos filtered by the date_created column *

 * @method     ChildHbfDetallesVasos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfDetallesVasos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOne(ConnectionInterface $con = null) Return the first ChildHbfDetallesVasos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfDetallesVasos requireOneByIdDetalleVaso(int $id_detalle_vaso) Return the first ChildHbfDetallesVasos filtered by the id_detalle_vaso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByIdComanda(int $id_comanda) Return the first ChildHbfDetallesVasos filtered by the id_comanda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByIdVaso(int $id_vaso) Return the first ChildHbfDetallesVasos filtered by the id_vaso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByIdProducto(int $id_producto) Return the first ChildHbfDetallesVasos filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByCantidad(int $cantidad) Return the first ChildHbfDetallesVasos filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByEstado(string $estado) Return the first ChildHbfDetallesVasos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByChangeCount(int $change_count) Return the first ChildHbfDetallesVasos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfDetallesVasos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfDetallesVasos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByDateModified(string $date_modified) Return the first ChildHbfDetallesVasos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfDetallesVasos requireOneByDateCreated(string $date_created) Return the first ChildHbfDetallesVasos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfDetallesVasos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfDetallesVasos objects based on current ModelCriteria
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdDetalleVaso(int $id_detalle_vaso) Return ChildHbfDetallesVasos objects filtered by the id_detalle_vaso column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdComanda(int $id_comanda) Return ChildHbfDetallesVasos objects filtered by the id_comanda column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdVaso(int $id_vaso) Return ChildHbfDetallesVasos objects filtered by the id_vaso column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfDetallesVasos objects filtered by the id_producto column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByCantidad(int $cantidad) Return ChildHbfDetallesVasos objects filtered by the cantidad column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfDetallesVasos objects filtered by the estado column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfDetallesVasos objects filtered by the change_count column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfDetallesVasos objects filtered by the id_user_modified column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfDetallesVasos objects filtered by the id_user_created column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfDetallesVasos objects filtered by the date_modified column
 * @method     ChildHbfDetallesVasos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfDetallesVasos objects filtered by the date_created column
 * @method     ChildHbfDetallesVasos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfDetallesVasosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfDetallesVasosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfDetallesVasos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfDetallesVasosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfDetallesVasosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfDetallesVasosQuery) {
            return $criteria;
        }
        $query = new ChildHbfDetallesVasosQuery();
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
     * @return ChildHbfDetallesVasos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfDetallesVasosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfDetallesVasosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfDetallesVasos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_detalle_vaso, id_comanda, id_vaso, id_producto, cantidad, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_detalles_vasos WHERE id_detalle_vaso = :p0';
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
            /** @var ChildHbfDetallesVasos $obj */
            $obj = new ChildHbfDetallesVasos();
            $obj->hydrate($row);
            HbfDetallesVasosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfDetallesVasos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_detalle_vaso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDetalleVaso(1234); // WHERE id_detalle_vaso = 1234
     * $query->filterByIdDetalleVaso(array(12, 34)); // WHERE id_detalle_vaso IN (12, 34)
     * $query->filterByIdDetalleVaso(array('min' => 12)); // WHERE id_detalle_vaso > 12
     * </code>
     *
     * @param     mixed $idDetalleVaso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdDetalleVaso($idDetalleVaso = null, $comparison = null)
    {
        if (is_array($idDetalleVaso)) {
            $useMinMax = false;
            if (isset($idDetalleVaso['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $idDetalleVaso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDetalleVaso['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $idDetalleVaso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $idDetalleVaso, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdComanda($idComanda = null, $comparison = null)
    {
        if (is_array($idComanda)) {
            $useMinMax = false;
            if (isset($idComanda['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_COMANDA, $idComanda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComanda['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_COMANDA, $idComanda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_COMANDA, $idComanda, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdVaso($idVaso = null, $comparison = null)
    {
        if (is_array($idVaso)) {
            $useMinMax = false;
            if (isset($idVaso['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_VASO, $idVaso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVaso['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_VASO, $idVaso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_VASO, $idVaso, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CANTIDAD, $cantidad, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfDetallesVasosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
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
     * @return ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByHbfVasos($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_VASO, $hbfVasos->getIdVaso(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_VASO, $hbfVasos->toKeyValue('PrimaryKey', 'IdVaso'), $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByHbfProductos($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_PRODUCTO, $hbfProductos->toKeyValue('PrimaryKey', 'IdProducto'), $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_COMANDA, $hbfComandas->getIdComanda(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_COMANDA, $hbfComandas->toKeyValue('PrimaryKey', 'IdComanda'), $comparison);
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
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
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
     * @param   ChildHbfDetallesVasos $hbfDetallesVasos Object to remove from the list of results
     *
     * @return $this|ChildHbfDetallesVasosQuery The current query, for fluid interface
     */
    public function prune($hbfDetallesVasos = null)
    {
        if ($hbfDetallesVasos) {
            $this->addUsingAlias(HbfDetallesVasosTableMap::COL_ID_DETALLE_VASO, $hbfDetallesVasos->getIdDetalleVaso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_detalles_vasos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesVasosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfDetallesVasosTableMap::clearInstancePool();
            HbfDetallesVasosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesVasosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfDetallesVasosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfDetallesVasosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfDetallesVasosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfDetallesVasosQuery
