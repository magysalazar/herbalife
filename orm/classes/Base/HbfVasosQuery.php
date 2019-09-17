<?php

namespace Base;

use \HbfVasos as ChildHbfVasos;
use \HbfVasosQuery as ChildHbfVasosQuery;
use \Exception;
use \PDO;
use Map\HbfVasosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_vasos' table.
 *
 *
 *
 * @method     ChildHbfVasosQuery orderByIdVaso($order = Criteria::ASC) Order by the id_vaso column
 * @method     ChildHbfVasosQuery orderByIdComanda($order = Criteria::ASC) Order by the id_comanda column
 * @method     ChildHbfVasosQuery orderByNivel($order = Criteria::ASC) Order by the nivel column
 * @method     ChildHbfVasosQuery orderByTemperatura($order = Criteria::ASC) Order by the temperatura column
 * @method     ChildHbfVasosQuery orderByConsistencia($order = Criteria::ASC) Order by the consistencia column
 * @method     ChildHbfVasosQuery orderByIdOpcionTipoProducto($order = Criteria::ASC) Order by the id_opcion_tipo_producto column
 * @method     ChildHbfVasosQuery orderByNumProductos($order = Criteria::ASC) Order by the num_productos column
 * @method     ChildHbfVasosQuery orderByDetalle($order = Criteria::ASC) Order by the detalle column
 * @method     ChildHbfVasosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfVasosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfVasosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfVasosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfVasosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfVasosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfVasosQuery groupByIdVaso() Group by the id_vaso column
 * @method     ChildHbfVasosQuery groupByIdComanda() Group by the id_comanda column
 * @method     ChildHbfVasosQuery groupByNivel() Group by the nivel column
 * @method     ChildHbfVasosQuery groupByTemperatura() Group by the temperatura column
 * @method     ChildHbfVasosQuery groupByConsistencia() Group by the consistencia column
 * @method     ChildHbfVasosQuery groupByIdOpcionTipoProducto() Group by the id_opcion_tipo_producto column
 * @method     ChildHbfVasosQuery groupByNumProductos() Group by the num_productos column
 * @method     ChildHbfVasosQuery groupByDetalle() Group by the detalle column
 * @method     ChildHbfVasosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfVasosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfVasosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfVasosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfVasosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfVasosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfVasosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfVasosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfVasosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfVasosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfVasosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfVasosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfVasosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVasosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVasosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVasosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVasosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVasosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfVasosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfVasosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVasosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVasosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVasosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVasosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVasosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfVasosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfVasosQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfVasosQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfVasosQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfVasosQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfVasosQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfVasosQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfVasosQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfVasosQuery leftJoinCiOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfVasosQuery rightJoinCiOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptions relation
 * @method     ChildHbfVasosQuery innerJoinCiOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptions relation
 *
 * @method     ChildHbfVasosQuery joinWithCiOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfVasosQuery leftJoinWithCiOptions() Adds a LEFT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfVasosQuery rightJoinWithCiOptions() Adds a RIGHT JOIN clause and with to the query using the CiOptions relation
 * @method     ChildHbfVasosQuery innerJoinWithCiOptions() Adds a INNER JOIN clause and with to the query using the CiOptions relation
 *
 * @method     ChildHbfVasosQuery leftJoinHbfDetallesPedidos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfVasosQuery rightJoinHbfDetallesPedidos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfVasosQuery innerJoinHbfDetallesPedidos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfVasosQuery joinWithHbfDetallesPedidos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfVasosQuery leftJoinWithHbfDetallesPedidos() Adds a LEFT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfVasosQuery rightJoinWithHbfDetallesPedidos() Adds a RIGHT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfVasosQuery innerJoinWithHbfDetallesPedidos() Adds a INNER JOIN clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     \CiUsuariosQuery|\HbfComandasQuery|\CiOptionsQuery|\HbfDetallesPedidosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfVasos findOne(ConnectionInterface $con = null) Return the first ChildHbfVasos matching the query
 * @method     ChildHbfVasos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfVasos matching the query, or a new ChildHbfVasos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfVasos findOneByIdVaso(int $id_vaso) Return the first ChildHbfVasos filtered by the id_vaso column
 * @method     ChildHbfVasos findOneByIdComanda(int $id_comanda) Return the first ChildHbfVasos filtered by the id_comanda column
 * @method     ChildHbfVasos findOneByNivel(int $nivel) Return the first ChildHbfVasos filtered by the nivel column
 * @method     ChildHbfVasos findOneByTemperatura(string $temperatura) Return the first ChildHbfVasos filtered by the temperatura column
 * @method     ChildHbfVasos findOneByConsistencia(string $consistencia) Return the first ChildHbfVasos filtered by the consistencia column
 * @method     ChildHbfVasos findOneByIdOpcionTipoProducto(int $id_opcion_tipo_producto) Return the first ChildHbfVasos filtered by the id_opcion_tipo_producto column
 * @method     ChildHbfVasos findOneByNumProductos(int $num_productos) Return the first ChildHbfVasos filtered by the num_productos column
 * @method     ChildHbfVasos findOneByDetalle(string $detalle) Return the first ChildHbfVasos filtered by the detalle column
 * @method     ChildHbfVasos findOneByEstado(string $estado) Return the first ChildHbfVasos filtered by the estado column
 * @method     ChildHbfVasos findOneByChangeCount(int $change_count) Return the first ChildHbfVasos filtered by the change_count column
 * @method     ChildHbfVasos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfVasos filtered by the id_user_modified column
 * @method     ChildHbfVasos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfVasos filtered by the id_user_created column
 * @method     ChildHbfVasos findOneByDateModified(string $date_modified) Return the first ChildHbfVasos filtered by the date_modified column
 * @method     ChildHbfVasos findOneByDateCreated(string $date_created) Return the first ChildHbfVasos filtered by the date_created column *

 * @method     ChildHbfVasos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfVasos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOne(ConnectionInterface $con = null) Return the first ChildHbfVasos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfVasos requireOneByIdVaso(int $id_vaso) Return the first ChildHbfVasos filtered by the id_vaso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByIdComanda(int $id_comanda) Return the first ChildHbfVasos filtered by the id_comanda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByNivel(int $nivel) Return the first ChildHbfVasos filtered by the nivel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByTemperatura(string $temperatura) Return the first ChildHbfVasos filtered by the temperatura column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByConsistencia(string $consistencia) Return the first ChildHbfVasos filtered by the consistencia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByIdOpcionTipoProducto(int $id_opcion_tipo_producto) Return the first ChildHbfVasos filtered by the id_opcion_tipo_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByNumProductos(int $num_productos) Return the first ChildHbfVasos filtered by the num_productos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByDetalle(string $detalle) Return the first ChildHbfVasos filtered by the detalle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByEstado(string $estado) Return the first ChildHbfVasos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByChangeCount(int $change_count) Return the first ChildHbfVasos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfVasos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfVasos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByDateModified(string $date_modified) Return the first ChildHbfVasos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfVasos requireOneByDateCreated(string $date_created) Return the first ChildHbfVasos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfVasos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfVasos objects based on current ModelCriteria
 * @method     ChildHbfVasos[]|ObjectCollection findByIdVaso(int $id_vaso) Return ChildHbfVasos objects filtered by the id_vaso column
 * @method     ChildHbfVasos[]|ObjectCollection findByIdComanda(int $id_comanda) Return ChildHbfVasos objects filtered by the id_comanda column
 * @method     ChildHbfVasos[]|ObjectCollection findByNivel(int $nivel) Return ChildHbfVasos objects filtered by the nivel column
 * @method     ChildHbfVasos[]|ObjectCollection findByTemperatura(string $temperatura) Return ChildHbfVasos objects filtered by the temperatura column
 * @method     ChildHbfVasos[]|ObjectCollection findByConsistencia(string $consistencia) Return ChildHbfVasos objects filtered by the consistencia column
 * @method     ChildHbfVasos[]|ObjectCollection findByIdOpcionTipoProducto(int $id_opcion_tipo_producto) Return ChildHbfVasos objects filtered by the id_opcion_tipo_producto column
 * @method     ChildHbfVasos[]|ObjectCollection findByNumProductos(int $num_productos) Return ChildHbfVasos objects filtered by the num_productos column
 * @method     ChildHbfVasos[]|ObjectCollection findByDetalle(string $detalle) Return ChildHbfVasos objects filtered by the detalle column
 * @method     ChildHbfVasos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfVasos objects filtered by the estado column
 * @method     ChildHbfVasos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfVasos objects filtered by the change_count column
 * @method     ChildHbfVasos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfVasos objects filtered by the id_user_modified column
 * @method     ChildHbfVasos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfVasos objects filtered by the id_user_created column
 * @method     ChildHbfVasos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfVasos objects filtered by the date_modified column
 * @method     ChildHbfVasos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfVasos objects filtered by the date_created column
 * @method     ChildHbfVasos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfVasosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfVasosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfVasos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfVasosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfVasosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfVasosQuery) {
            return $criteria;
        }
        $query = new ChildHbfVasosQuery();
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
     * @return ChildHbfVasos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfVasosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfVasosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfVasos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_vaso, id_comanda, nivel, temperatura, consistencia, id_opcion_tipo_producto, num_productos, detalle, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_vasos WHERE id_vaso = :p0';
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
            /** @var ChildHbfVasos $obj */
            $obj = new ChildHbfVasos();
            $obj->hydrate($row);
            HbfVasosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfVasos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $keys, Criteria::IN);
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
     * @param     mixed $idVaso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByIdVaso($idVaso = null, $comparison = null)
    {
        if (is_array($idVaso)) {
            $useMinMax = false;
            if (isset($idVaso['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $idVaso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idVaso['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $idVaso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $idVaso, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByIdComanda($idComanda = null, $comparison = null)
    {
        if (is_array($idComanda)) {
            $useMinMax = false;
            if (isset($idComanda['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_COMANDA, $idComanda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idComanda['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_COMANDA, $idComanda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_COMANDA, $idComanda, $comparison);
    }

    /**
     * Filter the query on the nivel column
     *
     * Example usage:
     * <code>
     * $query->filterByNivel(1234); // WHERE nivel = 1234
     * $query->filterByNivel(array(12, 34)); // WHERE nivel IN (12, 34)
     * $query->filterByNivel(array('min' => 12)); // WHERE nivel > 12
     * </code>
     *
     * @param     mixed $nivel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByNivel($nivel = null, $comparison = null)
    {
        if (is_array($nivel)) {
            $useMinMax = false;
            if (isset($nivel['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_NIVEL, $nivel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nivel['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_NIVEL, $nivel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_NIVEL, $nivel, $comparison);
    }

    /**
     * Filter the query on the temperatura column
     *
     * Example usage:
     * <code>
     * $query->filterByTemperatura('fooValue');   // WHERE temperatura = 'fooValue'
     * $query->filterByTemperatura('%fooValue%', Criteria::LIKE); // WHERE temperatura LIKE '%fooValue%'
     * </code>
     *
     * @param     string $temperatura The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByTemperatura($temperatura = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($temperatura)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_TEMPERATURA, $temperatura, $comparison);
    }

    /**
     * Filter the query on the consistencia column
     *
     * Example usage:
     * <code>
     * $query->filterByConsistencia('fooValue');   // WHERE consistencia = 'fooValue'
     * $query->filterByConsistencia('%fooValue%', Criteria::LIKE); // WHERE consistencia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $consistencia The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByConsistencia($consistencia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($consistencia)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_CONSISTENCIA, $consistencia, $comparison);
    }

    /**
     * Filter the query on the id_opcion_tipo_producto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOpcionTipoProducto(1234); // WHERE id_opcion_tipo_producto = 1234
     * $query->filterByIdOpcionTipoProducto(array(12, 34)); // WHERE id_opcion_tipo_producto IN (12, 34)
     * $query->filterByIdOpcionTipoProducto(array('min' => 12)); // WHERE id_opcion_tipo_producto > 12
     * </code>
     *
     * @see       filterByCiOptions()
     *
     * @param     mixed $idOpcionTipoProducto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByIdOpcionTipoProducto($idOpcionTipoProducto = null, $comparison = null)
    {
        if (is_array($idOpcionTipoProducto)) {
            $useMinMax = false;
            if (isset($idOpcionTipoProducto['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, $idOpcionTipoProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOpcionTipoProducto['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, $idOpcionTipoProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, $idOpcionTipoProducto, $comparison);
    }

    /**
     * Filter the query on the num_productos column
     *
     * Example usage:
     * <code>
     * $query->filterByNumProductos(1234); // WHERE num_productos = 1234
     * $query->filterByNumProductos(array(12, 34)); // WHERE num_productos IN (12, 34)
     * $query->filterByNumProductos(array('min' => 12)); // WHERE num_productos > 12
     * </code>
     *
     * @param     mixed $numProductos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByNumProductos($numProductos = null, $comparison = null)
    {
        if (is_array($numProductos)) {
            $useMinMax = false;
            if (isset($numProductos['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_NUM_PRODUCTOS, $numProductos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numProductos['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_NUM_PRODUCTOS, $numProductos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_NUM_PRODUCTOS, $numProductos, $comparison);
    }

    /**
     * Filter the query on the detalle column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalle('fooValue');   // WHERE detalle = 'fooValue'
     * $query->filterByDetalle('%fooValue%', Criteria::LIKE); // WHERE detalle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByDetalle($detalle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_DETALLE, $detalle, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfVasosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfVasosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
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
     * @return ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_COMANDA, $hbfComandas->getIdComanda(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_COMANDA, $hbfComandas->toKeyValue('PrimaryKey', 'IdComanda'), $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByCiOptions($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfDetallesPedidos object
     *
     * @param \HbfDetallesPedidos|ObjectCollection $hbfDetallesPedidos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfVasosQuery The current query, for fluid interface
     */
    public function filterByHbfDetallesPedidos($hbfDetallesPedidos, $comparison = null)
    {
        if ($hbfDetallesPedidos instanceof \HbfDetallesPedidos) {
            return $this
                ->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $hbfDetallesPedidos->getIdVaso(), $comparison);
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
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function joinHbfDetallesPedidos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfDetallesPedidosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfDetallesPedidos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfDetallesPedidos', '\HbfDetallesPedidosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfVasos $hbfVasos Object to remove from the list of results
     *
     * @return $this|ChildHbfVasosQuery The current query, for fluid interface
     */
    public function prune($hbfVasos = null)
    {
        if ($hbfVasos) {
            $this->addUsingAlias(HbfVasosTableMap::COL_ID_VASO, $hbfVasos->getIdVaso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_vasos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVasosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfVasosTableMap::clearInstancePool();
            HbfVasosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVasosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfVasosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfVasosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfVasosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfVasosQuery
