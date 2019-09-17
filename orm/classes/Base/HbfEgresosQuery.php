<?php

namespace Base;

use \HbfEgresos as ChildHbfEgresos;
use \HbfEgresosQuery as ChildHbfEgresosQuery;
use \Exception;
use \PDO;
use Map\HbfEgresosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_egresos' table.
 *
 *
 *
 * @method     ChildHbfEgresosQuery orderByIdEgreso($order = Criteria::ASC) Order by the id_egreso column
 * @method     ChildHbfEgresosQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfEgresosQuery orderByIdTurno($order = Criteria::ASC) Order by the id_turno column
 * @method     ChildHbfEgresosQuery orderByIdSesion($order = Criteria::ASC) Order by the id_sesion column
 * @method     ChildHbfEgresosQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildHbfEgresosQuery orderByDetalle($order = Criteria::ASC) Order by the detalle column
 * @method     ChildHbfEgresosQuery orderByTipoEgreso($order = Criteria::ASC) Order by the tipo_egreso column
 * @method     ChildHbfEgresosQuery orderByFechaEgreso($order = Criteria::ASC) Order by the fecha_egreso column
 * @method     ChildHbfEgresosQuery orderByMonto($order = Criteria::ASC) Order by the monto column
 * @method     ChildHbfEgresosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfEgresosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfEgresosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfEgresosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfEgresosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfEgresosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfEgresosQuery groupByIdEgreso() Group by the id_egreso column
 * @method     ChildHbfEgresosQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfEgresosQuery groupByIdTurno() Group by the id_turno column
 * @method     ChildHbfEgresosQuery groupByIdSesion() Group by the id_sesion column
 * @method     ChildHbfEgresosQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildHbfEgresosQuery groupByDetalle() Group by the detalle column
 * @method     ChildHbfEgresosQuery groupByTipoEgreso() Group by the tipo_egreso column
 * @method     ChildHbfEgresosQuery groupByFechaEgreso() Group by the fecha_egreso column
 * @method     ChildHbfEgresosQuery groupByMonto() Group by the monto column
 * @method     ChildHbfEgresosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfEgresosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfEgresosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfEgresosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfEgresosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfEgresosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfEgresosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfEgresosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfEgresosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfEgresosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfEgresosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfEgresosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfEgresosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfEgresosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfEgresosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfEgresosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfEgresosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfEgresosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfEgresosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfEgresosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfEgresosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfEgresosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfEgresosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfEgresosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfEgresosQuery leftJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfEgresosQuery rightJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfEgresosQuery innerJoinCiUsuariosRelatedByIdCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfEgresosQuery joinWithCiUsuariosRelatedByIdCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithCiUsuariosRelatedByIdCliente() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfEgresosQuery rightJoinWithCiUsuariosRelatedByIdCliente() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 * @method     ChildHbfEgresosQuery innerJoinWithCiUsuariosRelatedByIdCliente() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdCliente relation
 *
 * @method     ChildHbfEgresosQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfEgresosQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfEgresosQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfEgresosQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfEgresosQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfEgresosQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfEgresosQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfEgresosQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfEgresosQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfEgresosQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfEgresosQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfEgresosQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfEgresosQuery leftJoinHbfClubs($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfEgresosQuery rightJoinHbfClubs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfClubs relation
 * @method     ChildHbfEgresosQuery innerJoinHbfClubs($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfClubs relation
 *
 * @method     ChildHbfEgresosQuery joinWithHbfClubs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfClubs relation
 *
 * @method     ChildHbfEgresosQuery leftJoinWithHbfClubs() Adds a LEFT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfEgresosQuery rightJoinWithHbfClubs() Adds a RIGHT JOIN clause and with to the query using the HbfClubs relation
 * @method     ChildHbfEgresosQuery innerJoinWithHbfClubs() Adds a INNER JOIN clause and with to the query using the HbfClubs relation
 *
 * @method     \CiUsuariosQuery|\HbfTurnosQuery|\HbfSesionesQuery|\HbfClubsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfEgresos findOne(ConnectionInterface $con = null) Return the first ChildHbfEgresos matching the query
 * @method     ChildHbfEgresos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfEgresos matching the query, or a new ChildHbfEgresos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfEgresos findOneByIdEgreso(int $id_egreso) Return the first ChildHbfEgresos filtered by the id_egreso column
 * @method     ChildHbfEgresos findOneByIdClub(int $id_club) Return the first ChildHbfEgresos filtered by the id_club column
 * @method     ChildHbfEgresos findOneByIdTurno(int $id_turno) Return the first ChildHbfEgresos filtered by the id_turno column
 * @method     ChildHbfEgresos findOneByIdSesion(int $id_sesion) Return the first ChildHbfEgresos filtered by the id_sesion column
 * @method     ChildHbfEgresos findOneByIdCliente(int $id_cliente) Return the first ChildHbfEgresos filtered by the id_cliente column
 * @method     ChildHbfEgresos findOneByDetalle(string $detalle) Return the first ChildHbfEgresos filtered by the detalle column
 * @method     ChildHbfEgresos findOneByTipoEgreso(string $tipo_egreso) Return the first ChildHbfEgresos filtered by the tipo_egreso column
 * @method     ChildHbfEgresos findOneByFechaEgreso(string $fecha_egreso) Return the first ChildHbfEgresos filtered by the fecha_egreso column
 * @method     ChildHbfEgresos findOneByMonto(string $monto) Return the first ChildHbfEgresos filtered by the monto column
 * @method     ChildHbfEgresos findOneByEstado(string $estado) Return the first ChildHbfEgresos filtered by the estado column
 * @method     ChildHbfEgresos findOneByChangeCount(int $change_count) Return the first ChildHbfEgresos filtered by the change_count column
 * @method     ChildHbfEgresos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfEgresos filtered by the id_user_modified column
 * @method     ChildHbfEgresos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfEgresos filtered by the id_user_created column
 * @method     ChildHbfEgresos findOneByDateModified(string $date_modified) Return the first ChildHbfEgresos filtered by the date_modified column
 * @method     ChildHbfEgresos findOneByDateCreated(string $date_created) Return the first ChildHbfEgresos filtered by the date_created column *

 * @method     ChildHbfEgresos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfEgresos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOne(ConnectionInterface $con = null) Return the first ChildHbfEgresos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfEgresos requireOneByIdEgreso(int $id_egreso) Return the first ChildHbfEgresos filtered by the id_egreso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdClub(int $id_club) Return the first ChildHbfEgresos filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdTurno(int $id_turno) Return the first ChildHbfEgresos filtered by the id_turno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdSesion(int $id_sesion) Return the first ChildHbfEgresos filtered by the id_sesion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdCliente(int $id_cliente) Return the first ChildHbfEgresos filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByDetalle(string $detalle) Return the first ChildHbfEgresos filtered by the detalle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByTipoEgreso(string $tipo_egreso) Return the first ChildHbfEgresos filtered by the tipo_egreso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByFechaEgreso(string $fecha_egreso) Return the first ChildHbfEgresos filtered by the fecha_egreso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByMonto(string $monto) Return the first ChildHbfEgresos filtered by the monto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByEstado(string $estado) Return the first ChildHbfEgresos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByChangeCount(int $change_count) Return the first ChildHbfEgresos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfEgresos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfEgresos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByDateModified(string $date_modified) Return the first ChildHbfEgresos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfEgresos requireOneByDateCreated(string $date_created) Return the first ChildHbfEgresos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfEgresos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfEgresos objects based on current ModelCriteria
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdEgreso(int $id_egreso) Return ChildHbfEgresos objects filtered by the id_egreso column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfEgresos objects filtered by the id_club column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdTurno(int $id_turno) Return ChildHbfEgresos objects filtered by the id_turno column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdSesion(int $id_sesion) Return ChildHbfEgresos objects filtered by the id_sesion column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildHbfEgresos objects filtered by the id_cliente column
 * @method     ChildHbfEgresos[]|ObjectCollection findByDetalle(string $detalle) Return ChildHbfEgresos objects filtered by the detalle column
 * @method     ChildHbfEgresos[]|ObjectCollection findByTipoEgreso(string $tipo_egreso) Return ChildHbfEgresos objects filtered by the tipo_egreso column
 * @method     ChildHbfEgresos[]|ObjectCollection findByFechaEgreso(string $fecha_egreso) Return ChildHbfEgresos objects filtered by the fecha_egreso column
 * @method     ChildHbfEgresos[]|ObjectCollection findByMonto(string $monto) Return ChildHbfEgresos objects filtered by the monto column
 * @method     ChildHbfEgresos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfEgresos objects filtered by the estado column
 * @method     ChildHbfEgresos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfEgresos objects filtered by the change_count column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfEgresos objects filtered by the id_user_modified column
 * @method     ChildHbfEgresos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfEgresos objects filtered by the id_user_created column
 * @method     ChildHbfEgresos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfEgresos objects filtered by the date_modified column
 * @method     ChildHbfEgresos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfEgresos objects filtered by the date_created column
 * @method     ChildHbfEgresos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfEgresosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfEgresosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfEgresos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfEgresosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfEgresosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfEgresosQuery) {
            return $criteria;
        }
        $query = new ChildHbfEgresosQuery();
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
     * @return ChildHbfEgresos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfEgresosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfEgresosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfEgresos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_egreso, id_club, id_turno, id_sesion, id_cliente, detalle, tipo_egreso, fecha_egreso, monto, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_egresos WHERE id_egreso = :p0';
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
            /** @var ChildHbfEgresos $obj */
            $obj = new ChildHbfEgresos();
            $obj->hydrate($row);
            HbfEgresosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfEgresos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_egreso column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEgreso(1234); // WHERE id_egreso = 1234
     * $query->filterByIdEgreso(array(12, 34)); // WHERE id_egreso IN (12, 34)
     * $query->filterByIdEgreso(array('min' => 12)); // WHERE id_egreso > 12
     * </code>
     *
     * @param     mixed $idEgreso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdEgreso($idEgreso = null, $comparison = null)
    {
        if (is_array($idEgreso)) {
            $useMinMax = false;
            if (isset($idEgreso['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $idEgreso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEgreso['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $idEgreso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $idEgreso, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdTurno($idTurno = null, $comparison = null)
    {
        if (is_array($idTurno)) {
            $useMinMax = false;
            if (isset($idTurno['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_TURNO, $idTurno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTurno['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_TURNO, $idTurno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_TURNO, $idTurno, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdSesion($idSesion = null, $comparison = null)
    {
        if (is_array($idSesion)) {
            $useMinMax = false;
            if (isset($idSesion['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_SESION, $idSesion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSesion['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_SESION, $idSesion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_SESION, $idSesion, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByDetalle($detalle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_DETALLE, $detalle, $comparison);
    }

    /**
     * Filter the query on the tipo_egreso column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoEgreso('fooValue');   // WHERE tipo_egreso = 'fooValue'
     * $query->filterByTipoEgreso('%fooValue%', Criteria::LIKE); // WHERE tipo_egreso LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipoEgreso The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByTipoEgreso($tipoEgreso = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipoEgreso)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_TIPO_EGRESO, $tipoEgreso, $comparison);
    }

    /**
     * Filter the query on the fecha_egreso column
     *
     * Example usage:
     * <code>
     * $query->filterByFechaEgreso('2011-03-14'); // WHERE fecha_egreso = '2011-03-14'
     * $query->filterByFechaEgreso('now'); // WHERE fecha_egreso = '2011-03-14'
     * $query->filterByFechaEgreso(array('max' => 'yesterday')); // WHERE fecha_egreso > '2011-03-13'
     * </code>
     *
     * @param     mixed $fechaEgreso The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByFechaEgreso($fechaEgreso = null, $comparison = null)
    {
        if (is_array($fechaEgreso)) {
            $useMinMax = false;
            if (isset($fechaEgreso['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_FECHA_EGRESO, $fechaEgreso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fechaEgreso['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_FECHA_EGRESO, $fechaEgreso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_FECHA_EGRESO, $fechaEgreso, $comparison);
    }

    /**
     * Filter the query on the monto column
     *
     * Example usage:
     * <code>
     * $query->filterByMonto(1234); // WHERE monto = 1234
     * $query->filterByMonto(array(12, 34)); // WHERE monto IN (12, 34)
     * $query->filterByMonto(array('min' => 12)); // WHERE monto > 12
     * </code>
     *
     * @param     mixed $monto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByMonto($monto = null, $comparison = null)
    {
        if (is_array($monto)) {
            $useMinMax = false;
            if (isset($monto['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_MONTO, $monto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monto['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_MONTO, $monto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_MONTO, $monto, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfEgresosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdCliente($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_CLIENTE, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_CLIENTE, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_TURNO, $hbfTurnos->getIdTurno(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_TURNO, $hbfTurnos->toKeyValue('PrimaryKey', 'IdTurno'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_SESION, $hbfSesiones->getIdSesion(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_SESION, $hbfSesiones->toKeyValue('PrimaryKey', 'IdSesion'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfClubs object
     *
     * @param \HbfClubs|ObjectCollection $hbfClubs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function filterByHbfClubs($hbfClubs, $comparison = null)
    {
        if ($hbfClubs instanceof \HbfClubs) {
            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), $comparison);
        } elseif ($hbfClubs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfEgresosTableMap::COL_ID_CLUB, $hbfClubs->toKeyValue('PrimaryKey', 'IdClub'), $comparison);
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
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildHbfEgresos $hbfEgresos Object to remove from the list of results
     *
     * @return $this|ChildHbfEgresosQuery The current query, for fluid interface
     */
    public function prune($hbfEgresos = null)
    {
        if ($hbfEgresos) {
            $this->addUsingAlias(HbfEgresosTableMap::COL_ID_EGRESO, $hbfEgresos->getIdEgreso(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_egresos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfEgresosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfEgresosTableMap::clearInstancePool();
            HbfEgresosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfEgresosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfEgresosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfEgresosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfEgresosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfEgresosQuery
