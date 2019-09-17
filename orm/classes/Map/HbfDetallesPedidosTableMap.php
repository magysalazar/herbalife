<?php

namespace Map;

use \HbfDetallesPedidos;
use \HbfDetallesPedidosQuery;
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
 * This class defines the structure of the 'hbf_detalles_pedidos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfDetallesPedidosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfDetallesPedidosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_detalles_pedidos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfDetallesPedidos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfDetallesPedidos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id_detalle_pedido field
     */
    const COL_ID_DETALLE_PEDIDO = 'hbf_detalles_pedidos.id_detalle_pedido';

    /**
     * the column name for the id_comanda field
     */
    const COL_ID_COMANDA = 'hbf_detalles_pedidos.id_comanda';

    /**
     * the column name for the id_vaso field
     */
    const COL_ID_VASO = 'hbf_detalles_pedidos.id_vaso';

    /**
     * the column name for the id_producto field
     */
    const COL_ID_PRODUCTO = 'hbf_detalles_pedidos.id_producto';

    /**
     * the column name for the cantidad field
     */
    const COL_CANTIDAD = 'hbf_detalles_pedidos.cantidad';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_detalles_pedidos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_detalles_pedidos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_detalles_pedidos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_detalles_pedidos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_detalles_pedidos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_detalles_pedidos.date_created';

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
        self::TYPE_PHPNAME       => array('IdDetallePedido', 'IdComanda', 'IdVaso', 'IdProducto', 'Cantidad', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idDetallePedido', 'idComanda', 'idVaso', 'idProducto', 'cantidad', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, HbfDetallesPedidosTableMap::COL_ID_COMANDA, HbfDetallesPedidosTableMap::COL_ID_VASO, HbfDetallesPedidosTableMap::COL_ID_PRODUCTO, HbfDetallesPedidosTableMap::COL_CANTIDAD, HbfDetallesPedidosTableMap::COL_ESTADO, HbfDetallesPedidosTableMap::COL_CHANGE_COUNT, HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED, HbfDetallesPedidosTableMap::COL_ID_USER_CREATED, HbfDetallesPedidosTableMap::COL_DATE_MODIFIED, HbfDetallesPedidosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_detalle_pedido', 'id_comanda', 'id_vaso', 'id_producto', 'cantidad', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdDetallePedido' => 0, 'IdComanda' => 1, 'IdVaso' => 2, 'IdProducto' => 3, 'Cantidad' => 4, 'Estado' => 5, 'ChangeCount' => 6, 'IdUserModified' => 7, 'IdUserCreated' => 8, 'DateModified' => 9, 'DateCreated' => 10, ),
        self::TYPE_CAMELNAME     => array('idDetallePedido' => 0, 'idComanda' => 1, 'idVaso' => 2, 'idProducto' => 3, 'cantidad' => 4, 'estado' => 5, 'changeCount' => 6, 'idUserModified' => 7, 'idUserCreated' => 8, 'dateModified' => 9, 'dateCreated' => 10, ),
        self::TYPE_COLNAME       => array(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO => 0, HbfDetallesPedidosTableMap::COL_ID_COMANDA => 1, HbfDetallesPedidosTableMap::COL_ID_VASO => 2, HbfDetallesPedidosTableMap::COL_ID_PRODUCTO => 3, HbfDetallesPedidosTableMap::COL_CANTIDAD => 4, HbfDetallesPedidosTableMap::COL_ESTADO => 5, HbfDetallesPedidosTableMap::COL_CHANGE_COUNT => 6, HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED => 7, HbfDetallesPedidosTableMap::COL_ID_USER_CREATED => 8, HbfDetallesPedidosTableMap::COL_DATE_MODIFIED => 9, HbfDetallesPedidosTableMap::COL_DATE_CREATED => 10, ),
        self::TYPE_FIELDNAME     => array('id_detalle_pedido' => 0, 'id_comanda' => 1, 'id_vaso' => 2, 'id_producto' => 3, 'cantidad' => 4, 'estado' => 5, 'change_count' => 6, 'id_user_modified' => 7, 'id_user_created' => 8, 'date_modified' => 9, 'date_created' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('hbf_detalles_pedidos');
        $this->setPhpName('HbfDetallesPedidos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfDetallesPedidos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_detalle_pedido', 'IdDetallePedido', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_comanda', 'IdComanda', 'INTEGER', 'hbf_comandas', 'id_comanda', false, null, null);
        $this->addForeignKey('id_vaso', 'IdVaso', 'INTEGER', 'hbf_vasos', 'id_vaso', true, 10, null);
        $this->addForeignKey('id_producto', 'IdProducto', 'INTEGER', 'hbf_productos', 'id_producto', true, 10, null);
        $this->addColumn('cantidad', 'Cantidad', 'INTEGER', false, null, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
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
        $this->addRelation('HbfProductos', '\\HbfProductos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
  ),
), null, null, null, false);
        $this->addRelation('HbfVasos', '\\HbfVasos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_vaso',
    1 => ':id_vaso',
  ),
), null, null, null, false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdDetallePedido', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfDetallesPedidosTableMap::CLASS_DEFAULT : HbfDetallesPedidosTableMap::OM_CLASS;
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
     * @return array           (HbfDetallesPedidos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfDetallesPedidosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfDetallesPedidosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfDetallesPedidosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfDetallesPedidosTableMap::OM_CLASS;
            /** @var HbfDetallesPedidos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfDetallesPedidosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfDetallesPedidosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfDetallesPedidosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfDetallesPedidos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfDetallesPedidosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_COMANDA);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_VASO);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_PRODUCTO);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_CANTIDAD);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfDetallesPedidosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_detalle_pedido');
            $criteria->addSelectColumn($alias . '.id_comanda');
            $criteria->addSelectColumn($alias . '.id_vaso');
            $criteria->addSelectColumn($alias . '.id_producto');
            $criteria->addSelectColumn($alias . '.cantidad');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfDetallesPedidosTableMap::DATABASE_NAME)->getTable(HbfDetallesPedidosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfDetallesPedidosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfDetallesPedidosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfDetallesPedidosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfDetallesPedidos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfDetallesPedidos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesPedidosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfDetallesPedidos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfDetallesPedidosTableMap::DATABASE_NAME);
            $criteria->add(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO, (array) $values, Criteria::IN);
        }

        $query = HbfDetallesPedidosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfDetallesPedidosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfDetallesPedidosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_detalles_pedidos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfDetallesPedidosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfDetallesPedidos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfDetallesPedidos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfDetallesPedidosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfDetallesPedidos object
        }

        if ($criteria->containsKey(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO) && $criteria->keyContainsValue(HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfDetallesPedidosTableMap::COL_ID_DETALLE_PEDIDO.')');
        }


        // Set the correct dbName
        $query = HbfDetallesPedidosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfDetallesPedidosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfDetallesPedidosTableMap::buildTableMap();
