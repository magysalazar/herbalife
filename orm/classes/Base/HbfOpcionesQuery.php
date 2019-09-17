<?php

namespace Base;

use \HbfOpciones as ChildHbfOpciones;
use \HbfOpcionesQuery as ChildHbfOpcionesQuery;
use \Exception;
use \PDO;
use Map\HbfOpcionesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_opciones' table.
 *
 *
 *
 * @method     ChildHbfOpcionesQuery orderByIdOption($order = Criteria::ASC) Order by the id_option column
 * @method     ChildHbfOpcionesQuery orderByTabla($order = Criteria::ASC) Order by the tabla column
 * @method     ChildHbfOpcionesQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     ChildHbfOpcionesQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildHbfOpcionesQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildHbfOpcionesQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method     ChildHbfOpcionesQuery orderByNumFichas($order = Criteria::ASC) Order by the num_fichas column
 * @method     ChildHbfOpcionesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfOpcionesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfOpcionesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfOpcionesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfOpcionesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfOpcionesQuery groupByIdOption() Group by the id_option column
 * @method     ChildHbfOpcionesQuery groupByTabla() Group by the tabla column
 * @method     ChildHbfOpcionesQuery groupByTipo() Group by the tipo column
 * @method     ChildHbfOpcionesQuery groupByNombre() Group by the nombre column
 * @method     ChildHbfOpcionesQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildHbfOpcionesQuery groupByPrecio() Group by the precio column
 * @method     ChildHbfOpcionesQuery groupByNumFichas() Group by the num_fichas column
 * @method     ChildHbfOpcionesQuery groupByEstado() Group by the estado column
 * @method     ChildHbfOpcionesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfOpcionesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfOpcionesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfOpcionesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfOpcionesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfOpcionesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfOpcionesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfOpcionesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfOpcionesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfOpcionesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfOpcionesQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfOpcionesQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfOpcionesQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfOpcionesQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfOpcionesQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfOpcionesQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfOpcionesQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfOpcionesQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfOpcionesQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfOpcionesQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfOpcionesQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildHbfOpcionesQuery rightJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildHbfOpcionesQuery innerJoinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildHbfOpcionesQuery joinWithCiUsuariosRelatedByIdOptionTipoAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildHbfOpcionesQuery rightJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 * @method     ChildHbfOpcionesQuery innerJoinWithCiUsuariosRelatedByIdOptionTipoAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinCiUsuariosRelatedByIdOptionTipoRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 * @method     ChildHbfOpcionesQuery rightJoinCiUsuariosRelatedByIdOptionTipoRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 * @method     ChildHbfOpcionesQuery innerJoinCiUsuariosRelatedByIdOptionTipoRole($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 *
 * @method     ChildHbfOpcionesQuery joinWithCiUsuariosRelatedByIdOptionTipoRole($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithCiUsuariosRelatedByIdOptionTipoRole() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 * @method     ChildHbfOpcionesQuery rightJoinWithCiUsuariosRelatedByIdOptionTipoRole() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 * @method     ChildHbfOpcionesQuery innerJoinWithCiUsuariosRelatedByIdOptionTipoRole() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildHbfOpcionesQuery rightJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildHbfOpcionesQuery innerJoinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildHbfOpcionesQuery joinWithCiUsuariosRelatedByIdOptionNivelAsociado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildHbfOpcionesQuery rightJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 * @method     ChildHbfOpcionesQuery innerJoinWithCiUsuariosRelatedByIdOptionNivelAsociado() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinHbfPrepagos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfOpcionesQuery rightJoinHbfPrepagos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPrepagos relation
 * @method     ChildHbfOpcionesQuery innerJoinHbfPrepagos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfOpcionesQuery joinWithHbfPrepagos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithHbfPrepagos() Adds a LEFT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfOpcionesQuery rightJoinWithHbfPrepagos() Adds a RIGHT JOIN clause and with to the query using the HbfPrepagos relation
 * @method     ChildHbfOpcionesQuery innerJoinWithHbfPrepagos() Adds a INNER JOIN clause and with to the query using the HbfPrepagos relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfOpcionesQuery rightJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfOpcionesQuery innerJoinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfOpcionesQuery joinWithHbfProductosRelatedByIdOptionCategoriaProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfOpcionesQuery rightJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfOpcionesQuery innerJoinWithHbfProductosRelatedByIdOptionCategoriaProducto() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfOpcionesQuery rightJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfOpcionesQuery innerJoinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfOpcionesQuery joinWithHbfProductosRelatedByIdOptionTipoProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a LEFT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfOpcionesQuery rightJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a RIGHT JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfOpcionesQuery innerJoinWithHbfProductosRelatedByIdOptionTipoProducto() Adds a INNER JOIN clause and with to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinHbfVasos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfOpcionesQuery rightJoinHbfVasos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVasos relation
 * @method     ChildHbfOpcionesQuery innerJoinHbfVasos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVasos relation
 *
 * @method     ChildHbfOpcionesQuery joinWithHbfVasos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVasos relation
 *
 * @method     ChildHbfOpcionesQuery leftJoinWithHbfVasos() Adds a LEFT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfOpcionesQuery rightJoinWithHbfVasos() Adds a RIGHT JOIN clause and with to the query using the HbfVasos relation
 * @method     ChildHbfOpcionesQuery innerJoinWithHbfVasos() Adds a INNER JOIN clause and with to the query using the HbfVasos relation
 *
 * @method     \CiUsuariosQuery|\HbfPrepagosQuery|\HbfProductosQuery|\HbfVasosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfOpciones findOne(ConnectionInterface $con = null) Return the first ChildHbfOpciones matching the query
 * @method     ChildHbfOpciones findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfOpciones matching the query, or a new ChildHbfOpciones object populated from the query conditions when no match is found
 *
 * @method     ChildHbfOpciones findOneByIdOption(int $id_option) Return the first ChildHbfOpciones filtered by the id_option column
 * @method     ChildHbfOpciones findOneByTabla(string $tabla) Return the first ChildHbfOpciones filtered by the tabla column
 * @method     ChildHbfOpciones findOneByTipo(string $tipo) Return the first ChildHbfOpciones filtered by the tipo column
 * @method     ChildHbfOpciones findOneByNombre(string $nombre) Return the first ChildHbfOpciones filtered by the nombre column
 * @method     ChildHbfOpciones findOneByDescripcion(string $descripcion) Return the first ChildHbfOpciones filtered by the descripcion column
 * @method     ChildHbfOpciones findOneByPrecio(string $precio) Return the first ChildHbfOpciones filtered by the precio column
 * @method     ChildHbfOpciones findOneByNumFichas(int $num_fichas) Return the first ChildHbfOpciones filtered by the num_fichas column
 * @method     ChildHbfOpciones findOneByEstado(string $estado) Return the first ChildHbfOpciones filtered by the estado column
 * @method     ChildHbfOpciones findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfOpciones filtered by the id_user_modified column
 * @method     ChildHbfOpciones findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfOpciones filtered by the id_user_created column
 * @method     ChildHbfOpciones findOneByDateModified(string $date_modified) Return the first ChildHbfOpciones filtered by the date_modified column
 * @method     ChildHbfOpciones findOneByDateCreated(string $date_created) Return the first ChildHbfOpciones filtered by the date_created column *

 * @method     ChildHbfOpciones requirePk($key, ConnectionInterface $con = null) Return the ChildHbfOpciones by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOne(ConnectionInterface $con = null) Return the first ChildHbfOpciones matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfOpciones requireOneByIdOption(int $id_option) Return the first ChildHbfOpciones filtered by the id_option column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByTabla(string $tabla) Return the first ChildHbfOpciones filtered by the tabla column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByTipo(string $tipo) Return the first ChildHbfOpciones filtered by the tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByNombre(string $nombre) Return the first ChildHbfOpciones filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByDescripcion(string $descripcion) Return the first ChildHbfOpciones filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByPrecio(string $precio) Return the first ChildHbfOpciones filtered by the precio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByNumFichas(int $num_fichas) Return the first ChildHbfOpciones filtered by the num_fichas column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByEstado(string $estado) Return the first ChildHbfOpciones filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfOpciones filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfOpciones filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByDateModified(string $date_modified) Return the first ChildHbfOpciones filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfOpciones requireOneByDateCreated(string $date_created) Return the first ChildHbfOpciones filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfOpciones[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfOpciones objects based on current ModelCriteria
 * @method     ChildHbfOpciones[]|ObjectCollection findByIdOption(int $id_option) Return ChildHbfOpciones objects filtered by the id_option column
 * @method     ChildHbfOpciones[]|ObjectCollection findByTabla(string $tabla) Return ChildHbfOpciones objects filtered by the tabla column
 * @method     ChildHbfOpciones[]|ObjectCollection findByTipo(string $tipo) Return ChildHbfOpciones objects filtered by the tipo column
 * @method     ChildHbfOpciones[]|ObjectCollection findByNombre(string $nombre) Return ChildHbfOpciones objects filtered by the nombre column
 * @method     ChildHbfOpciones[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildHbfOpciones objects filtered by the descripcion column
 * @method     ChildHbfOpciones[]|ObjectCollection findByPrecio(string $precio) Return ChildHbfOpciones objects filtered by the precio column
 * @method     ChildHbfOpciones[]|ObjectCollection findByNumFichas(int $num_fichas) Return ChildHbfOpciones objects filtered by the num_fichas column
 * @method     ChildHbfOpciones[]|ObjectCollection findByEstado(string $estado) Return ChildHbfOpciones objects filtered by the estado column
 * @method     ChildHbfOpciones[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfOpciones objects filtered by the id_user_modified column
 * @method     ChildHbfOpciones[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfOpciones objects filtered by the id_user_created column
 * @method     ChildHbfOpciones[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfOpciones objects filtered by the date_modified column
 * @method     ChildHbfOpciones[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfOpciones objects filtered by the date_created column
 * @method     ChildHbfOpciones[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfOpcionesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfOpcionesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfOpciones', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfOpcionesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfOpcionesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfOpcionesQuery) {
            return $criteria;
        }
        $query = new ChildHbfOpcionesQuery();
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
     * @return ChildHbfOpciones|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfOpcionesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfOpciones A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_option, tabla, tipo, nombre, descripcion, precio, num_fichas, estado, id_user_modified, id_user_created, date_modified, date_created FROM hbf_opciones WHERE id_option = :p0';
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
            /** @var ChildHbfOpciones $obj */
            $obj = new ChildHbfOpciones();
            $obj->hydrate($row);
            HbfOpcionesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfOpciones|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOption(1234); // WHERE id_option = 1234
     * $query->filterByIdOption(array(12, 34)); // WHERE id_option IN (12, 34)
     * $query->filterByIdOption(array('min' => 12)); // WHERE id_option > 12
     * </code>
     *
     * @param     mixed $idOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByIdOption($idOption = null, $comparison = null)
    {
        if (is_array($idOption)) {
            $useMinMax = false;
            if (isset($idOption['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $idOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOption['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $idOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $idOption, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByTabla($tabla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tabla)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_TABLA, $tabla, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%', Criteria::LIKE); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_TIPO, $tipo, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_NOMBRE, $nombre, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE precio > 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query on the num_fichas column
     *
     * Example usage:
     * <code>
     * $query->filterByNumFichas(1234); // WHERE num_fichas = 1234
     * $query->filterByNumFichas(array(12, 34)); // WHERE num_fichas IN (12, 34)
     * $query->filterByNumFichas(array('min' => 12)); // WHERE num_fichas > 12
     * </code>
     *
     * @param     mixed $numFichas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByNumFichas($numFichas = null, $comparison = null)
    {
        if (is_array($numFichas)) {
            $useMinMax = false;
            if (isset($numFichas['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_NUM_FICHAS, $numFichas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numFichas['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_NUM_FICHAS, $numFichas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_NUM_FICHAS, $numFichas, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfOpcionesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
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
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
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
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOptionTipoAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $ciUsuarios->getIdOptionTipoAsociado(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOptionTipoAsociadoQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOptionTipoAsociado() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOptionTipoAsociado');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOptionTipoAsociado');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOptionTipoAsociado relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOptionTipoAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOptionTipoAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOptionTipoAsociado', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOptionTipoRole($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $ciUsuarios->getIdOptionTipoRole(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOptionTipoRoleQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOptionTipoRole() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOptionTipoRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOptionTipoRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOptionTipoRole');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOptionTipoRole');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOptionTipoRole relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOptionTipoRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOptionTipoRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOptionTipoRole', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdOptionNivelAsociado($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $ciUsuarios->getIdOptionNivelAsociado(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            return $this
                ->useCiUsuariosRelatedByIdOptionNivelAsociadoQuery()
                ->filterByPrimaryKeys($ciUsuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCiUsuariosRelatedByIdOptionNivelAsociado() only accepts arguments of type \CiUsuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiUsuariosRelatedByIdOptionNivelAsociado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiUsuariosRelatedByIdOptionNivelAsociado');

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
            $this->addJoinObject($join, 'CiUsuariosRelatedByIdOptionNivelAsociado');
        }

        return $this;
    }

    /**
     * Use the CiUsuariosRelatedByIdOptionNivelAsociado relation CiUsuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiUsuariosQuery A secondary query class using the current class as primary query
     */
    public function useCiUsuariosRelatedByIdOptionNivelAsociadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCiUsuariosRelatedByIdOptionNivelAsociado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiUsuariosRelatedByIdOptionNivelAsociado', '\CiUsuariosQuery');
    }

    /**
     * Filter the query by a related \HbfPrepagos object
     *
     * @param \HbfPrepagos|ObjectCollection $hbfPrepagos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByHbfPrepagos($hbfPrepagos, $comparison = null)
    {
        if ($hbfPrepagos instanceof \HbfPrepagos) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $hbfPrepagos->getIdOptionTipoPrepago(), $comparison);
        } elseif ($hbfPrepagos instanceof ObjectCollection) {
            return $this
                ->useHbfPrepagosQuery()
                ->filterByPrimaryKeys($hbfPrepagos->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdOptionCategoriaProducto($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $hbfProductos->getIdOptionCategoriaProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdOptionCategoriaProductoQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdOptionCategoriaProducto() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdOptionCategoriaProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdOptionCategoriaProducto');

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
            $this->addJoinObject($join, 'HbfProductosRelatedByIdOptionCategoriaProducto');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdOptionCategoriaProducto relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdOptionCategoriaProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdOptionCategoriaProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdOptionCategoriaProducto', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfProductos object
     *
     * @param \HbfProductos|ObjectCollection $hbfProductos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByHbfProductosRelatedByIdOptionTipoProducto($hbfProductos, $comparison = null)
    {
        if ($hbfProductos instanceof \HbfProductos) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $hbfProductos->getIdOptionTipoProducto(), $comparison);
        } elseif ($hbfProductos instanceof ObjectCollection) {
            return $this
                ->useHbfProductosRelatedByIdOptionTipoProductoQuery()
                ->filterByPrimaryKeys($hbfProductos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfProductosRelatedByIdOptionTipoProducto() only accepts arguments of type \HbfProductos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfProductosRelatedByIdOptionTipoProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinHbfProductosRelatedByIdOptionTipoProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfProductosRelatedByIdOptionTipoProducto');

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
            $this->addJoinObject($join, 'HbfProductosRelatedByIdOptionTipoProducto');
        }

        return $this;
    }

    /**
     * Use the HbfProductosRelatedByIdOptionTipoProducto relation HbfProductos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfProductosQuery A secondary query class using the current class as primary query
     */
    public function useHbfProductosRelatedByIdOptionTipoProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHbfProductosRelatedByIdOptionTipoProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfProductosRelatedByIdOptionTipoProducto', '\HbfProductosQuery');
    }

    /**
     * Filter the query by a related \HbfVasos object
     *
     * @param \HbfVasos|ObjectCollection $hbfVasos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function filterByHbfVasos($hbfVasos, $comparison = null)
    {
        if ($hbfVasos instanceof \HbfVasos) {
            return $this
                ->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $hbfVasos->getIdOptionTipoProducto(), $comparison);
        } elseif ($hbfVasos instanceof ObjectCollection) {
            return $this
                ->useHbfVasosQuery()
                ->filterByPrimaryKeys($hbfVasos->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function joinHbfVasos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useHbfVasosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfVasos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfVasos', '\HbfVasosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHbfOpciones $hbfOpciones Object to remove from the list of results
     *
     * @return $this|ChildHbfOpcionesQuery The current query, for fluid interface
     */
    public function prune($hbfOpciones = null)
    {
        if ($hbfOpciones) {
            $this->addUsingAlias(HbfOpcionesTableMap::COL_ID_OPTION, $hbfOpciones->getIdOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_opciones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfOpcionesTableMap::clearInstancePool();
            HbfOpcionesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfOpcionesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfOpcionesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfOpcionesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfOpcionesQuery
