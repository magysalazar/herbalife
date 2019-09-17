<?php

namespace Base;

use \HbfIngresos as ChildHbfIngresos;
use \HbfIngresosQuery as ChildHbfIngresosQuery;
use \Exception;
use \PDO;
use Map\HbfIngresosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_ingresos' table.
 *
 *
 *
 * @method     ChildHbfIngresosQuery orderByIdIngreso($order = Criteria::ASC) Order by the id_ingreso column
 * @method     ChildHbfIngresosQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildHbfIngresosQuery orderByIdComanda($order = Criteria::ASC) Order by the id_comanda column
 * @method     ChildHbfIngresosQuery orderByIdPrepago($order = Criteria::ASC) Order by the id_prepago column
 * @method     ChildHbfIngresosQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfIngresosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfIngresosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfIngresosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfIngresosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfIngresosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfIngresosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfIngresosQuery groupByIdIngreso() Group by the id_ingreso column
 * @method     ChildHbfIngresosQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildHbfIngresosQuery groupByIdComanda() Group by the id_comanda column
 * @method     ChildHbfIngresosQuery groupByIdPrepago() Group by the id_prepago column
 * @method     ChildHbfIngresosQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfIngresosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfIngresosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfIngresosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfIngresosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfIngresosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfIngresosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfIngresosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfIngresosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfIngresosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfIngresosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfIngresosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfIngresosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfIngresosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfIngresosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfIngresosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfIngresosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfIngresosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfIngresosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfIngresosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfIngresosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfIngresosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfIngresosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfIngresosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfIngresosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfIngresosQuery leftJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfIngresosQuery rightJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfIngresosQuery innerJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfIngresosQuery joinWithCiUsuariosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithCiUsuariosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfIngresosQuery rightJoinWithCiUsuariosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfIngresosQuery innerJoinWithCiUsuariosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfIngresosQuery leftJoinHbfProductos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfIngresosQuery rightJoinHbfProductos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductos relation
 * @method     ChildHbfIngresosQuery innerJoinHbfProductos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductos relation
 *
 * @method     ChildHbfIngresosQuery joinWithHbfProductos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithHbfProductos() Adds a LEFT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfIngresosQuery rightJoinWithHbfProductos() Adds a RIGHT JOIN clause and with to the query using the HbfProductos relation
 * @method     ChildHbfIngresosQuery innerJoinWithHbfProductos() Adds a INNER JOIN clause and with to the query using the HbfProductos relation
 *
 * @method     ChildHbfIngresosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfIngresosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfIngresosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfIngresosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfIngresosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfIngresosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfIngresosQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfIngresosQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfIngresosQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfIngresosQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfIngresosQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfIngresosQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfIngresosQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     \CiUsuariosQuery|\HbfProductosQuery|\HbfComandasQuery|\HbfPrepagosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfIngresos findOne(ConnectionInterface $con = null) Return the first ChildHbfIngresos matching the query
 * @method     ChildHbfIngresos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfIngresos matching the query, or a new ChildHbfIngresos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfIngresos findOneByIdIngreso(int $id_ingreso) Return the first ChildHbfIngresos filtered by the id_ingreso column
 * @method     ChildHbfIngresos findOneByIdCliente(int $id_cliente) Return the first ChildHbfIngresos filtered by the id_cliente column
 * @method     ChildHbfIngresos findOneByIdComanda(int $id_comanda) Return the first ChildHbfIngresos filtered by the id_comanda column
 * @method     ChildHbfIngresos findOneByIdPrepago(int $id_prepago) Return the first ChildHbfIngresos filtered by the id_prepago column
 * @method     ChildHbfIngresos findOneByIdProducto(int $id_producto) Return the first ChildHbfIngresos filtered by the id_producto column
 * @method     ChildHbfIngresos findOneByEstado(string $estado) Return the first ChildHbfIngresos filtered by the estado column
 * @method     ChildHbfIngresos findOneByChangeCount(int $change_count) Return the first ChildHbfIngresos filtered by the change_count column
 * @method     ChildHbfIngresos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfIngresos filtered by the id_user_modified column
 * @method     ChildHbfIngresos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfIngresos filtered by the id_user_created column
 * @method     ChildHbfIngresos findOneByDateModified(string $date_modified) Return the first ChildHbfIngresos filtered by the date_modified column
 * @method     ChildHbfIngresos findOneByDateCreated(string $date_created) Return the first ChildHbfIngresos filtered by the date_created column *

 * @method     ChildHbfIngresos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfIngresos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOne(ConnectionInterface $con = null) Return the first ChildHbfIngresos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfIngresos requireOneByIdIngreso(int $id_ingreso) Return the first ChildHbfIngresos filtered by the id_ingreso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdCliente(int $id_cliente) Return the first ChildHbfIngresos filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdComanda(int $id_comanda) Return the first ChildHbfIngresos filtered by the id_comanda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdPrepago(int $id_prepago) Return the first ChildHbfIngresos filtered by the id_prepago column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdProducto(int $id_producto) Return the first ChildHbfIngresos filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByEstado(string $estado) Return the first ChildHbfIngresos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByChangeCount(int $change_count) Return the first ChildHbfIngresos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfIngresos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfIngresos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByDateModified(string $date_modified) Return the first ChildHbfIngresos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfIngresos requireOneByDateCreated(string $date_created) Return the first ChildHbfIngresos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfIngresos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfIngresos objects based on current ModelCriteria
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdIngreso(int $id_ingreso) Return ChildHbfIngresos objects filtered by the id_ingreso column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildHbfIngresos objects filtered by the id_cliente column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdComanda(int $id_comanda) Return ChildHbfIngresos objects filtered by the id_comanda column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdPrepago(int $id_prepago) Return ChildHbfIngresos objects filtered by the id_prepago column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfIngresos objects filtered by the id_producto column
 * @method     ChildHbfIngresos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfIngresos objects filtered by the estado column
 * @method     ChildHbfIngresos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfIngresos objects filtered by the change_count column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfIngresos objects filtered by the id_user_modified column
 * @method     ChildHbfIngresos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfIngresos objects filtered by the id_user_created column
 * @method     ChildHbfIngresos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfIngresos objects filtered by the date_modified column
 * @method     ChildHbfIngresos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfIngresos objects filtered by the date_created column
 * @method     ChildHbfIngresos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfIngresosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfIngresosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfIngresos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfIngresosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfIngresosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfIngresosQuery) {
            return $criteria;
        }
        $query = new ChildHbfIngresosQuery();
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
     * @return ChildHbfIngresos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfIngresosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfIngresosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfIngresos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_ingreso, id_cliente, id_comanda, id_prepago, id_producto, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_ingresos WHERE id_ingreso = :p0';
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
            /** @var ChildHbfIngresos $obj */
            $obj = new ChildHbfIngresos();
            $obj->hydrate($row);
            HbfIngresosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfIngresos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ingreso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdIngreso(1234); // WHERE id_ingreso = 1234
     * $query->filterByIdIngreso(array(12, 34)); // WHERE id_ingreso IN (12, 34)
     * $query->filterByIdIngreso(array('min' => 12)); // WHERE id_ingreso > 12
     * </code>
     *
     * @param     mixed $idIngreso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdIngreso($idIngreso = null, $comparison = null)
    {
        if (is_array($idIngreso)) {
            $useMinMax = false;
            if (isset($idIngreso['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $idIngreso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idIngreso['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $idIngreso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $idIngreso, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdComanda($idComanda = null, $comparison = null)
    {
        if (is_array($idComanda)) {
            $useMinMax = false;
            if (isset($idComanda['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_COMANDA, $idComanda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComanda['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_COMANDA, $idComanda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_COMANDA, $idComanda, $comparison);
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
     * @see       filterByHbfPrepagos()
     *
     * @param     mixed $idPrepago The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdPrepago($idPrepago = null, $comparison = null)
    {
        if (is_array($idPrepago)) {
            $useMinMax = false;
            if (isset($idPrepago['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PREPAGO, $idPrepago['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPrepago['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PREPAGO, $idPrepago['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PREPAGO, $idPrepago, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfIngresosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdCliente($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_CLIENTE, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_CLIENTE, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByHbfProductos($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_PRODUCTO, $hbfProductos->toKeyValue('PrimaryKey', 'IdProducto'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_COMANDA, $hbfComandas->getIdComanda(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_COMANDA, $hbfComandas->toKeyValue('PrimaryKey', 'IdComanda'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_PREPAGO, $hbfPrepagos->getIdPrepago(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfIngresosTableMap::COL_ID_PREPAGO, $hbfPrepagos->toKeyValue('PrimaryKey', 'IdPrepago'), $comparison);
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
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildHbfIngresos $hbfIngresos Object to remove from the list of results
     *
     * @return $this|ChildHbfIngresosQuery The current query, for fluid interface
     */
    public function prune($hbfIngresos = null)
    {
        if ($hbfIngresos) {
            $this->addUsingAlias(HbfIngresosTableMap::COL_ID_INGRESO, $hbfIngresos->getIdIngreso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_ingresos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfIngresosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfIngresosTableMap::clearInstancePool();
            HbfIngresosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfIngresosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfIngresosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfIngresosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfIngresosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfIngresosQuery
