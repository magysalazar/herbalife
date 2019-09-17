<?php

namespace Base;

use \HbfProductos as ChildHbfProductos;
use \HbfProductosQuery as ChildHbfProductosQuery;
use \Exception;
use \PDO;
use Map\HbfProductosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hbf_productos' table.
 *
 *
 *
 * @method     ChildHbfProductosQuery orderByIdProducto($order = Criteria::ASC) Order by the id_producto column
 * @method     ChildHbfProductosQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildHbfProductosQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     ChildHbfProductosQuery orderByIdOptionTipoProducto($order = Criteria::ASC) Order by the id_option_tipo_producto column
 * @method     ChildHbfProductosQuery orderByIdOptionCategoriaProducto($order = Criteria::ASC) Order by the id_option_categoria_producto column
 * @method     ChildHbfProductosQuery orderByFotoProducto($order = Criteria::ASC) Order by the foto_producto column
 * @method     ChildHbfProductosQuery orderByPrecioVenta($order = Criteria::ASC) Order by the precio_venta column
 * @method     ChildHbfProductosQuery orderByPrecioPorcion($order = Criteria::ASC) Order by the precio_porcion column
 * @method     ChildHbfProductosQuery orderByPrecioCompra($order = Criteria::ASC) Order by the precio_compra column
 * @method     ChildHbfProductosQuery orderByNumPorciones($order = Criteria::ASC) Order by the num_porciones column
 * @method     ChildHbfProductosQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildHbfProductosQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildHbfProductosQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildHbfProductosQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildHbfProductosQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildHbfProductosQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildHbfProductosQuery groupByIdProducto() Group by the id_producto column
 * @method     ChildHbfProductosQuery groupByNombre() Group by the nombre column
 * @method     ChildHbfProductosQuery groupByDescripcion() Group by the descripcion column
 * @method     ChildHbfProductosQuery groupByIdOptionTipoProducto() Group by the id_option_tipo_producto column
 * @method     ChildHbfProductosQuery groupByIdOptionCategoriaProducto() Group by the id_option_categoria_producto column
 * @method     ChildHbfProductosQuery groupByFotoProducto() Group by the foto_producto column
 * @method     ChildHbfProductosQuery groupByPrecioVenta() Group by the precio_venta column
 * @method     ChildHbfProductosQuery groupByPrecioPorcion() Group by the precio_porcion column
 * @method     ChildHbfProductosQuery groupByPrecioCompra() Group by the precio_compra column
 * @method     ChildHbfProductosQuery groupByNumPorciones() Group by the num_porciones column
 * @method     ChildHbfProductosQuery groupByEstado() Group by the estado column
 * @method     ChildHbfProductosQuery groupByChangeCount() Group by the change_count column
 * @method     ChildHbfProductosQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildHbfProductosQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildHbfProductosQuery groupByDateModified() Group by the date_modified column
 * @method     ChildHbfProductosQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildHbfProductosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHbfProductosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHbfProductosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHbfProductosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHbfProductosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHbfProductosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHbfProductosQuery leftJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfProductosQuery rightJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfProductosQuery innerJoinCiUsuariosRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfProductosQuery joinWithCiUsuariosRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithCiUsuariosRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfProductosQuery rightJoinWithCiUsuariosRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 * @method     ChildHbfProductosQuery innerJoinWithCiUsuariosRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserCreated relation
 *
 * @method     ChildHbfProductosQuery leftJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfProductosQuery rightJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfProductosQuery innerJoinCiUsuariosRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfProductosQuery joinWithCiUsuariosRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithCiUsuariosRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfProductosQuery rightJoinWithCiUsuariosRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 * @method     ChildHbfProductosQuery innerJoinWithCiUsuariosRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the CiUsuariosRelatedByIdUserModified relation
 *
 * @method     ChildHbfProductosQuery leftJoinCiOptionsRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfProductosQuery rightJoinCiOptionsRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfProductosQuery innerJoinCiOptionsRelatedByIdOptionCategoriaProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfProductosQuery joinWithCiOptionsRelatedByIdOptionCategoriaProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithCiOptionsRelatedByIdOptionCategoriaProducto() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfProductosQuery rightJoinWithCiOptionsRelatedByIdOptionCategoriaProducto() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 * @method     ChildHbfProductosQuery innerJoinWithCiOptionsRelatedByIdOptionCategoriaProducto() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
 *
 * @method     ChildHbfProductosQuery leftJoinCiOptionsRelatedByIdOptionTipoProducto($relationAlias = null) Adds a LEFT JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfProductosQuery rightJoinCiOptionsRelatedByIdOptionTipoProducto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfProductosQuery innerJoinCiOptionsRelatedByIdOptionTipoProducto($relationAlias = null) Adds a INNER JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfProductosQuery joinWithCiOptionsRelatedByIdOptionTipoProducto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithCiOptionsRelatedByIdOptionTipoProducto() Adds a LEFT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfProductosQuery rightJoinWithCiOptionsRelatedByIdOptionTipoProducto() Adds a RIGHT JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 * @method     ChildHbfProductosQuery innerJoinWithCiOptionsRelatedByIdOptionTipoProducto() Adds a INNER JOIN clause and with to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
 *
 * @method     ChildHbfProductosQuery leftJoinHbfDetallesPedidos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfProductosQuery rightJoinHbfDetallesPedidos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfProductosQuery innerJoinHbfDetallesPedidos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfProductosQuery joinWithHbfDetallesPedidos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithHbfDetallesPedidos() Adds a LEFT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfProductosQuery rightJoinWithHbfDetallesPedidos() Adds a RIGHT JOIN clause and with to the query using the HbfDetallesPedidos relation
 * @method     ChildHbfProductosQuery innerJoinWithHbfDetallesPedidos() Adds a INNER JOIN clause and with to the query using the HbfDetallesPedidos relation
 *
 * @method     ChildHbfProductosQuery leftJoinHbfIngresos($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfProductosQuery rightJoinHbfIngresos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfIngresos relation
 * @method     ChildHbfProductosQuery innerJoinHbfIngresos($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfIngresos relation
 *
 * @method     ChildHbfProductosQuery joinWithHbfIngresos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfIngresos relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithHbfIngresos() Adds a LEFT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfProductosQuery rightJoinWithHbfIngresos() Adds a RIGHT JOIN clause and with to the query using the HbfIngresos relation
 * @method     ChildHbfProductosQuery innerJoinWithHbfIngresos() Adds a INNER JOIN clause and with to the query using the HbfIngresos relation
 *
 * @method     ChildHbfProductosQuery leftJoinHbfPorciones($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfPorciones relation
 * @method     ChildHbfProductosQuery rightJoinHbfPorciones($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfPorciones relation
 * @method     ChildHbfProductosQuery innerJoinHbfPorciones($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfPorciones relation
 *
 * @method     ChildHbfProductosQuery joinWithHbfPorciones($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfPorciones relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithHbfPorciones() Adds a LEFT JOIN clause and with to the query using the HbfPorciones relation
 * @method     ChildHbfProductosQuery rightJoinWithHbfPorciones() Adds a RIGHT JOIN clause and with to the query using the HbfPorciones relation
 * @method     ChildHbfProductosQuery innerJoinWithHbfPorciones() Adds a INNER JOIN clause and with to the query using the HbfPorciones relation
 *
 * @method     ChildHbfProductosQuery leftJoinHbfVentas($relationAlias = null) Adds a LEFT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfProductosQuery rightJoinHbfVentas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HbfVentas relation
 * @method     ChildHbfProductosQuery innerJoinHbfVentas($relationAlias = null) Adds a INNER JOIN clause to the query using the HbfVentas relation
 *
 * @method     ChildHbfProductosQuery joinWithHbfVentas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the HbfVentas relation
 *
 * @method     ChildHbfProductosQuery leftJoinWithHbfVentas() Adds a LEFT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfProductosQuery rightJoinWithHbfVentas() Adds a RIGHT JOIN clause and with to the query using the HbfVentas relation
 * @method     ChildHbfProductosQuery innerJoinWithHbfVentas() Adds a INNER JOIN clause and with to the query using the HbfVentas relation
 *
 * @method     \CiUsuariosQuery|\CiOptionsQuery|\HbfDetallesPedidosQuery|\HbfIngresosQuery|\HbfPorcionesQuery|\HbfVentasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHbfProductos findOne(ConnectionInterface $con = null) Return the first ChildHbfProductos matching the query
 * @method     ChildHbfProductos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHbfProductos matching the query, or a new ChildHbfProductos object populated from the query conditions when no match is found
 *
 * @method     ChildHbfProductos findOneByIdProducto(int $id_producto) Return the first ChildHbfProductos filtered by the id_producto column
 * @method     ChildHbfProductos findOneByNombre(string $nombre) Return the first ChildHbfProductos filtered by the nombre column
 * @method     ChildHbfProductos findOneByDescripcion(string $descripcion) Return the first ChildHbfProductos filtered by the descripcion column
 * @method     ChildHbfProductos findOneByIdOptionTipoProducto(int $id_option_tipo_producto) Return the first ChildHbfProductos filtered by the id_option_tipo_producto column
 * @method     ChildHbfProductos findOneByIdOptionCategoriaProducto(int $id_option_categoria_producto) Return the first ChildHbfProductos filtered by the id_option_categoria_producto column
 * @method     ChildHbfProductos findOneByFotoProducto(string $foto_producto) Return the first ChildHbfProductos filtered by the foto_producto column
 * @method     ChildHbfProductos findOneByPrecioVenta(string $precio_venta) Return the first ChildHbfProductos filtered by the precio_venta column
 * @method     ChildHbfProductos findOneByPrecioPorcion(string $precio_porcion) Return the first ChildHbfProductos filtered by the precio_porcion column
 * @method     ChildHbfProductos findOneByPrecioCompra(string $precio_compra) Return the first ChildHbfProductos filtered by the precio_compra column
 * @method     ChildHbfProductos findOneByNumPorciones(int $num_porciones) Return the first ChildHbfProductos filtered by the num_porciones column
 * @method     ChildHbfProductos findOneByEstado(string $estado) Return the first ChildHbfProductos filtered by the estado column
 * @method     ChildHbfProductos findOneByChangeCount(int $change_count) Return the first ChildHbfProductos filtered by the change_count column
 * @method     ChildHbfProductos findOneByIdUserModified(int $id_user_modified) Return the first ChildHbfProductos filtered by the id_user_modified column
 * @method     ChildHbfProductos findOneByIdUserCreated(int $id_user_created) Return the first ChildHbfProductos filtered by the id_user_created column
 * @method     ChildHbfProductos findOneByDateModified(string $date_modified) Return the first ChildHbfProductos filtered by the date_modified column
 * @method     ChildHbfProductos findOneByDateCreated(string $date_created) Return the first ChildHbfProductos filtered by the date_created column *

 * @method     ChildHbfProductos requirePk($key, ConnectionInterface $con = null) Return the ChildHbfProductos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOne(ConnectionInterface $con = null) Return the first ChildHbfProductos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfProductos requireOneByIdProducto(int $id_producto) Return the first ChildHbfProductos filtered by the id_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByNombre(string $nombre) Return the first ChildHbfProductos filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByDescripcion(string $descripcion) Return the first ChildHbfProductos filtered by the descripcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByIdOptionTipoProducto(int $id_option_tipo_producto) Return the first ChildHbfProductos filtered by the id_option_tipo_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByIdOptionCategoriaProducto(int $id_option_categoria_producto) Return the first ChildHbfProductos filtered by the id_option_categoria_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByFotoProducto(string $foto_producto) Return the first ChildHbfProductos filtered by the foto_producto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByPrecioVenta(string $precio_venta) Return the first ChildHbfProductos filtered by the precio_venta column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByPrecioPorcion(string $precio_porcion) Return the first ChildHbfProductos filtered by the precio_porcion column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByPrecioCompra(string $precio_compra) Return the first ChildHbfProductos filtered by the precio_compra column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByNumPorciones(int $num_porciones) Return the first ChildHbfProductos filtered by the num_porciones column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByEstado(string $estado) Return the first ChildHbfProductos filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByChangeCount(int $change_count) Return the first ChildHbfProductos filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByIdUserModified(int $id_user_modified) Return the first ChildHbfProductos filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByIdUserCreated(int $id_user_created) Return the first ChildHbfProductos filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByDateModified(string $date_modified) Return the first ChildHbfProductos filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHbfProductos requireOneByDateCreated(string $date_created) Return the first ChildHbfProductos filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHbfProductos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHbfProductos objects based on current ModelCriteria
 * @method     ChildHbfProductos[]|ObjectCollection findByIdProducto(int $id_producto) Return ChildHbfProductos objects filtered by the id_producto column
 * @method     ChildHbfProductos[]|ObjectCollection findByNombre(string $nombre) Return ChildHbfProductos objects filtered by the nombre column
 * @method     ChildHbfProductos[]|ObjectCollection findByDescripcion(string $descripcion) Return ChildHbfProductos objects filtered by the descripcion column
 * @method     ChildHbfProductos[]|ObjectCollection findByIdOptionTipoProducto(int $id_option_tipo_producto) Return ChildHbfProductos objects filtered by the id_option_tipo_producto column
 * @method     ChildHbfProductos[]|ObjectCollection findByIdOptionCategoriaProducto(int $id_option_categoria_producto) Return ChildHbfProductos objects filtered by the id_option_categoria_producto column
 * @method     ChildHbfProductos[]|ObjectCollection findByFotoProducto(string $foto_producto) Return ChildHbfProductos objects filtered by the foto_producto column
 * @method     ChildHbfProductos[]|ObjectCollection findByPrecioVenta(string $precio_venta) Return ChildHbfProductos objects filtered by the precio_venta column
 * @method     ChildHbfProductos[]|ObjectCollection findByPrecioPorcion(string $precio_porcion) Return ChildHbfProductos objects filtered by the precio_porcion column
 * @method     ChildHbfProductos[]|ObjectCollection findByPrecioCompra(string $precio_compra) Return ChildHbfProductos objects filtered by the precio_compra column
 * @method     ChildHbfProductos[]|ObjectCollection findByNumPorciones(int $num_porciones) Return ChildHbfProductos objects filtered by the num_porciones column
 * @method     ChildHbfProductos[]|ObjectCollection findByEstado(string $estado) Return ChildHbfProductos objects filtered by the estado column
 * @method     ChildHbfProductos[]|ObjectCollection findByChangeCount(int $change_count) Return ChildHbfProductos objects filtered by the change_count column
 * @method     ChildHbfProductos[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildHbfProductos objects filtered by the id_user_modified column
 * @method     ChildHbfProductos[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildHbfProductos objects filtered by the id_user_created column
 * @method     ChildHbfProductos[]|ObjectCollection findByDateModified(string $date_modified) Return ChildHbfProductos objects filtered by the date_modified column
 * @method     ChildHbfProductos[]|ObjectCollection findByDateCreated(string $date_created) Return ChildHbfProductos objects filtered by the date_created column
 * @method     ChildHbfProductos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HbfProductosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\HbfProductosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife', $modelName = '\\HbfProductos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHbfProductosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHbfProductosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHbfProductosQuery) {
            return $criteria;
        }
        $query = new ChildHbfProductosQuery();
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
     * @return ChildHbfProductos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HbfProductosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHbfProductos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_producto, nombre, descripcion, id_option_tipo_producto, id_option_categoria_producto, foto_producto, precio_venta, precio_porcion, precio_compra, num_porciones, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM hbf_productos WHERE id_producto = :p0';
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
            /** @var ChildHbfProductos $obj */
            $obj = new ChildHbfProductos();
            $obj->hydrate($row);
            HbfProductosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHbfProductos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $keys, Criteria::IN);
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
     * @param     mixed $idProducto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByIdProducto($idProducto = null, $comparison = null)
    {
        if (is_array($idProducto)) {
            $useMinMax = false;
            if (isset($idProducto['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $idProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProducto['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $idProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $idProducto, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_NOMBRE, $nombre, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the id_option_tipo_producto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOptionTipoProducto(1234); // WHERE id_option_tipo_producto = 1234
     * $query->filterByIdOptionTipoProducto(array(12, 34)); // WHERE id_option_tipo_producto IN (12, 34)
     * $query->filterByIdOptionTipoProducto(array('min' => 12)); // WHERE id_option_tipo_producto > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOptionTipoProducto()
     *
     * @param     mixed $idOptionTipoProducto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByIdOptionTipoProducto($idOptionTipoProducto = null, $comparison = null)
    {
        if (is_array($idOptionTipoProducto)) {
            $useMinMax = false;
            if (isset($idOptionTipoProducto['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $idOptionTipoProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOptionTipoProducto['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $idOptionTipoProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $idOptionTipoProducto, $comparison);
    }

    /**
     * Filter the query on the id_option_categoria_producto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdOptionCategoriaProducto(1234); // WHERE id_option_categoria_producto = 1234
     * $query->filterByIdOptionCategoriaProducto(array(12, 34)); // WHERE id_option_categoria_producto IN (12, 34)
     * $query->filterByIdOptionCategoriaProducto(array('min' => 12)); // WHERE id_option_categoria_producto > 12
     * </code>
     *
     * @see       filterByCiOptionsRelatedByIdOptionCategoriaProducto()
     *
     * @param     mixed $idOptionCategoriaProducto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByIdOptionCategoriaProducto($idOptionCategoriaProducto = null, $comparison = null)
    {
        if (is_array($idOptionCategoriaProducto)) {
            $useMinMax = false;
            if (isset($idOptionCategoriaProducto['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $idOptionCategoriaProducto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idOptionCategoriaProducto['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $idOptionCategoriaProducto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $idOptionCategoriaProducto, $comparison);
    }

    /**
     * Filter the query on the foto_producto column
     *
     * Example usage:
     * <code>
     * $query->filterByFotoProducto('fooValue');   // WHERE foto_producto = 'fooValue'
     * $query->filterByFotoProducto('%fooValue%', Criteria::LIKE); // WHERE foto_producto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fotoProducto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByFotoProducto($fotoProducto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fotoProducto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_FOTO_PRODUCTO, $fotoProducto, $comparison);
    }

    /**
     * Filter the query on the precio_venta column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecioVenta(1234); // WHERE precio_venta = 1234
     * $query->filterByPrecioVenta(array(12, 34)); // WHERE precio_venta IN (12, 34)
     * $query->filterByPrecioVenta(array('min' => 12)); // WHERE precio_venta > 12
     * </code>
     *
     * @param     mixed $precioVenta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByPrecioVenta($precioVenta = null, $comparison = null)
    {
        if (is_array($precioVenta)) {
            $useMinMax = false;
            if (isset($precioVenta['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_VENTA, $precioVenta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precioVenta['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_VENTA, $precioVenta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_VENTA, $precioVenta, $comparison);
    }

    /**
     * Filter the query on the precio_porcion column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecioPorcion(1234); // WHERE precio_porcion = 1234
     * $query->filterByPrecioPorcion(array(12, 34)); // WHERE precio_porcion IN (12, 34)
     * $query->filterByPrecioPorcion(array('min' => 12)); // WHERE precio_porcion > 12
     * </code>
     *
     * @param     mixed $precioPorcion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByPrecioPorcion($precioPorcion = null, $comparison = null)
    {
        if (is_array($precioPorcion)) {
            $useMinMax = false;
            if (isset($precioPorcion['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_PORCION, $precioPorcion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precioPorcion['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_PORCION, $precioPorcion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_PORCION, $precioPorcion, $comparison);
    }

    /**
     * Filter the query on the precio_compra column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecioCompra(1234); // WHERE precio_compra = 1234
     * $query->filterByPrecioCompra(array(12, 34)); // WHERE precio_compra IN (12, 34)
     * $query->filterByPrecioCompra(array('min' => 12)); // WHERE precio_compra > 12
     * </code>
     *
     * @param     mixed $precioCompra The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByPrecioCompra($precioCompra = null, $comparison = null)
    {
        if (is_array($precioCompra)) {
            $useMinMax = false;
            if (isset($precioCompra['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_COMPRA, $precioCompra['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precioCompra['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_COMPRA, $precioCompra['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_PRECIO_COMPRA, $precioCompra, $comparison);
    }

    /**
     * Filter the query on the num_porciones column
     *
     * Example usage:
     * <code>
     * $query->filterByNumPorciones(1234); // WHERE num_porciones = 1234
     * $query->filterByNumPorciones(array(12, 34)); // WHERE num_porciones IN (12, 34)
     * $query->filterByNumPorciones(array('min' => 12)); // WHERE num_porciones > 12
     * </code>
     *
     * @param     mixed $numPorciones The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByNumPorciones($numPorciones = null, $comparison = null)
    {
        if (is_array($numPorciones)) {
            $useMinMax = false;
            if (isset($numPorciones['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_NUM_PORCIONES, $numPorciones['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numPorciones['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_NUM_PORCIONES, $numPorciones['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_NUM_PORCIONES, $numPorciones, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(HbfProductosTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HbfProductosTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \CiUsuarios object
     *
     * @param \CiUsuarios|ObjectCollection $ciUsuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserCreated($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_USER_CREATED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_USER_CREATED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
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
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByCiUsuariosRelatedByIdUserModified($ciUsuarios, $comparison = null)
    {
        if ($ciUsuarios instanceof \CiUsuarios) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->getIdUsuario(), $comparison);
        } elseif ($ciUsuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_USER_MODIFIED, $ciUsuarios->toKeyValue('PrimaryKey', 'IdUsuario'), $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
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
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOptionCategoriaProducto($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOptionCategoriaProducto() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOptionCategoriaProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOptionCategoriaProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOptionCategoriaProducto');

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
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOptionCategoriaProducto');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOptionCategoriaProducto relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOptionCategoriaProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOptionCategoriaProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOptionCategoriaProducto', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \CiOptions object
     *
     * @param \CiOptions|ObjectCollection $ciOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByCiOptionsRelatedByIdOptionTipoProducto($ciOptions, $comparison = null)
    {
        if ($ciOptions instanceof \CiOptions) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $ciOptions->getIdOption(), $comparison);
        } elseif ($ciOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, $ciOptions->toKeyValue('PrimaryKey', 'IdOption'), $comparison);
        } else {
            throw new PropelException('filterByCiOptionsRelatedByIdOptionTipoProducto() only accepts arguments of type \CiOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CiOptionsRelatedByIdOptionTipoProducto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function joinCiOptionsRelatedByIdOptionTipoProducto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CiOptionsRelatedByIdOptionTipoProducto');

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
            $this->addJoinObject($join, 'CiOptionsRelatedByIdOptionTipoProducto');
        }

        return $this;
    }

    /**
     * Use the CiOptionsRelatedByIdOptionTipoProducto relation CiOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CiOptionsQuery A secondary query class using the current class as primary query
     */
    public function useCiOptionsRelatedByIdOptionTipoProductoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCiOptionsRelatedByIdOptionTipoProducto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CiOptionsRelatedByIdOptionTipoProducto', '\CiOptionsQuery');
    }

    /**
     * Filter the query by a related \HbfDetallesPedidos object
     *
     * @param \HbfDetallesPedidos|ObjectCollection $hbfDetallesPedidos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByHbfDetallesPedidos($hbfDetallesPedidos, $comparison = null)
    {
        if ($hbfDetallesPedidos instanceof \HbfDetallesPedidos) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $hbfDetallesPedidos->getIdProducto(), $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
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
     * Filter the query by a related \HbfIngresos object
     *
     * @param \HbfIngresos|ObjectCollection $hbfIngresos the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByHbfIngresos($hbfIngresos, $comparison = null)
    {
        if ($hbfIngresos instanceof \HbfIngresos) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $hbfIngresos->getIdProducto(), $comparison);
        } elseif ($hbfIngresos instanceof ObjectCollection) {
            return $this
                ->useHbfIngresosQuery()
                ->filterByPrimaryKeys($hbfIngresos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfIngresos() only accepts arguments of type \HbfIngresos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfIngresos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function joinHbfIngresos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfIngresos');

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
            $this->addJoinObject($join, 'HbfIngresos');
        }

        return $this;
    }

    /**
     * Use the HbfIngresos relation HbfIngresos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfIngresosQuery A secondary query class using the current class as primary query
     */
    public function useHbfIngresosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfIngresos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfIngresos', '\HbfIngresosQuery');
    }

    /**
     * Filter the query by a related \HbfPorciones object
     *
     * @param \HbfPorciones|ObjectCollection $hbfPorciones the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByHbfPorciones($hbfPorciones, $comparison = null)
    {
        if ($hbfPorciones instanceof \HbfPorciones) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $hbfPorciones->getIdProducto(), $comparison);
        } elseif ($hbfPorciones instanceof ObjectCollection) {
            return $this
                ->useHbfPorcionesQuery()
                ->filterByPrimaryKeys($hbfPorciones->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHbfPorciones() only accepts arguments of type \HbfPorciones or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HbfPorciones relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function joinHbfPorciones($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HbfPorciones');

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
            $this->addJoinObject($join, 'HbfPorciones');
        }

        return $this;
    }

    /**
     * Use the HbfPorciones relation HbfPorciones object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \HbfPorcionesQuery A secondary query class using the current class as primary query
     */
    public function useHbfPorcionesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHbfPorciones($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HbfPorciones', '\HbfPorcionesQuery');
    }

    /**
     * Filter the query by a related \HbfVentas object
     *
     * @param \HbfVentas|ObjectCollection $hbfVentas the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildHbfProductosQuery The current query, for fluid interface
     */
    public function filterByHbfVentas($hbfVentas, $comparison = null)
    {
        if ($hbfVentas instanceof \HbfVentas) {
            return $this
                ->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $hbfVentas->getIdProducto(), $comparison);
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
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
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
     * @param   ChildHbfProductos $hbfProductos Object to remove from the list of results
     *
     * @return $this|ChildHbfProductosQuery The current query, for fluid interface
     */
    public function prune($hbfProductos = null)
    {
        if ($hbfProductos) {
            $this->addUsingAlias(HbfProductosTableMap::COL_ID_PRODUCTO, $hbfProductos->getIdProducto(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hbf_productos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HbfProductosTableMap::clearInstancePool();
            HbfProductosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HbfProductosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HbfProductosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HbfProductosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HbfProductosQuery
