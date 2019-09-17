<?php

namespace Map;

use \HbfEgresos;
use \HbfEgresosQuery;
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
 * This class defines the structure of the 'hbf_egresos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfEgresosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfEgresosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_egresos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfEgresos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfEgresos';

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
     * the column name for the id_egreso field
     */
    const COL_ID_EGRESO = 'hbf_egresos.id_egreso';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_egresos.id_club';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_egresos.id_turno';

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'hbf_egresos.id_sesion';

    /**
     * the column name for the id_cliente field
     */
    const COL_ID_CLIENTE = 'hbf_egresos.id_cliente';

    /**
     * the column name for the detalle field
     */
    const COL_DETALLE = 'hbf_egresos.detalle';

    /**
     * the column name for the tipo_egreso field
     */
    const COL_TIPO_EGRESO = 'hbf_egresos.tipo_egreso';

    /**
     * the column name for the fecha_egreso field
     */
    const COL_FECHA_EGRESO = 'hbf_egresos.fecha_egreso';

    /**
     * the column name for the monto field
     */
    const COL_MONTO = 'hbf_egresos.monto';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_egresos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_egresos.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_egresos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_egresos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_egresos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_egresos.date_created';

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
        self::TYPE_PHPNAME       => array('IdEgreso', 'IdClub', 'IdTurno', 'IdSesion', 'IdCliente', 'Detalle', 'TipoEgreso', 'FechaEgreso', 'Monto', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idEgreso', 'idClub', 'idTurno', 'idSesion', 'idCliente', 'detalle', 'tipoEgreso', 'fechaEgreso', 'monto', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfEgresosTableMap::COL_ID_EGRESO, HbfEgresosTableMap::COL_ID_CLUB, HbfEgresosTableMap::COL_ID_TURNO, HbfEgresosTableMap::COL_ID_SESION, HbfEgresosTableMap::COL_ID_CLIENTE, HbfEgresosTableMap::COL_DETALLE, HbfEgresosTableMap::COL_TIPO_EGRESO, HbfEgresosTableMap::COL_FECHA_EGRESO, HbfEgresosTableMap::COL_MONTO, HbfEgresosTableMap::COL_ESTADO, HbfEgresosTableMap::COL_CHANGE_COUNT, HbfEgresosTableMap::COL_ID_USER_MODIFIED, HbfEgresosTableMap::COL_ID_USER_CREATED, HbfEgresosTableMap::COL_DATE_MODIFIED, HbfEgresosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_egreso', 'id_club', 'id_turno', 'id_sesion', 'id_cliente', 'detalle', 'tipo_egreso', 'fecha_egreso', 'monto', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdEgreso' => 0, 'IdClub' => 1, 'IdTurno' => 2, 'IdSesion' => 3, 'IdCliente' => 4, 'Detalle' => 5, 'TipoEgreso' => 6, 'FechaEgreso' => 7, 'Monto' => 8, 'Estado' => 9, 'ChangeCount' => 10, 'IdUserModified' => 11, 'IdUserCreated' => 12, 'DateModified' => 13, 'DateCreated' => 14, ),
        self::TYPE_CAMELNAME     => array('idEgreso' => 0, 'idClub' => 1, 'idTurno' => 2, 'idSesion' => 3, 'idCliente' => 4, 'detalle' => 5, 'tipoEgreso' => 6, 'fechaEgreso' => 7, 'monto' => 8, 'estado' => 9, 'changeCount' => 10, 'idUserModified' => 11, 'idUserCreated' => 12, 'dateModified' => 13, 'dateCreated' => 14, ),
        self::TYPE_COLNAME       => array(HbfEgresosTableMap::COL_ID_EGRESO => 0, HbfEgresosTableMap::COL_ID_CLUB => 1, HbfEgresosTableMap::COL_ID_TURNO => 2, HbfEgresosTableMap::COL_ID_SESION => 3, HbfEgresosTableMap::COL_ID_CLIENTE => 4, HbfEgresosTableMap::COL_DETALLE => 5, HbfEgresosTableMap::COL_TIPO_EGRESO => 6, HbfEgresosTableMap::COL_FECHA_EGRESO => 7, HbfEgresosTableMap::COL_MONTO => 8, HbfEgresosTableMap::COL_ESTADO => 9, HbfEgresosTableMap::COL_CHANGE_COUNT => 10, HbfEgresosTableMap::COL_ID_USER_MODIFIED => 11, HbfEgresosTableMap::COL_ID_USER_CREATED => 12, HbfEgresosTableMap::COL_DATE_MODIFIED => 13, HbfEgresosTableMap::COL_DATE_CREATED => 14, ),
        self::TYPE_FIELDNAME     => array('id_egreso' => 0, 'id_club' => 1, 'id_turno' => 2, 'id_sesion' => 3, 'id_cliente' => 4, 'detalle' => 5, 'tipo_egreso' => 6, 'fecha_egreso' => 7, 'monto' => 8, 'estado' => 9, 'change_count' => 10, 'id_user_modified' => 11, 'id_user_created' => 12, 'date_modified' => 13, 'date_created' => 14, ),
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
        $this->setName('hbf_egresos');
        $this->setPhpName('HbfEgresos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfEgresos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_egreso', 'IdEgreso', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', false, 10, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', false, 10, null);
        $this->addForeignKey('id_sesion', 'IdSesion', 'INTEGER', 'hbf_sesiones', 'id_sesion', false, 10, null);
        $this->addForeignKey('id_cliente', 'IdCliente', 'INTEGER', 'ci_usuarios', 'id_usuario', false, 10, null);
        $this->addColumn('detalle', 'Detalle', 'VARCHAR', false, 500, null);
        $this->addColumn('tipo_egreso', 'TipoEgreso', 'VARCHAR', false, 10, null);
        $this->addColumn('fecha_egreso', 'FechaEgreso', 'DATE', false, null, null);
        $this->addColumn('monto', 'Monto', 'DECIMAL', false, null, null);
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
        $this->addRelation('CiUsuariosRelatedByIdCliente', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('HbfTurnos', '\\HbfTurnos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, null, false);
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, null, false);
        $this->addRelation('HbfClubs', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdEgreso', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfEgresosTableMap::CLASS_DEFAULT : HbfEgresosTableMap::OM_CLASS;
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
     * @return array           (HbfEgresos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfEgresosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfEgresosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfEgresosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfEgresosTableMap::OM_CLASS;
            /** @var HbfEgresos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfEgresosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfEgresosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfEgresosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfEgresos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfEgresosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_EGRESO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_CLIENTE);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_DETALLE);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_TIPO_EGRESO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_FECHA_EGRESO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_MONTO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfEgresosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_egreso');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.id_cliente');
            $criteria->addSelectColumn($alias . '.detalle');
            $criteria->addSelectColumn($alias . '.tipo_egreso');
            $criteria->addSelectColumn($alias . '.fecha_egreso');
            $criteria->addSelectColumn($alias . '.monto');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfEgresosTableMap::DATABASE_NAME)->getTable(HbfEgresosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfEgresosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfEgresosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfEgresosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfEgresos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfEgresos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfEgresosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfEgresos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfEgresosTableMap::DATABASE_NAME);
            $criteria->add(HbfEgresosTableMap::COL_ID_EGRESO, (array) $values, Criteria::IN);
        }

        $query = HbfEgresosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfEgresosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfEgresosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_egresos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfEgresosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfEgresos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfEgresos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfEgresosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfEgresos object
        }

        if ($criteria->containsKey(HbfEgresosTableMap::COL_ID_EGRESO) && $criteria->keyContainsValue(HbfEgresosTableMap::COL_ID_EGRESO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfEgresosTableMap::COL_ID_EGRESO.')');
        }


        // Set the correct dbName
        $query = HbfEgresosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfEgresosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfEgresosTableMap::buildTableMap();
