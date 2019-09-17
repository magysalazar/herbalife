<?php

namespace Map;

use \HbfVasos;
use \HbfVasosQuery;
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
 * This class defines the structure of the 'hbf_vasos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfVasosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfVasosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_vasos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfVasos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfVasos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id_vaso field
     */
    const COL_ID_VASO = 'hbf_vasos.id_vaso';

    /**
     * the column name for the id_comanda field
     */
    const COL_ID_COMANDA = 'hbf_vasos.id_comanda';

    /**
     * the column name for the nivel field
     */
    const COL_NIVEL = 'hbf_vasos.nivel';

    /**
     * the column name for the temperatura field
     */
    const COL_TEMPERATURA = 'hbf_vasos.temperatura';

    /**
     * the column name for the consistencia field
     */
    const COL_CONSISTENCIA = 'hbf_vasos.consistencia';

    /**
     * the column name for the id_opcion_tipo_producto field
     */
    const COL_ID_OPCION_TIPO_PRODUCTO = 'hbf_vasos.id_opcion_tipo_producto';

    /**
     * the column name for the num_productos field
     */
    const COL_NUM_PRODUCTOS = 'hbf_vasos.num_productos';

    /**
     * the column name for the detalle field
     */
    const COL_DETALLE = 'hbf_vasos.detalle';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_vasos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_vasos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_vasos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_vasos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_vasos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_vasos.date_created';

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
        self::TYPE_PHPNAME       => array('IdVaso', 'IdComanda', 'Nivel', 'Temperatura', 'Consistencia', 'IdOpcionTipoProducto', 'NumProductos', 'Detalle', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idVaso', 'idComanda', 'nivel', 'temperatura', 'consistencia', 'idOpcionTipoProducto', 'numProductos', 'detalle', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfVasosTableMap::COL_ID_VASO, HbfVasosTableMap::COL_ID_COMANDA, HbfVasosTableMap::COL_NIVEL, HbfVasosTableMap::COL_TEMPERATURA, HbfVasosTableMap::COL_CONSISTENCIA, HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO, HbfVasosTableMap::COL_NUM_PRODUCTOS, HbfVasosTableMap::COL_DETALLE, HbfVasosTableMap::COL_ESTADO, HbfVasosTableMap::COL_CHANGE_COUNT, HbfVasosTableMap::COL_ID_USER_MODIFIED, HbfVasosTableMap::COL_ID_USER_CREATED, HbfVasosTableMap::COL_DATE_MODIFIED, HbfVasosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_vaso', 'id_comanda', 'nivel', 'temperatura', 'consistencia', 'id_opcion_tipo_producto', 'num_productos', 'detalle', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdVaso' => 0, 'IdComanda' => 1, 'Nivel' => 2, 'Temperatura' => 3, 'Consistencia' => 4, 'IdOpcionTipoProducto' => 5, 'NumProductos' => 6, 'Detalle' => 7, 'Estado' => 8, 'ChangeCount' => 9, 'IdUserModified' => 10, 'IdUserCreated' => 11, 'DateModified' => 12, 'DateCreated' => 13, ),
        self::TYPE_CAMELNAME     => array('idVaso' => 0, 'idComanda' => 1, 'nivel' => 2, 'temperatura' => 3, 'consistencia' => 4, 'idOpcionTipoProducto' => 5, 'numProductos' => 6, 'detalle' => 7, 'estado' => 8, 'changeCount' => 9, 'idUserModified' => 10, 'idUserCreated' => 11, 'dateModified' => 12, 'dateCreated' => 13, ),
        self::TYPE_COLNAME       => array(HbfVasosTableMap::COL_ID_VASO => 0, HbfVasosTableMap::COL_ID_COMANDA => 1, HbfVasosTableMap::COL_NIVEL => 2, HbfVasosTableMap::COL_TEMPERATURA => 3, HbfVasosTableMap::COL_CONSISTENCIA => 4, HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO => 5, HbfVasosTableMap::COL_NUM_PRODUCTOS => 6, HbfVasosTableMap::COL_DETALLE => 7, HbfVasosTableMap::COL_ESTADO => 8, HbfVasosTableMap::COL_CHANGE_COUNT => 9, HbfVasosTableMap::COL_ID_USER_MODIFIED => 10, HbfVasosTableMap::COL_ID_USER_CREATED => 11, HbfVasosTableMap::COL_DATE_MODIFIED => 12, HbfVasosTableMap::COL_DATE_CREATED => 13, ),
        self::TYPE_FIELDNAME     => array('id_vaso' => 0, 'id_comanda' => 1, 'nivel' => 2, 'temperatura' => 3, 'consistencia' => 4, 'id_opcion_tipo_producto' => 5, 'num_productos' => 6, 'detalle' => 7, 'estado' => 8, 'change_count' => 9, 'id_user_modified' => 10, 'id_user_created' => 11, 'date_modified' => 12, 'date_created' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('hbf_vasos');
        $this->setPhpName('HbfVasos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfVasos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_vaso', 'IdVaso', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_comanda', 'IdComanda', 'INTEGER', 'hbf_comandas', 'id_comanda', false, 10, null);
        $this->addColumn('nivel', 'Nivel', 'INTEGER', false, null, null);
        $this->addColumn('temperatura', 'Temperatura', 'VARCHAR', false, 250, null);
        $this->addColumn('consistencia', 'Consistencia', 'VARCHAR', false, 250, null);
        $this->addForeignKey('id_opcion_tipo_producto', 'IdOpcionTipoProducto', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('num_productos', 'NumProductos', 'INTEGER', false, null, 0);
        $this->addColumn('detalle', 'Detalle', 'VARCHAR', false, 500, null);
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
        $this->addRelation('CiUsuariosRelatedByIdUserModified', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_modified',
    1 => ':id_usuario',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('CiUsuariosRelatedByIdUserCreated', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_user_created',
    1 => ':id_usuario',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, null, false);
        $this->addRelation('CiOptions', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_tipo_producto',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('HbfDetallesPedidos', '\\HbfDetallesPedidos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_vaso',
    1 => ':id_vaso',
  ),
), null, null, 'HbfDetallesPedidoss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdVaso', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfVasosTableMap::CLASS_DEFAULT : HbfVasosTableMap::OM_CLASS;
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
     * @return array           (HbfVasos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfVasosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfVasosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfVasosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfVasosTableMap::OM_CLASS;
            /** @var HbfVasos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfVasosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfVasosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfVasosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfVasos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfVasosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ID_VASO);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ID_COMANDA);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_NIVEL);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_TEMPERATURA);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_CONSISTENCIA);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ID_OPCION_TIPO_PRODUCTO);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_NUM_PRODUCTOS);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_DETALLE);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfVasosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_vaso');
            $criteria->addSelectColumn($alias . '.id_comanda');
            $criteria->addSelectColumn($alias . '.nivel');
            $criteria->addSelectColumn($alias . '.temperatura');
            $criteria->addSelectColumn($alias . '.consistencia');
            $criteria->addSelectColumn($alias . '.id_opcion_tipo_producto');
            $criteria->addSelectColumn($alias . '.num_productos');
            $criteria->addSelectColumn($alias . '.detalle');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfVasosTableMap::DATABASE_NAME)->getTable(HbfVasosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfVasosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfVasosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfVasosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfVasos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfVasos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVasosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfVasos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfVasosTableMap::DATABASE_NAME);
            $criteria->add(HbfVasosTableMap::COL_ID_VASO, (array) $values, Criteria::IN);
        }

        $query = HbfVasosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfVasosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfVasosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_vasos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfVasosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfVasos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfVasos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVasosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfVasos object
        }

        if ($criteria->containsKey(HbfVasosTableMap::COL_ID_VASO) && $criteria->keyContainsValue(HbfVasosTableMap::COL_ID_VASO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfVasosTableMap::COL_ID_VASO.')');
        }


        // Set the correct dbName
        $query = HbfVasosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfVasosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfVasosTableMap::buildTableMap();
