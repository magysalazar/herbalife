<?php

namespace Map;

use \CiSettings;
use \CiSettingsQuery;
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
 * This class defines the structure of the 'ci_settings' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CiSettingsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CiSettingsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ci_settings';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CiSettings';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CiSettings';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id_setting field
     */
    const COL_ID_SETTING = 'ci_settings.id_setting';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'ci_settings.nombre';

    /**
     * the column name for the tabla field
     */
    const COL_TABLA = 'ci_settings.tabla';

    /**
     * the column name for the id_field field
     */
    const COL_ID_FIELD = 'ci_settings.id_field';

    /**
     * the column name for the fields field
     */
    const COL_FIELDS = 'ci_settings.fields';

    /**
     * the column name for the edit_tag field
     */
    const COL_EDIT_TAG = 'ci_settings.edit_tag';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'ci_settings.descripcion';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'ci_settings.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'ci_settings.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'ci_settings.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'ci_settings.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'ci_settings.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'ci_settings.date_created';

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
        self::TYPE_PHPNAME       => array('IdSetting', 'Nombre', 'Tabla', 'IdField', 'Fields', 'EditTag', 'Descripcion', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idSetting', 'nombre', 'tabla', 'idField', 'fields', 'editTag', 'descripcion', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(CiSettingsTableMap::COL_ID_SETTING, CiSettingsTableMap::COL_NOMBRE, CiSettingsTableMap::COL_TABLA, CiSettingsTableMap::COL_ID_FIELD, CiSettingsTableMap::COL_FIELDS, CiSettingsTableMap::COL_EDIT_TAG, CiSettingsTableMap::COL_DESCRIPCION, CiSettingsTableMap::COL_ESTADO, CiSettingsTableMap::COL_CHANGE_COUNT, CiSettingsTableMap::COL_ID_USER_MODIFIED, CiSettingsTableMap::COL_ID_USER_CREATED, CiSettingsTableMap::COL_DATE_MODIFIED, CiSettingsTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_setting', 'nombre', 'tabla', 'id_field', 'fields', 'edit_tag', 'descripcion', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSetting' => 0, 'Nombre' => 1, 'Tabla' => 2, 'IdField' => 3, 'Fields' => 4, 'EditTag' => 5, 'Descripcion' => 6, 'Estado' => 7, 'ChangeCount' => 8, 'IdUserModified' => 9, 'IdUserCreated' => 10, 'DateModified' => 11, 'DateCreated' => 12, ),
        self::TYPE_CAMELNAME     => array('idSetting' => 0, 'nombre' => 1, 'tabla' => 2, 'idField' => 3, 'fields' => 4, 'editTag' => 5, 'descripcion' => 6, 'estado' => 7, 'changeCount' => 8, 'idUserModified' => 9, 'idUserCreated' => 10, 'dateModified' => 11, 'dateCreated' => 12, ),
        self::TYPE_COLNAME       => array(CiSettingsTableMap::COL_ID_SETTING => 0, CiSettingsTableMap::COL_NOMBRE => 1, CiSettingsTableMap::COL_TABLA => 2, CiSettingsTableMap::COL_ID_FIELD => 3, CiSettingsTableMap::COL_FIELDS => 4, CiSettingsTableMap::COL_EDIT_TAG => 5, CiSettingsTableMap::COL_DESCRIPCION => 6, CiSettingsTableMap::COL_ESTADO => 7, CiSettingsTableMap::COL_CHANGE_COUNT => 8, CiSettingsTableMap::COL_ID_USER_MODIFIED => 9, CiSettingsTableMap::COL_ID_USER_CREATED => 10, CiSettingsTableMap::COL_DATE_MODIFIED => 11, CiSettingsTableMap::COL_DATE_CREATED => 12, ),
        self::TYPE_FIELDNAME     => array('id_setting' => 0, 'nombre' => 1, 'tabla' => 2, 'id_field' => 3, 'fields' => 4, 'edit_tag' => 5, 'descripcion' => 6, 'estado' => 7, 'change_count' => 8, 'id_user_modified' => 9, 'id_user_created' => 10, 'date_modified' => 11, 'date_created' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('ci_settings');
        $this->setPhpName('CiSettings');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CiSettings');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_setting', 'IdSetting', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', false, 250, null);
        $this->addColumn('tabla', 'Tabla', 'VARCHAR', true, 250, null);
        $this->addColumn('id_field', 'IdField', 'VARCHAR', false, 250, null);
        $this->addColumn('fields', 'Fields', 'VARCHAR', false, 800, null);
        $this->addColumn('edit_tag', 'EditTag', 'VARCHAR', false, 250, null);
        $this->addColumn('descripcion', 'Descripcion', 'VARCHAR', false, 500, null);
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
        $this->addRelation('CiOptions', '\\CiOptions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_setting',
    1 => ':id_setting',
  ),
), null, null, 'CiOptionss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSetting', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CiSettingsTableMap::CLASS_DEFAULT : CiSettingsTableMap::OM_CLASS;
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
     * @return array           (CiSettings object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CiSettingsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CiSettingsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CiSettingsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CiSettingsTableMap::OM_CLASS;
            /** @var CiSettings $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CiSettingsTableMap::addInstanceToPool($obj, $key);
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
            $key = CiSettingsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CiSettingsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CiSettings $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CiSettingsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CiSettingsTableMap::COL_ID_SETTING);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_TABLA);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_ID_FIELD);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_FIELDS);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_EDIT_TAG);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_ESTADO);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(CiSettingsTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_setting');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.tabla');
            $criteria->addSelectColumn($alias . '.id_field');
            $criteria->addSelectColumn($alias . '.fields');
            $criteria->addSelectColumn($alias . '.edit_tag');
            $criteria->addSelectColumn($alias . '.descripcion');
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
        return Propel::getServiceContainer()->getDatabaseMap(CiSettingsTableMap::DATABASE_NAME)->getTable(CiSettingsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CiSettingsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CiSettingsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CiSettingsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CiSettings or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CiSettings object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CiSettingsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CiSettings) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CiSettingsTableMap::DATABASE_NAME);
            $criteria->add(CiSettingsTableMap::COL_ID_SETTING, (array) $values, Criteria::IN);
        }

        $query = CiSettingsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CiSettingsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CiSettingsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ci_settings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CiSettingsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CiSettings or Criteria object.
     *
     * @param mixed               $criteria Criteria or CiSettings object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiSettingsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CiSettings object
        }

        if ($criteria->containsKey(CiSettingsTableMap::COL_ID_SETTING) && $criteria->keyContainsValue(CiSettingsTableMap::COL_ID_SETTING) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CiSettingsTableMap::COL_ID_SETTING.')');
        }


        // Set the correct dbName
        $query = CiSettingsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CiSettingsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CiSettingsTableMap::buildTableMap();
