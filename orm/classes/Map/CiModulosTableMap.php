<?php

namespace Map;

use \CiModulos;
use \CiModulosQuery;
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
 * This class defines the structure of the 'ci_modulos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CiModulosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CiModulosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ci_modulos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CiModulos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CiModulos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the id_modulo field
     */
    const COL_ID_MODULO = 'ci_modulos.id_modulo';

    /**
     * the column name for the id_opcion_modulo field
     */
    const COL_ID_OPCION_MODULO = 'ci_modulos.id_opcion_modulo';

    /**
     * the column name for the id_opcion_roles field
     */
    const COL_ID_OPCION_ROLES = 'ci_modulos.id_opcion_roles';

    /**
     * the column name for the titulo field
     */
    const COL_TITULO = 'ci_modulos.titulo';

    /**
     * the column name for the tabla field
     */
    const COL_TABLA = 'ci_modulos.tabla';

    /**
     * the column name for the listed field
     */
    const COL_LISTED = 'ci_modulos.listed';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'ci_modulos.descripcion';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'ci_modulos.icon';

    /**
     * the column name for the url field
     */
    const COL_URL = 'ci_modulos.url';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'ci_modulos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'ci_modulos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'ci_modulos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'ci_modulos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'ci_modulos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'ci_modulos.date_created';

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
        self::TYPE_PHPNAME       => array('IdModulo', 'IdOpcionModulo', 'IdOpcionRoles', 'Titulo', 'Tabla', 'Listed', 'Descripcion', 'Icon', 'Url', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idModulo', 'idOpcionModulo', 'idOpcionRoles', 'titulo', 'tabla', 'listed', 'descripcion', 'icon', 'url', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(CiModulosTableMap::COL_ID_MODULO, CiModulosTableMap::COL_ID_OPCION_MODULO, CiModulosTableMap::COL_ID_OPCION_ROLES, CiModulosTableMap::COL_TITULO, CiModulosTableMap::COL_TABLA, CiModulosTableMap::COL_LISTED, CiModulosTableMap::COL_DESCRIPCION, CiModulosTableMap::COL_ICON, CiModulosTableMap::COL_URL, CiModulosTableMap::COL_ESTADO, CiModulosTableMap::COL_CHANGE_COUNT, CiModulosTableMap::COL_ID_USER_MODIFIED, CiModulosTableMap::COL_ID_USER_CREATED, CiModulosTableMap::COL_DATE_MODIFIED, CiModulosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_modulo', 'id_opcion_modulo', 'id_opcion_roles', 'titulo', 'tabla', 'listed', 'descripcion', 'icon', 'url', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdModulo' => 0, 'IdOpcionModulo' => 1, 'IdOpcionRoles' => 2, 'Titulo' => 3, 'Tabla' => 4, 'Listed' => 5, 'Descripcion' => 6, 'Icon' => 7, 'Url' => 8, 'Estado' => 9, 'ChangeCount' => 10, 'IdUserModified' => 11, 'IdUserCreated' => 12, 'DateModified' => 13, 'DateCreated' => 14, ),
        self::TYPE_CAMELNAME     => array('idModulo' => 0, 'idOpcionModulo' => 1, 'idOpcionRoles' => 2, 'titulo' => 3, 'tabla' => 4, 'listed' => 5, 'descripcion' => 6, 'icon' => 7, 'url' => 8, 'estado' => 9, 'changeCount' => 10, 'idUserModified' => 11, 'idUserCreated' => 12, 'dateModified' => 13, 'dateCreated' => 14, ),
        self::TYPE_COLNAME       => array(CiModulosTableMap::COL_ID_MODULO => 0, CiModulosTableMap::COL_ID_OPCION_MODULO => 1, CiModulosTableMap::COL_ID_OPCION_ROLES => 2, CiModulosTableMap::COL_TITULO => 3, CiModulosTableMap::COL_TABLA => 4, CiModulosTableMap::COL_LISTED => 5, CiModulosTableMap::COL_DESCRIPCION => 6, CiModulosTableMap::COL_ICON => 7, CiModulosTableMap::COL_URL => 8, CiModulosTableMap::COL_ESTADO => 9, CiModulosTableMap::COL_CHANGE_COUNT => 10, CiModulosTableMap::COL_ID_USER_MODIFIED => 11, CiModulosTableMap::COL_ID_USER_CREATED => 12, CiModulosTableMap::COL_DATE_MODIFIED => 13, CiModulosTableMap::COL_DATE_CREATED => 14, ),
        self::TYPE_FIELDNAME     => array('id_modulo' => 0, 'id_opcion_modulo' => 1, 'id_opcion_roles' => 2, 'titulo' => 3, 'tabla' => 4, 'listed' => 5, 'descripcion' => 6, 'icon' => 7, 'url' => 8, 'estado' => 9, 'change_count' => 10, 'id_user_modified' => 11, 'id_user_created' => 12, 'date_modified' => 13, 'date_created' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('ci_modulos');
        $this->setPhpName('CiModulos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CiModulos');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_modulo', 'IdModulo', 'INTEGER', true, null, null);
        $this->addForeignKey('id_opcion_modulo', 'IdOpcionModulo', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addForeignKey('id_opcion_roles', 'IdOpcionRoles', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('titulo', 'Titulo', 'VARCHAR', true, 100, null);
        $this->addColumn('tabla', 'Tabla', 'VARCHAR', false, 255, null);
        $this->addColumn('listed', 'Listed', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', true, 200, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 600, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', false, 255, 'ENABLED');
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
        $this->addRelation('CiOptionsRelatedByIdOpcionModulo', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_modulo',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiOptionsRelatedByIdOpcionRoles', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_roles',
    1 => ':id_option',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdModulo', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CiModulosTableMap::CLASS_DEFAULT : CiModulosTableMap::OM_CLASS;
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
     * @return array           (CiModulos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CiModulosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CiModulosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CiModulosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CiModulosTableMap::OM_CLASS;
            /** @var CiModulos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CiModulosTableMap::addInstanceToPool($obj, $key);
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
            $key = CiModulosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CiModulosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CiModulos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CiModulosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CiModulosTableMap::COL_ID_MODULO);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ID_OPCION_MODULO);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ID_OPCION_ROLES);
            $criteria->addSelectColumn(CiModulosTableMap::COL_TITULO);
            $criteria->addSelectColumn(CiModulosTableMap::COL_TABLA);
            $criteria->addSelectColumn(CiModulosTableMap::COL_LISTED);
            $criteria->addSelectColumn(CiModulosTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ICON);
            $criteria->addSelectColumn(CiModulosTableMap::COL_URL);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(CiModulosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(CiModulosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(CiModulosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(CiModulosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_modulo');
            $criteria->addSelectColumn($alias . '.id_opcion_modulo');
            $criteria->addSelectColumn($alias . '.id_opcion_roles');
            $criteria->addSelectColumn($alias . '.titulo');
            $criteria->addSelectColumn($alias . '.tabla');
            $criteria->addSelectColumn($alias . '.listed');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.icon');
            $criteria->addSelectColumn($alias . '.url');
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
        return Propel::getServiceContainer()->getDatabaseMap(CiModulosTableMap::DATABASE_NAME)->getTable(CiModulosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CiModulosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CiModulosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CiModulosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CiModulos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CiModulos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CiModulos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CiModulosTableMap::DATABASE_NAME);
            $criteria->add(CiModulosTableMap::COL_ID_MODULO, (array) $values, Criteria::IN);
        }

        $query = CiModulosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CiModulosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CiModulosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ci_modulos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CiModulosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CiModulos or Criteria object.
     *
     * @param mixed               $criteria Criteria or CiModulos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiModulosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CiModulos object
        }


        // Set the correct dbName
        $query = CiModulosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CiModulosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CiModulosTableMap::buildTableMap();
