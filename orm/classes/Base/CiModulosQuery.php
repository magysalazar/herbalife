<?php

namespace Base;

use \CiModulos as ChildCiModulos;
use \CiModulosQuery as ChildCiModulosQuery;
use \Exception;
use \PDO;
use Map\CiModulosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ci_modulos' table.
 *
 *
 *
 * @method     ChildCiModulosQuery orderByIdModulo($order = Criteria::ASC) Order by the id_modulo column
 * @method     ChildCiModulosQuery orderByIdOpcionModulo($order = Criteria::ASC) Order by the id_opcion_modulo column
 * @method     ChildCiModulosQuery orderByIdOpcionRoles($order = Criteria::ASC) Order by the id_opcion_roles column
 * @method     ChildCiModulosQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     ChildCiModulosQuery orderByTabla($order = Criteria::ASC) Order by the tabla column
 * @method     ChildCiModulosQuery orderByListed($order = Criteria::ASC) Order by the listed column
 * @method     ChildCiModulosQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildCiModulosQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildCiModulosQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildCiModulosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildCiModulosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildCiModulosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildCiModulosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildCiModulosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildCiModulosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildCiModulosQuery groupByIdModulo() Group by the id_modulo column
 * @method     ChildCiModulosQuery groupByIdOpcionModulo() Group by the id_opcion_modulo column
 * @method     ChildCiModulosQuery groupByIdOpcionRoles() Group by the id_opcion_roles column
 * @method     ChildCiModulosQuery groupByTitulo() Group by the titulo column
 * @method     ChildCiModulosQuery groupByTabla() Group by the tabla column
 * @method     ChildCiModulosQuery groupByListed() Group by the listed column
 * @method     ChildCiModulosQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildCiModulosQuery groupByIcon() Group by the icon column
 * @method     ChildCiModulosQuery groupByUrl() Group by the url column
 * @method     ChildCiModulosQuery groupByEstado() Group by the estado column
 * @method     ChildCiModulosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildCiModulosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildCiModulosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildCiModulosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildCiModulosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildCiModulosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiModulosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiModulosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiModulosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiModulosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiModulosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiModulosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiModulosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiModulosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiModulosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiModulosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiModulosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildCiModulosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildCiModulosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiModulosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiModulosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiModulosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiModulosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiModulosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildCiModulosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildCiModulosQuery leftJoinCiOptionsRelatedByIdOpcionModulo($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOpcionModulo relation
 * @method     ChildCiModulosQuery rightJoinCiOptionsRelatedByIdOpcionModulo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOpcionModulo relation
 * @method     ChildCiModulosQuery innerJoinCiOptionsRelatedByIdOpcionModulo($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiModulosQuery joinWithCiOptionsRelatedByIdOpcionModulo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiModulosQuery leftJoinWithCiOptionsRelatedByIdOpcionModulo() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionModulo relation
 * @method     ChildCiModulosQuery rightJoinWithCiOptionsRelatedByIdOpcionModulo() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionModulo relation
 * @method     ChildCiModulosQuery innerJoinWithCiOptionsRelatedByIdOpcionModulo() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionModulo relation
 *
 * @method     ChildCiModulosQuery leftJoinCiOptionsRelatedByIdOpcionRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOpcionRoles relation
 * @method     ChildCiModulosQuery rightJoinCiOptionsRelatedByIdOpcionRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOpcionRoles relation
 * @method     ChildCiModulosQuery innerJoinCiOptionsRelatedByIdOpcionRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOpcionRoles relation
 *
 * @method     ChildCiModulosQuery joinWithCiOptionsRelatedByIdOpcionRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOpcionRoles relation
 *
 * @method     ChildCiModulosQuery leftJoinWithCiOptionsRelatedByIdOpcionRoles() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRoles relation
 * @method     ChildCiModulosQuery rightJoinWithCiOptionsRelatedByIdOpcionRoles() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRoles relation
 * @method     ChildCiModulosQuery innerJoinWithCiOptionsRelatedByIdOpcionRoles() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOpcionRoles relation
 *
 * @method     \CiUsuariosQuery|\CiOptionsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCiModulos findOne(ConnectionInterface $con = null) Return the first ChildCiModulos matching the query
 * @method     ChildCiModulos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCiModulos matching the query, or a new ChildCiModulos object populated from the query conditions when no match is found
 *
 * @method     ChildCiModulos findOneByIdModulo(int $id_modulo) Return the first ChildCiModulos filtered by the id_modulo column
 * @method     ChildCiModulos findOneByIdOpcionModulo(int $id_opcion_modulo) Return the first ChildCiModulos filtered by the id_opcion_modulo column
 * @method     ChildCiModulos findOneByIdOpcionRoles(int $id_opcion_roles) Return the first ChildCiModulos filtered by the id_opcion_roles column
 * @method     ChildCiModulos findOneByTitulo(string $titulo) Return the first ChildCiModulos filtered by the titulo column
 * @method     ChildCiModulos findOneByTabla(string $tabla) Return the first ChildCiModulos filtered by the tabla column
 * @method     ChildCiModulos findOneByListed(string $listed) Return the first ChildCiModulos filtered by the listed column
 * @method     ChildCiModulos findOneByDescripcion(string $descripcion) Return the first ChildCiModulos filtered by the descripcion column
 * @method     ChildCiModulos findOneByIcon(string $icon) Return the first ChildCiModulos filtered by the icon column
 * @method     ChildCiModulos findOneByUrl(string $url) Return the first ChildCiModulos filtered by the url column
 * @method     ChildCiModulos findOneByEstado(string $estado) Return the first ChildCiModulos filtered by the estado column
 * @method     ChildCiModulos findOneByChangeCount(int $change_count) Return the first ChildCiModulos filtered by the change_count column
 * @method     ChildCiModulos findOneByIdUserModified(int $id_user_modified) Return the first ChildCiModulos filtered by the id_user_modified column
 * @method     ChildCiModulos findOneByIdUserCreated(int $id_user_created) Return the first ChildCiModulos filtered by the id_user_created column
 * @method     ChildCiModulos findOneByDateModified(string $date_modified) Return the first ChildCiModulos filtered by the date_modified column
 * @method     ChildCiModulos findOneByDateCreated(string $date_created) Return the first ChildCiModulos filtered by the date_created column *

 * @method     ChildCiModulos requirePk($key, ConnectionInterface $con = null) Return the ChildCiModulos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOne(ConnectionInterface $con = null) Return the first ChildCiModulos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiModulos requireOneByIdModulo(int $id_modulo) Return the first ChildCiModulos filtered by the id_modulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByIdOpcionModulo(int $id_opcion_modulo) Return the first ChildCiModulos filtered by the id_opcion_modulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByIdOpcionRoles(int $id_opcion_roles) Return the first ChildCiModulos filtered by the id_opcion_roles column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByTitulo(string $titulo) Return the first ChildCiModulos filtered by the titulo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByTabla(string $tabla) Return the first ChildCiModulos filtered by the tabla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByListed(string $listed) Return the first ChildCiModulos filtered by the listed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByDescripcion(string $descripcion) Return the first ChildCiModulos filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByIcon(string $icon) Return the first ChildCiModulos filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByUrl(string $url) Return the first ChildCiModulos filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByEstado(string $estado) Return the first ChildCiModulos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByChangeCount(int $change_count) Return the first ChildCiModulos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByIdUserModified(int $id_user_modified) Return the first ChildCiModulos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByIdUserCreated(int $id_user_created) Return the first ChildCiModulos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByDateModified(string $date_modified) Return the first ChildCiModulos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiModulos requireOneByDateCreated(string $date_created) Return the first ChildCiModulos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiModulos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCiModulos objects based on current ModelCriteria
 * @method     ChildCiModulos[]|ObjectCollection findByIdModulo(int $id_modulo) Return ChildCiModulos objects filtered by the id_modulo column
 * @method     ChildCiModulos[]|ObjectCollection findByIdOpcionModulo(int $id_opcion_modulo) Return ChildCiModulos objects filtered by the id_opcion_modulo column
 * @method     ChildCiModulos[]|ObjectCollection findByIdOpcionRoles(int $id_opcion_roles) Return ChildCiModulos objects filtered by the id_opcion_roles column
 * @method     ChildCiModulos[]|ObjectCollection findByTitulo(string $titulo) Return ChildCiModulos objects filtered by the titulo column
 * @method     ChildCiModulos[]|ObjectCollection findByTabla(string $tabla) Return ChildCiModulos objects filtered by the tabla column
 * @method     ChildCiModulos[]|ObjectCollection findByListed(string $listed) Return ChildCiModulos objects filtered by the listed column
 * @method     ChildCiModulos[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildCiModulos objects filtered by the descripcion column
 * @method     ChildCiModulos[]|ObjectCollection findByIcon(string $icon) Return ChildCiModulos objects filtered by the icon column
 * @method     ChildCiModulos[]|ObjectCollection findByUrl(string $url) Return ChildCiModulos objects filtered by the url column
 * @method     ChildCiModulos[]|ObjectCollection findByEstado(string $estado) Return ChildCiModulos objects filtered by the estado column
 * @method     ChildCiModulos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildCiModulos objects filtered by the change_count column
 * @method     ChildCiModulos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildCiModulos objects filtered by the id_user_modified column
 * @method     ChildCiModulos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildCiModulos objects filtered by the id_user_created column
 * @method     ChildCiModulos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildCiModulos objects filtered by the date_modified column
 * @method     ChildCiModulos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildCiModulos objects filtered by the date_created column
 * @method     ChildCiModulos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiModulosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CiModulosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\CiModulos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiModulosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiModulosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCiModulosQuery) {
            return $criteria;
        }
        $query = new ChildCiModulosQuery();
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
     * @return ChildCiModulos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiModulosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiModulosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCiModulos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_modulo, id_opcion_modulo, id_opcion_roles, titulo, tabla, listed, descripcion, icon, url, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM ci_modulos WHERE id_modulo = :p0';
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
            /** @var ChildCiModulos $obj */
            $obj = new ChildCiModulos();
            $obj->hydrate($row);
            CiModulosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCiModulos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdModulo(1234); // WHERE id_modulo = 1234
     * $query->filterByIdModulo(array(12, 34)); // WHERE id_modulo IN (12, 34)
     * $query->filterByIdModulo(array('min' => 12)); // WHERE id_modulo > 12
     * </code>
     *
     * @param     mixed $idModulo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIdModulo($idModulo = null, $comparison = null)
    {
        if (is_array($idModulo)) {
            $useMinMax = false;
            if (isset($idModulo['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $idModulo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModulo['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $idModulo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $idModulo, $comparison);
    }

    /**
     * Filter the query on the id_opcion_modulo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionModulo(1234); // WHERE id_opcion_modulo = 1234
     * $query->filterByIdOpcionModulo(array(12, 34)); // WHERE id_opcion_modulo IN (12, 34)
     * $query->filterByIdOpcionModulo(array('min' => 12)); // WHERE id_opcion_modulo > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOpcionModulo()
     *
     * @param     mixed $idOpcionModulo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIdOpcionModulo($idOpcionModulo = null, $comparison = null)
    {
        if (is_array($idOpcionModulo)) {
            $useMinMax = false;
            if (isset($idOpcionModulo['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_MODULO, $idOpcionModulo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionModulo['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_MODULO, $idOpcionModulo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_MODULO, $idOpcionModulo, $comparison);
    }

    /**
     * Filter the query on the id_opcion_roles column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionRoles(1234); // WHERE id_opcion_roles = 1234
     * $query->filterByIdOpcionRoles(array(12, 34)); // WHERE id_opcion_roles IN (12, 34)
     * $query->filterByIdOpcionRoles(array('min' => 12)); // WHERE id_opcion_roles > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOpcionRoles()
     *
     * @param     mixed $idOpcionRoles The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIdOpcionRoles($idOpcionRoles = null, $comparison = null)
    {
        if (is_array($idOpcionRoles)) {
            $useMinMax = false;
            if (isset($idOpcionRoles['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_ROLES, $idOpcionRoles['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionRoles['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_ROLES, $idOpcionRoles['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_ROLES, $idOpcionRoles, $comparison);
    }

    /**
     * Filter the query on the titulo column
     *
     * Example usage:
     * <code>
     * $query->filterByTitulo('fooValue');   // WHERE titulo = 'fooValue'
     * $query->filterByTitulo('%fooValue%', Criteria::LIKE); // WHERE titulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titulo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByTitulo($titulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titulo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_TITULO, $titulo, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByTabla($tabla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tabla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_TABLA, $tabla, $comparison);
    }

    /**
     * Filter the query on the listed column
     *
     * Example usage:
     * <code>
     * $query->filterByListed('fooValue');   // WHERE listed = 'fooValue'
     * $query->filterByListed('%fooValue%', Criteria::LIKE); // WHERE listed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $listed The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByListed($listed = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($listed)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_LISTED, $listed, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%', Criteria::LIKE); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_URL, $url, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(CiModulosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CiModulosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
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
     * @return ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
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
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOpcionModulo($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_MODULO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_MODULO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOpcionModulo() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOpcionModulo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOpcionModulo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOpcionModulo');

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
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOpcionModulo');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOpcionModulo relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOpcionModuloQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOpcionModulo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOpcionModulo', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCiModulosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOpcionRoles($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_ROLES, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CiModulosTableMap::COL_ID_OPCION_ROLES, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOpcionRoles() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOpcionRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOpcionRoles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOpcionRoles');

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
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOpcionRoles');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOpcionRoles relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOpcionRolesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOpcionRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOpcionRoles', '\CiOptionsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCiModulos $ciModulos Object to remove from the list of results
     *
     * @return $this|ChildCiModulosQuery The current query, for fluid interface
     */
    public function prune($ciModulos = null)
    {
        if ($ciModulos) {
            $this->addUsingAlias(CiModulosTableMap::COL_ID_MODULO, $ciModulos->getIdModulo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ci_modulos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiModulosTableMap::clearInstancePool();
            CiModulosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiModulosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiModulosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiModulosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CiModulosQuery
