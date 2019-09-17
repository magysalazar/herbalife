<?php

namespace Map;

use \HbfProductos;
use \HbfProductosQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'hbf_productos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfProductosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfProductosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_productos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfProductos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfProductos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id_producto field
     */
    const COL_ID_PRODUCTO = 'hbf_productos.id_producto';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'hbf_productos.nombre';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'hbf_productos.descripcion';

    /**
     * the column name for the id_option_tipo_producto field
     */
    const COL_ID_OPTION_TIPO_PRODUCTO = 'hbf_productos.id_option_tipo_producto';

    /**
     * the column name for the id_option_categoria_producto field
     */
    const COL_ID_OPTION_CATEGORIA_PRODUCTO = 'hbf_productos.id_option_categoria_producto';

    /**
     * the column name for the foto_producto field
     */
    const COL_FOTO_PRODUCTO = 'hbf_productos.foto_producto';

    /**
     * the column name for the precio_venta field
     */
    const COL_PRECIO_VENTA = 'hbf_productos.precio_venta';

    /**
     * the column name for the precio_porcion field
     */
    const COL_PRECIO_PORCION = 'hbf_productos.precio_porcion';

    /**
     * the column name for the precio_compra field
     */
    const COL_PRECIO_COMPRA = 'hbf_productos.precio_compra';

    /**
     * the column name for the num_porciones field
     */
    const COL_NUM_PORCIONES = 'hbf_productos.num_porciones';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_productos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_productos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_productos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_productos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_productos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_productos.date_created';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdProducto', 'Nombre', 'Descripcion', 'IdOptionTipoProducto', 'IdOptionCategoriaProducto', 'FotoProducto', 'PrecioVenta', 'PrecioPorcion', 'PrecioCompra', 'NumPorciones', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idProducto', 'nombre', 'descripcion', 'idOptionTipoProducto', 'idOptionCategoriaProducto', 'fotoProducto', 'precioVenta', 'precioPorcion', 'precioCompra', 'numPorciones', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfProductosTableMap::COL_ID_PRODUCTO, HbfProductosTableMap::COL_NOMBRE, HbfProductosTableMap::COL_DESCRIPCION, HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO, HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO, HbfProductosTableMap::COL_FOTO_PRODUCTO, HbfProductosTableMap::COL_PRECIO_VENTA, HbfProductosTableMap::COL_PRECIO_PORCION, HbfProductosTableMap::COL_PRECIO_COMPRA, HbfProductosTableMap::COL_NUM_PORCIONES, HbfProductosTableMap::COL_ESTADO, HbfProductosTableMap::COL_CHANGE_COUNT, HbfProductosTableMap::COL_ID_USER_MODIFIED, HbfProductosTableMap::COL_ID_USER_CREATED, HbfProductosTableMap::COL_DATE_MODIFIED, HbfProductosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_producto', 'nombre', 'descripcion', 'id_option_tipo_producto', 'id_option_categoria_producto', 'foto_producto', 'precio_venta', 'precio_porcion', 'precio_compra', 'num_porciones', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdProducto' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'IdOptionTipoProducto' => 3, 'IdOptionCategoriaProducto' => 4, 'FotoProducto' => 5, 'PrecioVenta' => 6, 'PrecioPorcion' => 7, 'PrecioCompra' => 8, 'NumPorciones' => 9, 'Estado' => 10, 'ChangeCount' => 11, 'IdUserModified' => 12, 'IdUserCreated' => 13, 'DateModified' => 14, 'DateCreated' => 15, ),
        self::TYPE_CAMELNAME     => array('idProducto' => 0, 'nombre' => 1, 'descripcion' => 2, 'idOptionTipoProducto' => 3, 'idOptionCategoriaProducto' => 4, 'fotoProducto' => 5, 'precioVenta' => 6, 'precioPorcion' => 7, 'precioCompra' => 8, 'numPorciones' => 9, 'estado' => 10, 'changeCount' => 11, 'idUserModified' => 12, 'idUserCreated' => 13, 'dateModified' => 14, 'dateCreated' => 15, ),
        self::TYPE_COLNAME       => array(HbfProductosTableMap::COL_ID_PRODUCTO => 0, HbfProductosTableMap::COL_NOMBRE => 1, HbfProductosTableMap::COL_DESCRIPCION => 2, HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO => 3, HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO => 4, HbfProductosTableMap::COL_FOTO_PRODUCTO => 5, HbfProductosTableMap::COL_PRECIO_VENTA => 6, HbfProductosTableMap::COL_PRECIO_PORCION => 7, HbfProductosTableMap::COL_PRECIO_COMPRA => 8, HbfProductosTableMap::COL_NUM_PORCIONES => 9, HbfProductosTableMap::COL_ESTADO => 10, HbfProductosTableMap::COL_CHANGE_COUNT => 11, HbfProductosTableMap::COL_ID_USER_MODIFIED => 12, HbfProductosTableMap::COL_ID_USER_CREATED => 13, HbfProductosTableMap::COL_DATE_MODIFIED => 14, HbfProductosTableMap::COL_DATE_CREATED => 15, ),
        self::TYPE_FIELDNAME     => array('id_producto' => 0, 'nombre' => 1, 'descripcion' => 2, 'id_option_tipo_producto' => 3, 'id_option_categoria_producto' => 4, 'foto_producto' => 5, 'precio_venta' => 6, 'precio_porcion' => 7, 'precio_compra' => 8, 'num_porciones' => 9, 'estado' => 10, 'change_count' => 11, 'id_user_modified' => 12, 'id_user_created' => 13, 'date_modified' => 14, 'date_created' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('hbf_productos');
        $this->setPhpName('HbfProductos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfProductos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_producto', 'IdProducto', 'INTEGER', true, 10, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 100, null);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('id_option_tipo_producto', 'IdOptionTipoProducto', 'INTEGER', 'ci_options', 'id_option', true, 10, null);
        $this->addForeignKey('id_option_categoria_producto', 'IdOptionCategoriaProducto', 'INTEGER', 'ci_options', 'id_option', true, 10, null);
        $this->addColumn('foto_producto', 'FotoProducto', 'VARCHAR', false, 500, null);
        $this->addColumn('precio_venta', 'PrecioVenta', 'DECIMAL', false, null, null);
        $this->addColumn('precio_porcion', 'PrecioPorcion', 'DECIMAL', false, null, null);
        $this->addColumn('precio_compra', 'PrecioCompra', 'DECIMAL', false, null, null);
        $this->addColumn('num_porciones', 'NumPorciones', 'INTEGER', false, null, 0);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', false, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CiUsuariosRelatedByIdUserCreated', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('CiUsuariosRelatedByIdUserModified', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdOptionCategoriaProducto', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_option_categoria_producto',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdOptionTipoProducto', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_option_tipo_producto',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('HbfDetallesPedidos', '\\HbfDetallesPedidos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
  ),
), null, null, 'HbfDetallesPedidoss', false);
        $this->addRelation('HbfIngresos', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
  ),
), null, null, 'HbfIngresoss', false);
        $this->addRelation('HbfPorciones', '\\HbfPorciones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
  ),
), null, null, 'HbfPorcioness', false);
        $this->addRelation('HbfVentas', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
  ),
), null, null, 'HbfVentass', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdProducto', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? HbfProductosTableMap::CLASS_DEFAULT : HbfProductosTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (HbfProductos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfProductosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfProductosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfProductosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfProductosTableMap::OM_CLASS;
            /** @var HbfProductos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfProductosTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = HbfProductosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfProductosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfProductos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfProductosTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ID_PRODUCTO);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ID_OPTION_TIPO_PRODUCTO);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ID_OPTION_CATEGORIA_PRODUCTO);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_FOTO_PRODUCTO);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_PRECIO_VENTA);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_PRECIO_PORCION);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_PRECIO_COMPRA);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_NUM_PORCIONES);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfProductosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_producto');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.id_option_tipo_producto');
            $criteria->addSelectColumn($alias . '.id_option_categoria_producto');
            $criteria->addSelectColumn($alias . '.foto_producto');
            $criteria->addSelectColumn($alias . '.precio_venta');
            $criteria->addSelectColumn($alias . '.precio_porcion');
            $criteria->addSelectColumn($alias . '.precio_compra');
            $criteria->addSelectColumn($alias . '.num_porciones');
            $criteria->addSelectColumn($alias . '.estado');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.id_user_modified');
            $criteria->addSelectColumn($alias . '.id_user_created');
            $criteria->addSelectColumn($alias . '.date_modified');
            $criteria->addSelectColumn($alias . '.date_created');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(HbfProductosTableMap::DATABASE_NAME)->getTable(HbfProductosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfProductosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfProductosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfProductosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfProductos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfProductos object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfProductos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfProductosTableMap::DATABASE_NAME);
            $criteria->add(HbfProductosTableMap::COL_ID_PRODUCTO, (array) $values, Criteria::IN);
        }

        $query = HbfProductosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfProductosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfProductosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_productos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfProductosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfProductos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfProductos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfProductosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfProductos object
        }

        if ($criteria->containsKey(HbfProductosTableMap::COL_ID_PRODUCTO) && $criteria->keyContainsValue(HbfProductosTableMap::COL_ID_PRODUCTO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfProductosTableMap::COL_ID_PRODUCTO.')');
        }


        // Set the correct dbName
        $query = HbfProductosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfProductosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfProductosTableMap::buildTableMap();
