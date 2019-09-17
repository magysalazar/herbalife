<?php

namespace Map;

use \HbfTurnos;
use \HbfTurnosQuery;
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
 * This class defines the structure of the 'hbf_turnos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfTurnosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfTurnosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_turnos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfTurnos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfTurnos';

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
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_turnos.id_turno';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_turnos.id_club';

    /**
     * the column name for the id_asociado field
     */
    const COL_ID_ASOCIADO = 'hbf_turnos.id_asociado';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'hbf_turnos.descripcion';

    /**
     * the column name for the fec_inicio field
     */
    const COL_FEC_INICIO = 'hbf_turnos.fec_inicio';

    /**
     * the column name for the fec_fin field
     */
    const COL_FEC_FIN = 'hbf_turnos.fec_fin';

    /**
     * the column name for the horario_desde field
     */
    const COL_HORARIO_DESDE = 'hbf_turnos.horario_desde';

    /**
     * the column name for the horario_hasta field
     */
    const COL_HORARIO_HASTA = 'hbf_turnos.horario_hasta';

    /**
     * the column name for the total_consumos field
     */
    const COL_TOTAL_CONSUMOS = 'hbf_turnos.total_consumos';

    /**
     * the column name for the id_opcion_turnos field
     */
    const COL_ID_OPCION_TURNOS = 'hbf_turnos.id_opcion_turnos';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_turnos.change_count';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_turnos.estado';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_turnos.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_turnos.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_turnos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_turnos.date_created';

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
        self::TYPE_PHPNAME       => array('IdTurno', 'IdClub', 'IdAsociado', 'Descripcion', 'FecInicio', 'FecFin', 'HorarioDesde', 'HorarioHasta', 'TotalConsumos', 'IdOpcionTurnos', 'ChangeCount', 'Estado', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idTurno', 'idClub', 'idAsociado', 'descripcion', 'fecInicio', 'fecFin', 'horarioDesde', 'horarioHasta', 'totalConsumos', 'idOpcionTurnos', 'changeCount', 'estado', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfTurnosTableMap::COL_ID_TURNO, HbfTurnosTableMap::COL_ID_CLUB, HbfTurnosTableMap::COL_ID_ASOCIADO, HbfTurnosTableMap::COL_DESCRIPCION, HbfTurnosTableMap::COL_FEC_INICIO, HbfTurnosTableMap::COL_FEC_FIN, HbfTurnosTableMap::COL_HORARIO_DESDE, HbfTurnosTableMap::COL_HORARIO_HASTA, HbfTurnosTableMap::COL_TOTAL_CONSUMOS, HbfTurnosTableMap::COL_ID_OPCION_TURNOS, HbfTurnosTableMap::COL_CHANGE_COUNT, HbfTurnosTableMap::COL_ESTADO, HbfTurnosTableMap::COL_ID_USER_MODIFIED, HbfTurnosTableMap::COL_ID_USER_CREATED, HbfTurnosTableMap::COL_DATE_MODIFIED, HbfTurnosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_turno', 'id_club', 'id_asociado', 'descripcion', 'fec_inicio', 'fec_fin', 'horario_desde', 'horario_hasta', 'total_consumos', 'id_opcion_turnos', 'change_count', 'estado', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdTurno' => 0, 'IdClub' => 1, 'IdAsociado' => 2, 'Descripcion' => 3, 'FecInicio' => 4, 'FecFin' => 5, 'HorarioDesde' => 6, 'HorarioHasta' => 7, 'TotalConsumos' => 8, 'IdOpcionTurnos' => 9, 'ChangeCount' => 10, 'Estado' => 11, 'IdUserModified' => 12, 'IdUserCreated' => 13, 'DateModified' => 14, 'DateCreated' => 15, ),
        self::TYPE_CAMELNAME     => array('idTurno' => 0, 'idClub' => 1, 'idAsociado' => 2, 'descripcion' => 3, 'fecInicio' => 4, 'fecFin' => 5, 'horarioDesde' => 6, 'horarioHasta' => 7, 'totalConsumos' => 8, 'idOpcionTurnos' => 9, 'changeCount' => 10, 'estado' => 11, 'idUserModified' => 12, 'idUserCreated' => 13, 'dateModified' => 14, 'dateCreated' => 15, ),
        self::TYPE_COLNAME       => array(HbfTurnosTableMap::COL_ID_TURNO => 0, HbfTurnosTableMap::COL_ID_CLUB => 1, HbfTurnosTableMap::COL_ID_ASOCIADO => 2, HbfTurnosTableMap::COL_DESCRIPCION => 3, HbfTurnosTableMap::COL_FEC_INICIO => 4, HbfTurnosTableMap::COL_FEC_FIN => 5, HbfTurnosTableMap::COL_HORARIO_DESDE => 6, HbfTurnosTableMap::COL_HORARIO_HASTA => 7, HbfTurnosTableMap::COL_TOTAL_CONSUMOS => 8, HbfTurnosTableMap::COL_ID_OPCION_TURNOS => 9, HbfTurnosTableMap::COL_CHANGE_COUNT => 10, HbfTurnosTableMap::COL_ESTADO => 11, HbfTurnosTableMap::COL_ID_USER_MODIFIED => 12, HbfTurnosTableMap::COL_ID_USER_CREATED => 13, HbfTurnosTableMap::COL_DATE_MODIFIED => 14, HbfTurnosTableMap::COL_DATE_CREATED => 15, ),
        self::TYPE_FIELDNAME     => array('id_turno' => 0, 'id_club' => 1, 'id_asociado' => 2, 'descripcion' => 3, 'fec_inicio' => 4, 'fec_fin' => 5, 'horario_desde' => 6, 'horario_hasta' => 7, 'total_consumos' => 8, 'id_opcion_turnos' => 9, 'change_count' => 10, 'estado' => 11, 'id_user_modified' => 12, 'id_user_created' => 13, 'date_modified' => 14, 'date_created' => 15, ),
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
        $this->setName('hbf_turnos');
        $this->setPhpName('HbfTurnos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfTurnos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_turno', 'IdTurno', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', true, 10, null);
        $this->addForeignKey('id_asociado', 'IdAsociado', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('fec_inicio', 'FecInicio', 'DATE', true, null, null);
        $this->addColumn('fec_fin', 'FecFin', 'DATE', false, null, null);
        $this->addColumn('horario_desde', 'HorarioDesde', 'TIME', true, null, null);
        $this->addColumn('horario_hasta', 'HorarioHasta', 'TIME', true, null, null);
        $this->addColumn('total_consumos', 'TotalConsumos', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_opcion_turnos', 'IdOpcionTurnos', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
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
        $this->addRelation('CiUsuariosRelatedByIdAsociado', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_asociado',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('HbfClubs', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, null, false);
        $this->addRelation('CiOptions', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_turnos',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiUsuariosRelatedByIdTurno', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, 'CiUsuariossRelatedByIdTurno', false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), 'CASCADE', 'CASCADE', 'HbfComandass', false);
        $this->addRelation('HbfEgresos', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, 'HbfEgresoss', false);
        $this->addRelation('HbfPrepagos', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, 'HbfPrepagoss', false);
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, 'HbfSesioness', false);
        $this->addRelation('HbfVentas', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, 'HbfVentass', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to hbf_turnos     * by a foreign key with ON DELETE CASCADE
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdTurno', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfTurnosTableMap::CLASS_DEFAULT : HbfTurnosTableMap::OM_CLASS;
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
     * @return array           (HbfTurnos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfTurnosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfTurnosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfTurnosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfTurnosTableMap::OM_CLASS;
            /** @var HbfTurnos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfTurnosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfTurnosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfTurnosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfTurnos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfTurnosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_ASOCIADO);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_FEC_INICIO);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_FEC_FIN);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_HORARIO_DESDE);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_HORARIO_HASTA);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_TOTAL_CONSUMOS);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_OPCION_TURNOS);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfTurnosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_asociado');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.fec_inicio');
            $criteria->addSelectColumn($alias . '.fec_fin');
            $criteria->addSelectColumn($alias . '.horario_desde');
            $criteria->addSelectColumn($alias . '.horario_hasta');
            $criteria->addSelectColumn($alias . '.total_consumos');
            $criteria->addSelectColumn($alias . '.id_opcion_turnos');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.estado');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfTurnosTableMap::DATABASE_NAME)->getTable(HbfTurnosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfTurnosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfTurnosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfTurnosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfTurnos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfTurnos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfTurnos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfTurnosTableMap::DATABASE_NAME);
            $criteria->add(HbfTurnosTableMap::COL_ID_TURNO, (array) $values, Criteria::IN);
        }

        $query = HbfTurnosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfTurnosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfTurnosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_turnos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfTurnosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfTurnos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfTurnos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfTurnosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfTurnos object
        }

        if ($criteria->containsKey(HbfTurnosTableMap::COL_ID_TURNO) && $criteria->keyContainsValue(HbfTurnosTableMap::COL_ID_TURNO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfTurnosTableMap::COL_ID_TURNO.')');
        }


        // Set the correct dbName
        $query = HbfTurnosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfTurnosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfTurnosTableMap::buildTableMap();
