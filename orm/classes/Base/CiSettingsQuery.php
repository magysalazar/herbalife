<?php

namespace Base;

use \CiSettings as ChildCiSettings;
use \CiSettingsQuery as ChildCiSettingsQuery;
use \Exception;
use \PDO;
use Map\CiSettingsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ci_settings' table.
 *
 *
 *
 * @method     ChildCiSettingsQuery orderByIdSetting($order = Criteria::ASC) Order by the id_setting column
 * @method     ChildCiSettingsQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildCiSettingsQuery orderByTabla($order = Criteria::ASC) Order by the tabla column
 * @method     ChildCiSettingsQuery orderByIdField($order = Criteria::ASC) Order by the id_field column
 * @method     ChildCiSettingsQuery orderByFields($order = Criteria::ASC) Order by the fields column
 * @method     ChildCiSettingsQuery orderByEditTag($order = Criteria::ASC) Order by the edit_tag column
 * @method     ChildCiSettingsQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildCiSettingsQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildCiSettingsQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildCiSettingsQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildCiSettingsQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildCiSettingsQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildCiSettingsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildCiSettingsQuery groupByIdSetting() Group by the id_setting column
 * @method     ChildCiSettingsQuery groupByNombre() Group by the nombre column
 * @method     ChildCiSettingsQuery groupByTabla() Group by the tabla column
 * @method     ChildCiSettingsQuery groupByIdField() Group by the id_field column
 * @method     ChildCiSettingsQuery groupByFields() Group by the fields column
 * @method     ChildCiSettingsQuery groupByEditTag() Group by the edit_tag column
 * @method     ChildCiSettingsQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildCiSettingsQuery groupByEstado() Group by the estado column
 * @method     ChildCiSettingsQuery groupByChangeCount() Group by the change_count column
 * @method     ChildCiSettingsQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildCiSettingsQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildCiSettingsQuery groupByDateModified() Group by the date_modified column
 * @method     ChildCiSettingsQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildCiSettingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiSettingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiSettingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiSettingsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiSettingsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiSettingsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiSettingsQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiSettingsQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiSettingsQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiSettingsQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiSettingsQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiSettingsQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiSettingsQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiSettingsQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiSettingsQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiSettingsQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiSettingsQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiSettingsQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiSettingsQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiSettingsQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiSettingsQuery leftJoinCiOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptions relation
 * @method     ChildCiSettingsQuery rightJoinCiOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptions relation
 * @method     ChildCiSettingsQuery innerJoinCiOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptions relation
 *
 * @method     ChildCiSettingsQuery joinWithCiOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptions relation
 *
 * @method     ChildCiSettingsQuery leftJoinWithCiOptions() Adds a LEFT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildCiSettingsQuery rightJoinWithCiOptions() Adds a RIGHT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildCiSettingsQuery innerJoinWithCiOptions() Adds a INNER JOIN clause and with to the query using the CiOptions relation
 *
 * @method     \CiUsuariosQuery|\CiOptionsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCiSettings findOne(ConnectionInterface $con = null) Return the first ChildCiSettings matching the query
 * @method     ChildCiSettings findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCiSettings matching the query, or a new ChildCiSettings object populated from the query conditions when no match is found
 *
 * @method     ChildCiSettings findOneByIdSetting(int $id_setting) Return the first ChildCiSettings filtered by the id_setting column
 * @method     ChildCiSettings findOneByNombre(string $nombre) Return the first ChildCiSettings filtered by the nombre column
 * @method     ChildCiSettings findOneByTabla(string $tabla) Return the first ChildCiSettings filtered by the tabla column
 * @method     ChildCiSettings findOneByIdField(string $id_field) Return the first ChildCiSettings filtered by the id_field column
 * @method     ChildCiSettings findOneByFields(string $fields) Return the first ChildCiSettings filtered by the fields column
 * @method     ChildCiSettings findOneByEditTag(string $edit_tag) Return the first ChildCiSettings filtered by the edit_tag column
 * @method     ChildCiSettings findOneByDescripcion(string $descripcion) Return the first ChildCiSettings filtered by the descripcion column
 * @method     ChildCiSettings findOneByEstado(string $estado) Return the first ChildCiSettings filtered by the estado column
 * @method     ChildCiSettings findOneByChangeCount(int $change_count) Return the first ChildCiSettings filtered by the change_count column
 * @method     ChildCiSettings findOneByIdUserModified(int $id_user_modified) Return the first ChildCiSettings filtered by the id_user_modified column
 * @method     ChildCiSettings findOneByIdUserCreated(int $id_user_created) Return the first ChildCiSettings filtered by the id_user_created column
 * @method     ChildCiSettings findOneByDateModified(string $date_modified) Return the first ChildCiSettings filtered by the date_modified column
 * @method     ChildCiSettings findOneByDateCreated(string $date_created) Return the first ChildCiSettings filtered by the date_created column *

 * @method     ChildCiSettings requirePk($key, ConnectionInterface $con = null) Return the ChildCiSettings by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOne(ConnectionInterface $con = null) Return the first ChildCiSettings matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiSettings requireOneByIdSetting(int $id_setting) Return the first ChildCiSettings filtered by the id_setting column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByNombre(string $nombre) Return the first ChildCiSettings filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByTabla(string $tabla) Return the first ChildCiSettings filtered by the tabla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByIdField(string $id_field) Return the first ChildCiSettings filtered by the id_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByFields(string $fields) Return the first ChildCiSettings filtered by the fields column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByEditTag(string $edit_tag) Return the first ChildCiSettings filtered by the edit_tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByDescripcion(string $descripcion) Return the first ChildCiSettings filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByEstado(string $estado) Return the first ChildCiSettings filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByChangeCount(int $change_count) Return the first ChildCiSettings filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByIdUserModified(int $id_user_modified) Return the first ChildCiSettings filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByIdUserCreated(int $id_user_created) Return the first ChildCiSettings filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByDateModified(string $date_modified) Return the first ChildCiSettings filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiSettings requireOneByDateCreated(string $date_created) Return the first ChildCiSettings filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiSettings[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCiSettings objects based on current ModelCriteria
 * @method     ChildCiSettings[]|ObjectCollection findByIdSetting(int $id_setting) Return ChildCiSettings objects filtered by the id_setting column
 * @method     ChildCiSettings[]|ObjectCollection findByNombre(string $nombre) Return ChildCiSettings objects filtered by the nombre column
 * @method     ChildCiSettings[]|ObjectCollection findByTabla(string $tabla) Return ChildCiSettings objects filtered by the tabla column
 * @method     ChildCiSettings[]|ObjectCollection findByIdField(string $id_field) Return ChildCiSettings objects filtered by the id_field column
 * @method     ChildCiSettings[]|ObjectCollection findByFields(string $fields) Return ChildCiSettings objects filtered by the fields column
 * @method     ChildCiSettings[]|ObjectCollection findByEditTag(string $edit_tag) Return ChildCiSettings objects filtered by the edit_tag column
 * @method     ChildCiSettings[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildCiSettings objects filtered by the descripcion column
 * @method     ChildCiSettings[]|ObjectCollection findByEstado(string $estado) Return ChildCiSettings objects filtered by the estado column
 * @method     ChildCiSettings[]|ObjectCollection findByChangeCount(int $change_count) Return ChildCiSettings objects filtered by the change_count column
 * @method     ChildCiSettings[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildCiSettings objects filtered by the id_user_modified column
 * @method     ChildCiSettings[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildCiSettings objects filtered by the id_user_created column
 * @method     ChildCiSettings[]|ObjectCollection findByDateModified(string $date_modified) Return ChildCiSettings objects filtered by the date_modified column
 * @method     ChildCiSettings[]|ObjectCollection findByDateCreated(string $date_created) Return ChildCiSettings objects filtered by the date_created column
 * @method     ChildCiSettings[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiSettingsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CiSettingsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\CiSettings', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiSettingsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiSettingsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCiSettingsQuery) {
            return $criteria;
        }
        $query = new ChildCiSettingsQuery();
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
     * @return ChildCiSettings|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiSettingsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiSettingsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCiSettings A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_setting, nombre, tabla, id_field, fields, edit_tag, descripcion, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM ci_settings WHERE id_setting = :p0';
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
            /** @var ChildCiSettings $obj */
            $obj = new ChildCiSettings();
            $obj->hydrate($row);
            CiSettingsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCiSettings|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_setting column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSetting(1234); // WHERE id_setting = 1234
     * $query->filterByIdSetting(array(12, 34)); // WHERE id_setting IN (12, 34)
     * $query->filterByIdSetting(array('min' => 12)); // WHERE id_setting > 12
     * </code>
     *
     * @param     mixed $idSetting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByIdSetting($idSetting = null, $comparison = null)
    {
        if (is_array($idSetting)) {
            $useMinMax = false;
            if (isset($idSetting['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $idSetting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSetting['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $idSetting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $idSetting, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the tabla column
     *
     * Example usage:
     * <code>
     * $query->filterByTabla('fooValue');   // WHERE tabla = 'fooValue'
     * $query->filterByTabla('%fooValue%', Criteria::LIKE); // WHERE tabla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tabla The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByTabla($tabla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tabla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_TABLA, $tabla, $comparison);
    }

    /**
     * Filter the query on the id_field column
     *
     * Example usage:
     * <code>
     * $query->filterByIdField('fooValue');   // WHERE id_field = 'fooValue'
     * $query->filterByIdField('%fooValue%', Criteria::LIKE); // WHERE id_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByIdField($idField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_FIELD, $idField, $comparison);
    }

    /**
     * Filter the query on the fields column
     *
     * Example usage:
     * <code>
     * $query->filterByFields('fooValue');   // WHERE fields = 'fooValue'
     * $query->filterByFields('%fooValue%', Criteria::LIKE); // WHERE fields LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fields The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByFields($fields = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fields)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_FIELDS, $fields, $comparison);
    }

    /**
     * Filter the query on the edit_tag column
     *
     * Example usage:
     * <code>
     * $query->filterByEditTag('fooValue');   // WHERE edit_tag = 'fooValue'
     * $query->filterByEditTag('%fooValue%', Criteria::LIKE); // WHERE edit_tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editTag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByEditTag($editTag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editTag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_EDIT_TAG, $editTag, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_DESCRIPCION, $descripcion, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(CiSettingsTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiSettingsTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiSettingsTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiSettingsTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
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
     * @return ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiSettingsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiSettingsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
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
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCiSettingsQuery The current query, for fluid interface
     */
    public function filterByCiOptions($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $ciOptions->getIdSetting(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            return $this
                ->useCiOptionsQuery()
                ->filterByPrimaryKeys($ciOptions->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildCiSettings $ciSettings Object to remove from the list of results
     *
     * @return $this|ChildCiSettingsQuery The current query, for fluid interface
     */
    public function prune($ciSettings = null)
    {
        if ($ciSettings) {
            $this->addUsingAlias(CiSettingsTableMap::COL_ID_SETTING, $ciSettings->getIdSetting(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ci_settings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiSettingsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiSettingsTableMap::clearInstancePool();
            CiSettingsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CiSettingsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiSettingsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiSettingsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiSettingsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CiSettingsQuery
