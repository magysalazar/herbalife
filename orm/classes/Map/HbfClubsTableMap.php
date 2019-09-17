<?php

namespace Map;

use \HbfClubs;
use \HbfClubsQuery;
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
 * This class defines the structure of the 'hbf_clubs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfClubsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfClubsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_clubs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfClubs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfClubs';

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
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_clubs.id_club';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'hbf_clubs.nombre';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'hbf_clubs.email';

    /**
     * the column name for the direccion field
     */
    const COL_DIRECCION = 'hbf_clubs.direccion';

    /**
     * the column name for the licencia field
     */
    const COL_LICENCIA = 'hbf_clubs.licencia';

    /**
     * the column name for the direccion_gps field
     */
    const COL_DIRECCION_GPS = 'hbf_clubs.direccion_gps';

    /**
     * the column name for the ids_miembros field
     */
    const COL_IDS_MIEMBROS = 'hbf_clubs.ids_miembros';

    /**
     * the column name for the ids_turnos field
     */
    const COL_IDS_TURNOS = 'hbf_clubs.ids_turnos';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_clubs.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_clubs.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_clubs.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_clubs.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_clubs.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_clubs.date_created';

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
        self::TYPE_PHPNAME       => array('IdClub', 'Nombre', 'Email', 'Direccion', 'Licencia', 'DireccionGps', 'IdsMiembros', 'IdsTurnos', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idClub', 'nombre', 'email', 'direccion', 'licencia', 'direccionGps', 'idsMiembros', 'idsTurnos', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfClubsTableMap::COL_ID_CLUB, HbfClubsTableMap::COL_NOMBRE, HbfClubsTableMap::COL_EMAIL, HbfClubsTableMap::COL_DIRECCION, HbfClubsTableMap::COL_LICENCIA, HbfClubsTableMap::COL_DIRECCION_GPS, HbfClubsTableMap::COL_IDS_MIEMBROS, HbfClubsTableMap::COL_IDS_TURNOS, HbfClubsTableMap::COL_ESTADO, HbfClubsTableMap::COL_CHANGE_COUNT, HbfClubsTableMap::COL_ID_USER_MODIFIED, HbfClubsTableMap::COL_ID_USER_CREATED, HbfClubsTableMap::COL_DATE_MODIFIED, HbfClubsTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_club', 'nombre', 'email', 'direccion', 'licencia', 'direccion_gps', 'ids_miembros', 'ids_turnos', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdClub' => 0, 'Nombre' => 1, 'Email' => 2, 'Direccion' => 3, 'Licencia' => 4, 'DireccionGps' => 5, 'IdsMiembros' => 6, 'IdsTurnos' => 7, 'Estado' => 8, 'ChangeCount' => 9, 'IdUserModified' => 10, 'IdUserCreated' => 11, 'DateModified' => 12, 'DateCreated' => 13, ),
        self::TYPE_CAMELNAME     => array('idClub' => 0, 'nombre' => 1, 'email' => 2, 'direccion' => 3, 'licencia' => 4, 'direccionGps' => 5, 'idsMiembros' => 6, 'idsTurnos' => 7, 'estado' => 8, 'changeCount' => 9, 'idUserModified' => 10, 'idUserCreated' => 11, 'dateModified' => 12, 'dateCreated' => 13, ),
        self::TYPE_COLNAME       => array(HbfClubsTableMap::COL_ID_CLUB => 0, HbfClubsTableMap::COL_NOMBRE => 1, HbfClubsTableMap::COL_EMAIL => 2, HbfClubsTableMap::COL_DIRECCION => 3, HbfClubsTableMap::COL_LICENCIA => 4, HbfClubsTableMap::COL_DIRECCION_GPS => 5, HbfClubsTableMap::COL_IDS_MIEMBROS => 6, HbfClubsTableMap::COL_IDS_TURNOS => 7, HbfClubsTableMap::COL_ESTADO => 8, HbfClubsTableMap::COL_CHANGE_COUNT => 9, HbfClubsTableMap::COL_ID_USER_MODIFIED => 10, HbfClubsTableMap::COL_ID_USER_CREATED => 11, HbfClubsTableMap::COL_DATE_MODIFIED => 12, HbfClubsTableMap::COL_DATE_CREATED => 13, ),
        self::TYPE_FIELDNAME     => array('id_club' => 0, 'nombre' => 1, 'email' => 2, 'direccion' => 3, 'licencia' => 4, 'direccion_gps' => 5, 'ids_miembros' => 6, 'ids_turnos' => 7, 'estado' => 8, 'change_count' => 9, 'id_user_modified' => 10, 'id_user_created' => 11, 'date_modified' => 12, 'date_created' => 13, ),
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
        $this->setName('hbf_clubs');
        $this->setPhpName('HbfClubs');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfClubs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_club', 'IdClub', 'INTEGER', true, 10, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 100, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 100, null);
        $this->addColumn('direccion', 'Direccion', 'VARCHAR', true, 200, null);
        $this->addColumn('licencia', 'Licencia', 'VARCHAR', true, 100, null);
        $this->addColumn('direccion_gps', 'DireccionGps', 'VARCHAR', true, 100, null);
        $this->addColumn('ids_miembros', 'IdsMiembros', 'VARCHAR', false, 500, null);
        $this->addColumn('ids_turnos', 'IdsTurnos', 'VARCHAR', false, 500, null);
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
        $this->addRelation('CiUsuariosRelatedByIdClub', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, 'CiUsuariossRelatedByIdClub', false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), 'CASCADE', 'CASCADE', 'HbfComandass', false);
        $this->addRelation('HbfEgresos', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, 'HbfEgresoss', false);
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, 'HbfSesioness', false);
        $this->addRelation('HbfTurnos', '\\HbfTurnos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, 'HbfTurnoss', false);
        $this->addRelation('HbfVentas', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, 'HbfVentass', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to hbf_clubs     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        HbfComandasTableMap::clearInstancePool();
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdClub', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfClubsTableMap::CLASS_DEFAULT : HbfClubsTableMap::OM_CLASS;
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
     * @return array           (HbfClubs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfClubsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfClubsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfClubsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfClubsTableMap::OM_CLASS;
            /** @var HbfClubs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfClubsTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfClubsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfClubsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfClubs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfClubsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfClubsTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_DIRECCION);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_LICENCIA);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_DIRECCION_GPS);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_IDS_MIEMBROS);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_IDS_TURNOS);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfClubsTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.direccion');
            $criteria->addSelectColumn($alias . '.licencia');
            $criteria->addSelectColumn($alias . '.direccion_gps');
            $criteria->addSelectColumn($alias . '.ids_miembros');
            $criteria->addSelectColumn($alias . '.ids_turnos');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfClubsTableMap::DATABASE_NAME)->getTable(HbfClubsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfClubsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfClubsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfClubsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfClubs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfClubs object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfClubsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfClubs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfClubsTableMap::DATABASE_NAME);
            $criteria->add(HbfClubsTableMap::COL_ID_CLUB, (array) $values, Criteria::IN);
        }

        $query = HbfClubsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfClubsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfClubsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_clubs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfClubsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfClubs or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfClubs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfClubsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfClubs object
        }

        if ($criteria->containsKey(HbfClubsTableMap::COL_ID_CLUB) && $criteria->keyContainsValue(HbfClubsTableMap::COL_ID_CLUB) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfClubsTableMap::COL_ID_CLUB.')');
        }


        // Set the correct dbName
        $query = HbfClubsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfClubsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfClubsTableMap::buildTableMap();
