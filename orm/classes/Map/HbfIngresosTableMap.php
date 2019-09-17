<?php

namespace Map;

use \HbfIngresos;
use \HbfIngresosQuery;
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
 * This class defines the structure of the 'hbf_ingresos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfIngresosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfIngresosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_ingresos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfIngresos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfIngresos';

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
     * the column name for the id_ingreso field
     */
    const COL_ID_INGRESO = 'hbf_ingresos.id_ingreso';

    /**
     * the column name for the id_cliente field
     */
    const COL_ID_CLIENTE = 'hbf_ingresos.id_cliente';

    /**
     * the column name for the id_comanda field
     */
    const COL_ID_COMANDA = 'hbf_ingresos.id_comanda';

    /**
     * the column name for the id_prepago field
     */
    const COL_ID_PREPAGO = 'hbf_ingresos.id_prepago';

    /**
     * the column name for the id_producto field
     */
    const COL_ID_PRODUCTO = 'hbf_ingresos.id_producto';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_ingresos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_ingresos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_ingresos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_ingresos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_ingresos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_ingresos.date_created';

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
        self::TYPE_PHPNAME       => array('IdIngreso', 'IdCliente', 'IdComanda', 'IdPrepago', 'IdProducto', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idIngreso', 'idCliente', 'idComanda', 'idPrepago', 'idProducto', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfIngresosTableMap::COL_ID_INGRESO, HbfIngresosTableMap::COL_ID_CLIENTE, HbfIngresosTableMap::COL_ID_COMANDA, HbfIngresosTableMap::COL_ID_PREPAGO, HbfIngresosTableMap::COL_ID_PRODUCTO, HbfIngresosTableMap::COL_ESTADO, HbfIngresosTableMap::COL_CHANGE_COUNT, HbfIngresosTableMap::COL_ID_USER_MODIFIED, HbfIngresosTableMap::COL_ID_USER_CREATED, HbfIngresosTableMap::COL_DATE_MODIFIED, HbfIngresosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_ingreso', 'id_cliente', 'id_comanda', 'id_prepago', 'id_producto', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdIngreso' => 0, 'IdCliente' => 1, 'IdComanda' => 2, 'IdPrepago' => 3, 'IdProducto' => 4, 'Estado' => 5, 'ChangeCount' => 6, 'IdUserModified' => 7, 'IdUserCreated' => 8, 'DateModified' => 9, 'DateCreated' => 10, ),
        self::TYPE_CAMELNAME     => array('idIngreso' => 0, 'idCliente' => 1, 'idComanda' => 2, 'idPrepago' => 3, 'idProducto' => 4, 'estado' => 5, 'changeCount' => 6, 'idUserModified' => 7, 'idUserCreated' => 8, 'dateModified' => 9, 'dateCreated' => 10, ),
        self::TYPE_COLNAME       => array(HbfIngresosTableMap::COL_ID_INGRESO => 0, HbfIngresosTableMap::COL_ID_CLIENTE => 1, HbfIngresosTableMap::COL_ID_COMANDA => 2, HbfIngresosTableMap::COL_ID_PREPAGO => 3, HbfIngresosTableMap::COL_ID_PRODUCTO => 4, HbfIngresosTableMap::COL_ESTADO => 5, HbfIngresosTableMap::COL_CHANGE_COUNT => 6, HbfIngresosTableMap::COL_ID_USER_MODIFIED => 7, HbfIngresosTableMap::COL_ID_USER_CREATED => 8, HbfIngresosTableMap::COL_DATE_MODIFIED => 9, HbfIngresosTableMap::COL_DATE_CREATED => 10, ),
        self::TYPE_FIELDNAME     => array('id_ingreso' => 0, 'id_cliente' => 1, 'id_comanda' => 2, 'id_prepago' => 3, 'id_producto' => 4, 'estado' => 5, 'change_count' => 6, 'id_user_modified' => 7, 'id_user_created' => 8, 'date_modified' => 9, 'date_created' => 10, ),
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
        $this->setName('hbf_ingresos');
        $this->setPhpName('HbfIngresos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfIngresos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_ingreso', 'IdIngreso', 'INTEGER', true, null, null);
        $this->addForeignKey('id_cliente', 'IdCliente', 'INTEGER', 'ci_usuarios', 'id_usuario', false, null, null);
        $this->addForeignKey('id_comanda', 'IdComanda', 'INTEGER', 'hbf_comandas', 'id_comanda', false, null, null);
        $this->addForeignKey('id_prepago', 'IdPrepago', 'INTEGER', 'hbf_prepagos', 'id_prepago', false, 10, null);
        $this->addForeignKey('id_producto', 'IdProducto', 'INTEGER', 'hbf_productos', 'id_producto', false, null, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', false, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
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
        $this->addRelation('CiUsuariosRelatedByIdCliente', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cliente',
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
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, null, false);
        $this->addRelation('HbfPrepagos', '\\HbfPrepagos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_prepago',
    1 => ':id_prepago',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdIngreso', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfIngresosTableMap::CLASS_DEFAULT : HbfIngresosTableMap::OM_CLASS;
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
     * @return array           (HbfIngresos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfIngresosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfIngresosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfIngresosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfIngresosTableMap::OM_CLASS;
            /** @var HbfIngresos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfIngresosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfIngresosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfIngresosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfIngresos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfIngresosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_INGRESO);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_CLIENTE);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_COMANDA);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_PREPAGO);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_PRODUCTO);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfIngresosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_ingreso');
            $criteria->addSelectColumn($alias . '.id_cliente');
            $criteria->addSelectColumn($alias . '.id_comanda');
            $criteria->addSelectColumn($alias . '.id_prepago');
            $criteria->addSelectColumn($alias . '.id_producto');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfIngresosTableMap::DATABASE_NAME)->getTable(HbfIngresosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfIngresosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfIngresosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfIngresosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfIngresos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfIngresos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfIngresosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfIngresos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfIngresosTableMap::DATABASE_NAME);
            $criteria->add(HbfIngresosTableMap::COL_ID_INGRESO, (array) $values, Criteria::IN);
        }

        $query = HbfIngresosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfIngresosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfIngresosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_ingresos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfIngresosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfIngresos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfIngresos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfIngresosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfIngresos object
        }

        if ($criteria->containsKey(HbfIngresosTableMap::COL_ID_INGRESO) && $criteria->keyContainsValue(HbfIngresosTableMap::COL_ID_INGRESO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfIngresosTableMap::COL_ID_INGRESO.')');
        }


        // Set the correct dbName
        $query = HbfIngresosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfIngresosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfIngresosTableMap::buildTableMap();
