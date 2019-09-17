<?php

namespace Base;

use \HbfClubs as ChildHbfClubs;
use \HbfClubsQuery as ChildHbfClubsQuery;
use \Exception;
use \PDO;
use Map\HbfClubsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_clubs' table.
 *
 *
 *
 * @method     ChildHbfClubsQuery orderByIdClub($order = Criteria::ASC) Order by the id_club column
 * @method     ChildHbfClubsQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildHbfClubsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildHbfClubsQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     ChildHbfClubsQuery orderByLicencia($order = Criteria::ASC) Order by the licencia column
 * @method     ChildHbfClubsQuery orderByDireccionGps($order = Criteria::ASC) Order by the direccion_gps column
 * @method     ChildHbfClubsQuery orderByIdsMiembros($order = Criteria::ASC) Order by the ids_miembros column
 * @method     ChildHbfClubsQuery orderByIdsTurnos($order = Criteria::ASC) Order by the ids_turnos column
 * @method     ChildHbfClubsQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfClubsQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfClubsQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfClubsQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfClubsQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfClubsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfClubsQuery groupByIdClub() Group by the id_club column
 * @method     ChildHbfClubsQuery groupByNombre() Group by the nombre column
 * @method     ChildHbfClubsQuery groupByEmail() Group by the email column
 * @method     ChildHbfClubsQuery groupByDireccion() Group by the direccion column
 * @method     ChildHbfClubsQuery groupByLicencia() Group by the licencia column
 * @method     ChildHbfClubsQuery groupByDireccionGps() Group by the direccion_gps column
 * @method     ChildHbfClubsQuery groupByIdsMiembros() Group by the ids_miembros column
 * @method     ChildHbfClubsQuery groupByIdsTurnos() Group by the ids_turnos column
 * @method     ChildHbfClubsQuery groupByEstado() Group by the estado column
 * @method     ChildHbfClubsQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfClubsQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfClubsQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfClubsQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfClubsQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfClubsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfClubsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfClubsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfClubsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfClubsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfClubsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfClubsQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfClubsQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfClubsQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfClubsQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfClubsQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfClubsQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfClubsQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfClubsQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfClubsQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfClubsQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfClubsQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfClubsQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfClubsQuery leftJoinCiUsuariosRelatedByIdClub($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdClub relation
 * @method     ChildHbfClubsQuery rightJoinCiUsuariosRelatedByIdClub($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdClub relation
 * @method     ChildHbfClubsQuery innerJoinCiUsuariosRelatedByIdClub($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdClub relation
 *
 * @method     ChildHbfClubsQuery joinWithCiUsuariosRelatedByIdClub($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdClub relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithCiUsuariosRelatedByIdClub() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdClub relation
 * @method     ChildHbfClubsQuery rightJoinWithCiUsuariosRelatedByIdClub() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdClub relation
 * @method     ChildHbfClubsQuery innerJoinWithCiUsuariosRelatedByIdClub() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdClub relation
 *
 * @method     ChildHbfClubsQuery leftJoinHbfComandas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfClubsQuery rightJoinHbfComandas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfComandas relation
 * @method     ChildHbfClubsQuery innerJoinHbfComandas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfComandas relation
 *
 * @method     ChildHbfClubsQuery joinWithHbfComandas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithHbfComandas() Adds a LEFT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfClubsQuery rightJoinWithHbfComandas() Adds a RIGHT JOIN clause and with to the query using the HbfComandas relation
 * @method     ChildHbfClubsQuery innerJoinWithHbfComandas() Adds a INNER JOIN clause and with to the query using the HbfComandas relation
 *
 * @method     ChildHbfClubsQuery leftJoinHbfEgresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfClubsQuery rightJoinHbfEgresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfEgresos relation
 * @method     ChildHbfClubsQuery innerJoinHbfEgresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfEgresos relation
 *
 * @method     ChildHbfClubsQuery joinWithHbfEgresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithHbfEgresos() Adds a LEFT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfClubsQuery rightJoinWithHbfEgresos() Adds a RIGHT JOIN clause and with to the query using the HbfEgresos relation
 * @method     ChildHbfClubsQuery innerJoinWithHbfEgresos() Adds a INNER JOIN clause and with to the query using the HbfEgresos relation
 *
 * @method     ChildHbfClubsQuery leftJoinHbfSesiones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfClubsQuery rightJoinHbfSesiones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfSesiones relation
 * @method     ChildHbfClubsQuery innerJoinHbfSesiones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfSesiones relation
 *
 * @method     ChildHbfClubsQuery joinWithHbfSesiones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithHbfSesiones() Adds a LEFT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfClubsQuery rightJoinWithHbfSesiones() Adds a RIGHT JOIN clause and with to the query using the HbfSesiones relation
 * @method     ChildHbfClubsQuery innerJoinWithHbfSesiones() Adds a INNER JOIN clause and with to the query using the HbfSesiones relation
 *
 * @method     ChildHbfClubsQuery leftJoinHbfTurnos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfClubsQuery rightJoinHbfTurnos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfTurnos relation
 * @method     ChildHbfClubsQuery innerJoinHbfTurnos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfTurnos relation
 *
 * @method     ChildHbfClubsQuery joinWithHbfTurnos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithHbfTurnos() Adds a LEFT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfClubsQuery rightJoinWithHbfTurnos() Adds a RIGHT JOIN clause and with to the query using the HbfTurnos relation
 * @method     ChildHbfClubsQuery innerJoinWithHbfTurnos() Adds a INNER JOIN clause and with to the query using the HbfTurnos relation
 *
 * @method     ChildHbfClubsQuery leftJoinHbfVentas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfClubsQuery rightJoinHbfVentas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfClubsQuery innerJoinHbfVentas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentas relation
 *
 * @method     ChildHbfClubsQuery joinWithHbfVentas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentas relation
 *
 * @method     ChildHbfClubsQuery leftJoinWithHbfVentas() Adds a LEFT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfClubsQuery rightJoinWithHbfVentas() Adds a RIGHT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfClubsQuery innerJoinWithHbfVentas() Adds a INNER JOIN clause and with to the query using the HbfVentas relation
 *
 * @method     \CiUsuariosQuery|\HbfComandasQuery|\HbfEgresosQuery|\HbfSesionesQuery|\HbfTurnosQuery|\HbfVentasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfClubs findOne(ConnectionInterface $con = null) Return the first ChildHbfClubs matching the query
 * @method     ChildHbfClubs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfClubs matching the query, or a new ChildHbfClubs object populated from the query conditions when no match is found
 *
 * @method     ChildHbfClubs findOneByIdClub(int $id_club) Return the first ChildHbfClubs filtered by the id_club column
 * @method     ChildHbfClubs findOneByNombre(string $nombre) Return the first ChildHbfClubs filtered by the nombre column
 * @method     ChildHbfClubs findOneByEmail(string $email) Return the first ChildHbfClubs filtered by the email column
 * @method     ChildHbfClubs findOneByDireccion(string $direccion) Return the first ChildHbfClubs filtered by the direccion column
 * @method     ChildHbfClubs findOneByLicencia(string $licencia) Return the first ChildHbfClubs filtered by the licencia column
 * @method     ChildHbfClubs findOneByDireccionGps(string $direccion_gps) Return the first ChildHbfClubs filtered by the direccion_gps column
 * @method     ChildHbfClubs findOneByIdsMiembros(string $ids_miembros) Return the first ChildHbfClubs filtered by the ids_miembros column
 * @method     ChildHbfClubs findOneByIdsTurnos(string $ids_turnos) Return the first ChildHbfClubs filtered by the ids_turnos column
 * @method     ChildHbfClubs findOneByEstado(string $estado) Return the first ChildHbfClubs filtered by the estado column
 * @method     ChildHbfClubs findOneByChangeCount(int $change_count) Return the first ChildHbfClubs filtered by the change_count column
 * @method     ChildHbfClubs findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfClubs filtered by the id_user_modified column
 * @method     ChildHbfClubs findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfClubs filtered by the id_user_created column
 * @method     ChildHbfClubs findOneByDateModified(string $date_modified) Return the first ChildHbfClubs filtered by the date_modified column
 * @method     ChildHbfClubs findOneByDateCreated(string $date_created) Return the first ChildHbfClubs filtered by the date_created column *

 * @method     ChildHbfClubs requirePk($key, ConnectionInterface $con = null) Return the ChildHbfClubs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOne(ConnectionInterface $con = null) Return the first ChildHbfClubs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfClubs requireOneByIdClub(int $id_club) Return the first ChildHbfClubs filtered by the id_club column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByNombre(string $nombre) Return the first ChildHbfClubs filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByEmail(string $email) Return the first ChildHbfClubs filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByDireccion(string $direccion) Return the first ChildHbfClubs filtered by the direccion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByLicencia(string $licencia) Return the first ChildHbfClubs filtered by the licencia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByDireccionGps(string $direccion_gps) Return the first ChildHbfClubs filtered by the direccion_gps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByIdsMiembros(string $ids_miembros) Return the first ChildHbfClubs filtered by the ids_miembros column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByIdsTurnos(string $ids_turnos) Return the first ChildHbfClubs filtered by the ids_turnos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByEstado(string $estado) Return the first ChildHbfClubs filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByChangeCount(int $change_count) Return the first ChildHbfClubs filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfClubs filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfClubs filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByDateModified(string $date_modified) Return the first ChildHbfClubs filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfClubs requireOneByDateCreated(string $date_created) Return the first ChildHbfClubs filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfClubs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfClubs objects based on current ModelCriteria
 * @method     ChildHbfClubs[]|ObjectCollection findByIdClub(int $id_club) Return ChildHbfClubs objects filtered by the id_club column
 * @method     ChildHbfClubs[]|ObjectCollection findByNombre(string $nombre) Return ChildHbfClubs objects filtered by the nombre column
 * @method     ChildHbfClubs[]|ObjectCollection findByEmail(string $email) Return ChildHbfClubs objects filtered by the email column
 * @method     ChildHbfClubs[]|ObjectCollection findByDireccion(string $direccion) Return ChildHbfClubs objects filtered by the direccion column
 * @method     ChildHbfClubs[]|ObjectCollection findByLicencia(string $licencia) Return ChildHbfClubs objects filtered by the licencia column
 * @method     ChildHbfClubs[]|ObjectCollection findByDireccionGps(string $direccion_gps) Return ChildHbfClubs objects filtered by the direccion_gps column
 * @method     ChildHbfClubs[]|ObjectCollection findByIdsMiembros(string $ids_miembros) Return ChildHbfClubs objects filtered by the ids_miembros column
 * @method     ChildHbfClubs[]|ObjectCollection findByIdsTurnos(string $ids_turnos) Return ChildHbfClubs objects filtered by the ids_turnos column
 * @method     ChildHbfClubs[]|ObjectCollection findByEstado(string $estado) Return ChildHbfClubs objects filtered by the estado column
 * @method     ChildHbfClubs[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfClubs objects filtered by the change_count column
 * @method     ChildHbfClubs[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfClubs objects filtered by the id_user_modified column
 * @method     ChildHbfClubs[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfClubs objects filtered by the id_user_created column
 * @method     ChildHbfClubs[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfClubs objects filtered by the date_modified column
 * @method     ChildHbfClubs[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfClubs objects filtered by the date_created column
 * @method     ChildHbfClubs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfClubsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfClubsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfClubs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfClubsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfClubsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfClubsQuery) {
            return $criteria;
        }
        $query = new ChildHbfClubsQuery();
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
     * @return ChildHbfClubs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfClubsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfClubsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfClubs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_club, nombre, email, direccion, licencia, direccion_gps, ids_miembros, ids_turnos, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_clubs WHERE id_club = :p0';
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
            /** @var ChildHbfClubs $obj */
            $obj = new ChildHbfClubs();
            $obj->hydrate($row);
            HbfClubsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfClubs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $keys, Criteria::IN);
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
     * @param     mixed $idClub The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByIdClub($idClub = null, $comparison = null)
    {
        if (is_array($idClub)) {
            $useMinMax = false;
            if (isset($idClub['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $idClub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClub['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $idClub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $idClub, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the direccion column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
     * $query->filterByDireccion('%fooValue%', Criteria::LIKE); // WHERE direccion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccion The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByDireccion($direccion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_DIRECCION, $direccion, $comparison);
    }

    /**
     * Filter the query on the licencia column
     *
     * Example usage:
     * <code>
     * $query->filterByLicencia('fooValue');   // WHERE licencia = 'fooValue'
     * $query->filterByLicencia('%fooValue%', Criteria::LIKE); // WHERE licencia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $licencia The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByLicencia($licencia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($licencia)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_LICENCIA, $licencia, $comparison);
    }

    /**
     * Filter the query on the direccion_gps column
     *
     * Example usage:
     * <code>
     * $query->filterByDireccionGps('fooValue');   // WHERE direccion_gps = 'fooValue'
     * $query->filterByDireccionGps('%fooValue%', Criteria::LIKE); // WHERE direccion_gps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direccionGps The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByDireccionGps($direccionGps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direccionGps)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_DIRECCION_GPS, $direccionGps, $comparison);
    }

    /**
     * Filter the query on the ids_miembros column
     *
     * Example usage:
     * <code>
     * $query->filterByIdsMiembros('fooValue');   // WHERE ids_miembros = 'fooValue'
     * $query->filterByIdsMiembros('%fooValue%', Criteria::LIKE); // WHERE ids_miembros LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idsMiembros The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByIdsMiembros($idsMiembros = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idsMiembros)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_IDS_MIEMBROS, $idsMiembros, $comparison);
    }

    /**
     * Filter the query on the ids_turnos column
     *
     * Example usage:
     * <code>
     * $query->filterByIdsTurnos('fooValue');   // WHERE ids_turnos = 'fooValue'
     * $query->filterByIdsTurnos('%fooValue%', Criteria::LIKE); // WHERE ids_turnos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idsTurnos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByIdsTurnos($idsTurnos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idsTurnos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_IDS_TURNOS, $idsTurnos, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfClubsTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfClubsTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
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
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
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
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdClub($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $ciUsuarios->getIdClub(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdClubQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdClub() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdClub relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdClub($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdClub');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdClub');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdClub relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdClubQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdClub($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdClub', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfComandas object
     *
     * @param \HbfComandas|ObjectCollection $hbfComandas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByHbfComandas($hbfComandas, $comparison = null)
    {
        if ($hbfComandas instanceof \HbfComandas) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfComandas->getIdClub(), $comparison);
        } elseif ($hbfComandas instanceof ObjectCollection) {
            return $this
                ->useHbfComandasQuery()
                ->filterByPrimaryKeys($hbfComandas->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinHbfComandas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfComandasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfComandas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfComandas', '\HbfComandasQuery');
    }

    /**
     * Filter the query by a related \HbfEgresos object
     *
     * @param \HbfEgresos|ObjectCollection $hbfEgresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByHbfEgresos($hbfEgresos, $comparison = null)
    {
        if ($hbfEgresos instanceof \HbfEgresos) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfEgresos->getIdClub(), $comparison);
        } elseif ($hbfEgresos instanceof ObjectCollection) {
            return $this
                ->useHbfEgresosQuery()
                ->filterByPrimaryKeys($hbfEgresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfEgresos() only accepts arguments of type \HbfEgresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfEgresos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinHbfEgresos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfEgresos');

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
            $this->addJoinObject($join, 'HbfEgresos');
        }

        return $this;
    }

    /**
     * Use the HbfEgresos relation HbfEgresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfEgresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfEgresosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfEgresos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfEgresos', '\HbfEgresosQuery');
    }

    /**
     * Filter the query by a related \HbfSesiones object
     *
     * @param \HbfSesiones|ObjectCollection $hbfSesiones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByHbfSesiones($hbfSesiones, $comparison = null)
    {
        if ($hbfSesiones instanceof \HbfSesiones) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfSesiones->getIdClub(), $comparison);
        } elseif ($hbfSesiones instanceof ObjectCollection) {
            return $this
                ->useHbfSesionesQuery()
                ->filterByPrimaryKeys($hbfSesiones->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinHbfSesiones($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfSesionesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfSesiones($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfSesiones', '\HbfSesionesQuery');
    }

    /**
     * Filter the query by a related \HbfTurnos object
     *
     * @param \HbfTurnos|ObjectCollection $hbfTurnos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByHbfTurnos($hbfTurnos, $comparison = null)
    {
        if ($hbfTurnos instanceof \HbfTurnos) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfTurnos->getIdClub(), $comparison);
        } elseif ($hbfTurnos instanceof ObjectCollection) {
            return $this
                ->useHbfTurnosQuery()
                ->filterByPrimaryKeys($hbfTurnos->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinHbfTurnos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useHbfTurnosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfTurnos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfTurnos', '\HbfTurnosQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfClubsQuery The current query, for fluid interface
     */
    public function filterByHbfVentas($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfVentas->getIdClub(), $comparison);
        } elseif ($hbfVentas instanceof ObjectCollection) {
            return $this
                ->useHbfVentasQuery()
                ->filterByPrimaryKeys($hbfVentas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfVentas() only accepts arguments of type \HbfVentas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfVentas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function joinHbfVentas($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfVentas');

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
            $this->addJoinObject($join, 'HbfVentas');
        }

        return $this;
    }

    /**
     * Use the HbfVentas relation HbfVentas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfVentasQuery A secondary query class using the current class as primary query
     */
    public function useHbfVentasQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfVentas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVentas', '\HbfVentasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfClubs $hbfClubs Object to remove from the list of results
     *
     * @return $this|ChildHbfClubsQuery The current query, for fluid interface
     */
    public function prune($hbfClubs = null)
    {
        if ($hbfClubs) {
            $this->addUsingAlias(HbfClubsTableMap::COL_ID_CLUB, $hbfClubs->getIdClub(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_clubs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfClubsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfClubsTableMap::clearInstancePool();
            HbfClubsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfClubsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfClubsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfClubsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfClubsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfClubsQuery
