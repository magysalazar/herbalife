<?php

namespace Base;

use \HbfPorciones as ChildHbfPorciones;
use \HbfPorcionesQuery as ChildHbfPorcionesQuery;
use \Exception;
use \PDO;
use Map\HbfPorcionesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_porciones' table.
 *
 *
 *
 * @method     ChildHbfPorcionesQuery orderByIdPorcion($order = Criteria::ASC) Order by the id_porcion column
 * @method     ChildHbfPorcionesQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfPorcionesQuery orderByCantidad($order = Criteria::ASC) Order by the cantidad column
 * @method     ChildHbfPorcionesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfPorcionesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfPorcionesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfPorcionesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfPorcionesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfPorcionesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfPorcionesQuery groupByIdPorcion() Group by the id_porcion column
 * @method     ChildHbfPorcionesQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfPorcionesQuery groupByCantidad() Group by the cantidad column
 * @method     ChildHbfPorcionesQuery groupByEstado() Group by the estado column
 * @method     ChildHbfPorcionesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfPorcionesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfPorcionesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfPorcionesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfPorcionesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfPorcionesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfPorcionesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfPorcionesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfPorcionesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfPorcionesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfPorcionesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfPorcionesQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPorcionesQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPorcionesQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPorcionesQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPorcionesQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPorcionesQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfPorcionesQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfPorcionesQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPorcionesQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPorcionesQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPorcionesQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPorcionesQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPorcionesQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfPorcionesQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfPorcionesQuery leftJoinHbfProductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfPorcionesQuery rightJoinHbfProductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfPorcionesQuery innerJoinHbfProductos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductos relation
 *
 * @method     ChildHbfPorcionesQuery joinWithHbfProductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfPorcionesQuery leftJoinWithHbfProductos() Adds a LEFT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfPorcionesQuery rightJoinWithHbfProductos() Adds a RIGHT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfPorcionesQuery innerJoinWithHbfProductos() Adds a INNER JOIN clause and with to the query using the HbfProductos relation
 *
 * @method     \CiUsuariosQuery|\HbfProductosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfPorciones findOne(ConnectionInterface $con = null) Return the first ChildHbfPorciones matching the query
 * @method     ChildHbfPorciones findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfPorciones matching the query, or a new ChildHbfPorciones object populated from the query conditions when no match is found
 *
 * @method     ChildHbfPorciones findOneByIdPorcion(int $id_porcion) Return the first ChildHbfPorciones filtered by the id_porcion column
 * @method     ChildHbfPorciones findOneByIdProducto(int $id_producto) Return the first ChildHbfPorciones filtered by the id_producto column
 * @method     ChildHbfPorciones findOneByCantidad(int $cantidad) Return the first ChildHbfPorciones filtered by the cantidad column
 * @method     ChildHbfPorciones findOneByEstado(string $estado) Return the first ChildHbfPorciones filtered by the estado column
 * @method     ChildHbfPorciones findOneByChangeCount(int $change_count) Return the first ChildHbfPorciones filtered by the change_count column
 * @method     ChildHbfPorciones findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfPorciones filtered by the id_user_modified column
 * @method     ChildHbfPorciones findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfPorciones filtered by the id_user_created column
 * @method     ChildHbfPorciones findOneByDateModified(string $date_modified) Return the first ChildHbfPorciones filtered by the date_modified column
 * @method     ChildHbfPorciones findOneByDateCreated(string $date_created) Return the first ChildHbfPorciones filtered by the date_created column *

 * @method     ChildHbfPorciones requirePk($key, ConnectionInterface $con = null) Return the ChildHbfPorciones by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOne(ConnectionInterface $con = null) Return the first ChildHbfPorciones matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfPorciones requireOneByIdPorcion(int $id_porcion) Return the first ChildHbfPorciones filtered by the id_porcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByIdProducto(int $id_producto) Return the first ChildHbfPorciones filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByCantidad(int $cantidad) Return the first ChildHbfPorciones filtered by the cantidad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByEstado(string $estado) Return the first ChildHbfPorciones filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByChangeCount(int $change_count) Return the first ChildHbfPorciones filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfPorciones filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfPorciones filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByDateModified(string $date_modified) Return the first ChildHbfPorciones filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfPorciones requireOneByDateCreated(string $date_created) Return the first ChildHbfPorciones filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfPorciones[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfPorciones objects based on current ModelCriteria
 * @method     ChildHbfPorciones[]|ObjectCollection findByIdPorcion(int $id_porcion) Return ChildHbfPorciones objects filtered by the id_porcion column
 * @method     ChildHbfPorciones[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfPorciones objects filtered by the id_producto column
 * @method     ChildHbfPorciones[]|ObjectCollection findByCantidad(int $cantidad) Return ChildHbfPorciones objects filtered by the cantidad column
 * @method     ChildHbfPorciones[]|ObjectCollection findByEstado(string $estado) Return ChildHbfPorciones objects filtered by the estado column
 * @method     ChildHbfPorciones[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfPorciones objects filtered by the change_count column
 * @method     ChildHbfPorciones[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfPorciones objects filtered by the id_user_modified column
 * @method     ChildHbfPorciones[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfPorciones objects filtered by the id_user_created column
 * @method     ChildHbfPorciones[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfPorciones objects filtered by the date_modified column
 * @method     ChildHbfPorciones[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfPorciones objects filtered by the date_created column
 * @method     ChildHbfPorciones[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfPorcionesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfPorcionesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfPorciones', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfPorcionesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfPorcionesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfPorcionesQuery) {
            return $criteria;
        }
        $query = new ChildHbfPorcionesQuery();
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
     * @return ChildHbfPorciones|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfPorcionesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfPorcionesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfPorciones A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_porcion, id_producto, cantidad, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_porciones WHERE id_porcion = :p0';
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
            /** @var ChildHbfPorciones $obj */
            $obj = new ChildHbfPorciones();
            $obj->hydrate($row);
            HbfPorcionesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfPorciones|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_porcion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPorcion(1234); // WHERE id_porcion = 1234
     * $query->filterByIdPorcion(array(12, 34)); // WHERE id_porcion IN (12, 34)
     * $query->filterByIdPorcion(array('min' => 12)); // WHERE id_porcion > 12
     * </code>
     *
     * @param     mixed $idPorcion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByIdPorcion($idPorcion = null, $comparison = null)
    {
        if (is_array($idPorcion)) {
            $useMinMax = false;
            if (isset($idPorcion['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $idPorcion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPorcion['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $idPorcion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $idPorcion, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByCantidad($cantidad = null, $comparison = null)
    {
        if (is_array($cantidad)) {
            $useMinMax = false;
            if (isset($cantidad['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_CANTIDAD, $cantidad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cantidad['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_CANTIDAD, $cantidad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_CANTIDAD, $cantidad, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfPorcionesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
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
     * @return ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
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
     * @return ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function filterByHbfProductos($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfPorcionesTableMap::COL_ID_PRODUCTO, $hbfProductos->toKeyValue('PrimaryKey', 'IdProducto'), $comparison);
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
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
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
     * @param   ChildHbfPorciones $hbfPorciones Object to remove from the list of results
     *
     * @return $this|ChildHbfPorcionesQuery The current query, for fluid interface
     */
    public function prune($hbfPorciones = null)
    {
        if ($hbfPorciones) {
            $this->addUsingAlias(HbfPorcionesTableMap::COL_ID_PORCION, $hbfPorciones->getIdPorcion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_porciones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPorcionesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfPorcionesTableMap::clearInstancePool();
            HbfPorcionesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPorcionesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfPorcionesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfPorcionesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfPorcionesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfPorcionesQuery
