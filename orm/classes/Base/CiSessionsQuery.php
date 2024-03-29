<?php

namespace Base;

use \CiSessions as ChildCiSessions;
use \CiSessionsQuery as ChildCiSessionsQuery;
use \Exception;
use \PDO;
use Map\CiSessionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ci_sessions' table.
 *
 *
 *
 * @method     ChildCiSessionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCiSessionsQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     ChildCiSessionsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 * @method     ChildCiSessionsQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildCiSessionsQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 * @method     ChildCiSessionsQuery orderByIdUsuario($order = Criteria::ASC) Order by the id_usuario column
 * @method     ChildCiSessionsQuery orderByIdHbfSesion($order = Criteria::ASC) Order by the id_hbf_sesion column
 *
 * @method     ChildCiSessionsQuery groupById() Group by the id column
 * @method     ChildCiSessionsQuery groupByIpAddress() Group by the ip_address column
 * @method     ChildCiSessionsQuery groupByTimestamp() Group by the timestamp column
 * @method     ChildCiSessionsQuery groupByData() Group by the data column
 * @method     ChildCiSessionsQuery groupByLastActivity() Group by the last_activity column
 * @method     ChildCiSessionsQuery groupByIdUsuario() Group by the id_usuario column
 * @method     ChildCiSessionsQuery groupByIdHbfSesion() Group by the id_hbf_sesion column
 *
 * @method     ChildCiSessionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiSessionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiSessionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiSessionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiSessionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiSessionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiSessionsQuery leftJoinCiUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuarios relation
 * @method     ChildCiSessionsQuery rightJoinCiUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuarios relation
 * @method     ChildCiSessionsQuery innerJoinCiUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuarios relation
 *
 * @method     ChildCiSessionsQuery joinWithCiUsuarios($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuarios relation
 *
 * @method     ChildCiSessionsQuery leftJoinWithCiUsuarios() Adds a LEFT JOIN clause and with to the query using the CiUsuarios relation
 * @method     ChildCiSessionsQuery rightJoinWithCiUsuarios() Adds a RIGHT JOIN clause and with to the query using the CiUsuarios relation
 * @method     ChildCiSessionsQuery innerJoinWithCiUsuarios() Adds a INNER JOIN clause and with to the query using the CiUsuarios relation
 *
 * @method     ChildCiSessionsQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildCiSessionsQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildCiSessionsQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildCiSessionsQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildCiSessionsQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildCiSessionsQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildCiSessionsQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     \CiUsuariosQuery|\HbfSesionesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCiSessions findOne(ConnectionInterface $con = null) Return the first ChildCiSessions matching the query
 * @method     ChildCiSessions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCiSessions matching the query, or a new ChildCiSessions object populated from the query conditions when no match is found
 *
 * @method     ChildCiSessions findOneById(string $id) Return the first ChildCiSessions filtered by the id column
 * @method     ChildCiSessions findOneByIpAddress(string $ip_address) Return the first ChildCiSessions filtered by the ip_address column
 * @method     ChildCiSessions findOneByTimestamp(int $timestamp) Return the first ChildCiSessions filtered by the timestamp column
 * @method     ChildCiSessions findOneByData(resource $data) Return the first ChildCiSessions filtered by the data column
 * @method     ChildCiSessions findOneByLastActivity(string $last_activity) Return the first ChildCiSessions filtered by the last_activity column
 * @method     ChildCiSessions findOneByIdUsuario(int $id_usuario) Return the first ChildCiSessions filtered by the id_usuario column
 * @method     ChildCiSessions findOneByIdHbfSesion(int $id_hbf_sesion) Return the first ChildCiSessions filtered by the id_hbf_sesion column *

 * @method     ChildCiSessions requirePk($key, ConnectionInterface $con = null) Return the ChildCiSessions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOne(ConnectionInterface $con = null) Return the first ChildCiSessions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiSessions requireOneById(string $id) Return the first ChildCiSessions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByIpAddress(string $ip_address) Return the first ChildCiSessions filtered by the ip_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByTimestamp(int $timestamp) Return the first ChildCiSessions filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByData(resource $data) Return the first ChildCiSessions filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByLastActivity(string $last_activity) Return the first ChildCiSessions filtered by the last_activity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByIdUsuario(int $id_usuario) Return the first ChildCiSessions filtered by the id_usuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSessions requireOneByIdHbfSesion(int $id_hbf_sesion) Return the first ChildCiSessions filtered by the id_hbf_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiSessions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCiSessions objects based on current ModelCriteria
 * @method     ChildCiSessions[]|ObjectCollection findById(string $id) Return ChildCiSessions objects filtered by the id column
 * @method     ChildCiSessions[]|ObjectCollection findByIpAddress(string $ip_address) Return ChildCiSessions objects filtered by the ip_address column
 * @method     ChildCiSessions[]|ObjectCollection findByTimestamp(int $timestamp) Return ChildCiSessions objects filtered by the timestamp column
 * @method     ChildCiSessions[]|ObjectCollection findByData(resource $data) Return ChildCiSessions objects filtered by the data column
 * @method     ChildCiSessions[]|ObjectCollection findByLastActivity(string $last_activity) Return ChildCiSessions objects filtered by the last_activity column
 * @method     ChildCiSessions[]|ObjectCollection findByIdUsuario(int $id_usuario) Return ChildCiSessions objects filtered by the id_usuario column
 * @method     ChildCiSessions[]|ObjectCollection findByIdHbfSesion(int $id_hbf_sesion) Return ChildCiSessions objects filtered by the id_hbf_sesion column
 * @method     ChildCiSessions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiSessionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CiSessionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\CiSessions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiSessionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiSessionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCiSessionsQuery) {
            return $criteria;
        }
        $query = new ChildCiSessionsQuery();
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
     * @return ChildCiSessions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiSessionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiSessionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCiSessions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ip_address, timestamp, data, last_activity, id_usuario, id_hbf_sesion FROM ci_sessions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCiSessions $obj */
            $obj = new ChildCiSessions();
            $obj->hydrate($row);
            CiSessionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCiSessions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CiSessionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CiSessionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%', Criteria::LIKE); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp(1234); // WHERE timestamp = 1234
     * $query->filterByTimestamp(array(12, 34)); // WHERE timestamp IN (12, 34)
     * $query->filterByTimestamp(array('min' => 12)); // WHERE timestamp > 12
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * @param     mixed $data The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {

        return $this->addUsingAlias(CiSessionsTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity('2011-03-14'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity('now'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity(array('max' => 'yesterday')); // WHERE last_activity > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActivity The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity, $comparison);
    }

    /**
     * Filter the query on the id_usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUsuario(1234); // WHERE id_usuario = 1234
     * $query->filterByIdUsuario(array(12, 34)); // WHERE id_usuario IN (12, 34)
     * $query->filterByIdUsuario(array('min' => 12)); // WHERE id_usuario > 12
     * </code>
     *
     * @see       filterByCiUsuarios()
     *
     * @param     mixed $idUsuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByIdUsuario($idUsuario = null, $comparison = null)
    {
        if (is_array($idUsuario)) {
            $useMinMax = false;
            if (isset($idUsuario['min'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_ID_USUARIO, $idUsuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUsuario['max'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_ID_USUARIO, $idUsuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_ID_USUARIO, $idUsuario, $comparison);
    }

    /**
     * Filter the query on the id_hbf_sesion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHbfSesion(1234); // WHERE id_hbf_sesion = 1234
     * $query->filterByIdHbfSesion(array(12, 34)); // WHERE id_hbf_sesion IN (12, 34)
     * $query->filterByIdHbfSesion(array('min' => 12)); // WHERE id_hbf_sesion > 12
     * </code>
     *
     * @see       filterByHbfSesiones()
     *
     * @param     mixed $idHbfSesion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByIdHbfSesion($idHbfSesion = null, $comparison = null)
    {
        if (is_array($idHbfSesion)) {
            $useMinMax = false;
            if (isset($idHbfSesion['min'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_ID_HBF_SESION, $idHbfSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idHbfSesion['max'])) {
                $this->addUsingAlias(CiSessionsTableMap::COL_ID_HBF_SESION, $idHbfSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSessionsTableMap::COL_ID_HBF_SESION, $idHbfSesion, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByCiUsuarios($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiSessionsTableMap::COL_ID_USUARIO, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiSessionsTableMap::COL_ID_USUARIO, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
        } else {
            throw new PropelException('filterByCiUsuarios() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuarios relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function joinCiUsuarios($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuarios');

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
            $this->addJoinObject($join, 'CiUsuarios');
        }

        return $this;
    }

    /**
     * Use the CiUsuarios relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuarios', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiSessionsQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(CiSessionsTableMap::COL_ID_HBF_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiSessionsTableMap::COL_ID_HBF_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
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
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildCiSessions $ciSessions Object to remove from the list of results
     *
     * @return $this|ChildCiSessionsQuery The current query, for fluid interface
     */
    public function prune($ciSessions = null)
    {
        if ($ciSessions) {
            $this->addUsingAlias(CiSessionsTableMap::COL_ID, $ciSessions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ci_sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiSessionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiSessionsTableMap::clearInstancePool();
            CiSessionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CiSessionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiSessionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiSessionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiSessionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CiSessionsQuery
