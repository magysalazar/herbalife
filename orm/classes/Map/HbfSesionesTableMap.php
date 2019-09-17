<?php

namespace Map;

use \HbfSesiones;
use \HbfSesionesQuery;
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
 * This class defines the structure of the 'hbf_sesiones' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfSesionesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfSesionesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_sesiones';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfSesiones';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfSesiones';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 27;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 27;

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'hbf_sesiones.id_sesion';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_sesiones.id_club';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_sesiones.id_turno';

    /**
     * the column name for the id_asociado field
     */
    const COL_ID_ASOCIADO = 'hbf_sesiones.id_asociado';

    /**
     * the column name for the detalle field
     */
    const COL_DETALLE = 'hbf_sesiones.detalle';

    /**
     * the column name for the caja_inicial field
     */
    const COL_CAJA_INICIAL = 'hbf_sesiones.caja_inicial';

    /**
     * the column name for the caja_final field
     */
    const COL_CAJA_FINAL = 'hbf_sesiones.caja_final';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'hbf_sesiones.total';

    /**
     * the column name for the num_consumos field
     */
    const COL_NUM_CONSUMOS = 'hbf_sesiones.num_consumos';

    /**
     * the column name for the total_ingresos field
     */
    const COL_TOTAL_INGRESOS = 'hbf_sesiones.total_ingresos';

    /**
     * the column name for the total_egresos field
     */
    const COL_TOTAL_EGRESOS = 'hbf_sesiones.total_egresos';

    /**
     * the column name for the total_deben field
     */
    const COL_TOTAL_DEBEN = 'hbf_sesiones.total_deben';

    /**
     * the column name for the total_sobra field
     */
    const COL_TOTAL_SOBRA = 'hbf_sesiones.total_sobra';

    /**
     * the column name for the total_falta field
     */
    const COL_TOTAL_FALTA = 'hbf_sesiones.total_falta';

    /**
     * the column name for the sobre_rojo field
     */
    const COL_SOBRE_ROJO = 'hbf_sesiones.sobre_rojo';

    /**
     * the column name for the sobre_verde field
     */
    const COL_SOBRE_VERDE = 'hbf_sesiones.sobre_verde';

    /**
     * the column name for the deposito field
     */
    const COL_DEPOSITO = 'hbf_sesiones.deposito';

    /**
     * the column name for the cerrado field
     */
    const COL_CERRADO = 'hbf_sesiones.cerrado';

    /**
     * the column name for the observaciones field
     */
    const COL_OBSERVACIONES = 'hbf_sesiones.observaciones';

    /**
     * the column name for the fec_sesion field
     */
    const COL_FEC_SESION = 'hbf_sesiones.fec_sesion';

    /**
     * the column name for the id_opcion_sesion field
     */
    const COL_ID_OPCION_SESION = 'hbf_sesiones.id_opcion_sesion';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_sesiones.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_sesiones.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_sesiones.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_sesiones.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_sesiones.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_sesiones.date_created';

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
        self::TYPE_PHPNAME       => array('IdSesion', 'IdClub', 'IdTurno', 'IdAsociado', 'Detalle', 'CajaInicial', 'CajaFinal', 'Total', 'NumConsumos', 'TotalIngresos', 'TotalEgresos', 'TotalDeben', 'TotalSobra', 'TotalFalta', 'SobreRojo', 'SobreVerde', 'Deposito', 'Cerrado', 'Observaciones', 'FecSesion', 'IdOpcionSesion', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idSesion', 'idClub', 'idTurno', 'idAsociado', 'detalle', 'cajaInicial', 'cajaFinal', 'total', 'numConsumos', 'totalIngresos', 'totalEgresos', 'totalDeben', 'totalSobra', 'totalFalta', 'sobreRojo', 'sobreVerde', 'deposito', 'cerrado', 'observaciones', 'fecSesion', 'idOpcionSesion', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfSesionesTableMap::COL_ID_SESION, HbfSesionesTableMap::COL_ID_CLUB, HbfSesionesTableMap::COL_ID_TURNO, HbfSesionesTableMap::COL_ID_ASOCIADO, HbfSesionesTableMap::COL_DETALLE, HbfSesionesTableMap::COL_CAJA_INICIAL, HbfSesionesTableMap::COL_CAJA_FINAL, HbfSesionesTableMap::COL_TOTAL, HbfSesionesTableMap::COL_NUM_CONSUMOS, HbfSesionesTableMap::COL_TOTAL_INGRESOS, HbfSesionesTableMap::COL_TOTAL_EGRESOS, HbfSesionesTableMap::COL_TOTAL_DEBEN, HbfSesionesTableMap::COL_TOTAL_SOBRA, HbfSesionesTableMap::COL_TOTAL_FALTA, HbfSesionesTableMap::COL_SOBRE_ROJO, HbfSesionesTableMap::COL_SOBRE_VERDE, HbfSesionesTableMap::COL_DEPOSITO, HbfSesionesTableMap::COL_CERRADO, HbfSesionesTableMap::COL_OBSERVACIONES, HbfSesionesTableMap::COL_FEC_SESION, HbfSesionesTableMap::COL_ID_OPCION_SESION, HbfSesionesTableMap::COL_ESTADO, HbfSesionesTableMap::COL_CHANGE_COUNT, HbfSesionesTableMap::COL_ID_USER_MODIFIED, HbfSesionesTableMap::COL_ID_USER_CREATED, HbfSesionesTableMap::COL_DATE_MODIFIED, HbfSesionesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_sesion', 'id_club', 'id_turno', 'id_asociado', 'detalle', 'caja_inicial', 'caja_final', 'total', 'num_consumos', 'total_ingresos', 'total_egresos', 'total_deben', 'total_sobra', 'total_falta', 'sobre_rojo', 'sobre_verde', 'deposito', 'cerrado', 'observaciones', 'fec_sesion', 'id_opcion_sesion', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdSesion' => 0, 'IdClub' => 1, 'IdTurno' => 2, 'IdAsociado' => 3, 'Detalle' => 4, 'CajaInicial' => 5, 'CajaFinal' => 6, 'Total' => 7, 'NumConsumos' => 8, 'TotalIngresos' => 9, 'TotalEgresos' => 10, 'TotalDeben' => 11, 'TotalSobra' => 12, 'TotalFalta' => 13, 'SobreRojo' => 14, 'SobreVerde' => 15, 'Deposito' => 16, 'Cerrado' => 17, 'Observaciones' => 18, 'FecSesion' => 19, 'IdOpcionSesion' => 20, 'Estado' => 21, 'ChangeCount' => 22, 'IdUserModified' => 23, 'IdUserCreated' => 24, 'DateModified' => 25, 'DateCreated' => 26, ),
        self::TYPE_CAMELNAME     => array('idSesion' => 0, 'idClub' => 1, 'idTurno' => 2, 'idAsociado' => 3, 'detalle' => 4, 'cajaInicial' => 5, 'cajaFinal' => 6, 'total' => 7, 'numConsumos' => 8, 'totalIngresos' => 9, 'totalEgresos' => 10, 'totalDeben' => 11, 'totalSobra' => 12, 'totalFalta' => 13, 'sobreRojo' => 14, 'sobreVerde' => 15, 'deposito' => 16, 'cerrado' => 17, 'observaciones' => 18, 'fecSesion' => 19, 'idOpcionSesion' => 20, 'estado' => 21, 'changeCount' => 22, 'idUserModified' => 23, 'idUserCreated' => 24, 'dateModified' => 25, 'dateCreated' => 26, ),
        self::TYPE_COLNAME       => array(HbfSesionesTableMap::COL_ID_SESION => 0, HbfSesionesTableMap::COL_ID_CLUB => 1, HbfSesionesTableMap::COL_ID_TURNO => 2, HbfSesionesTableMap::COL_ID_ASOCIADO => 3, HbfSesionesTableMap::COL_DETALLE => 4, HbfSesionesTableMap::COL_CAJA_INICIAL => 5, HbfSesionesTableMap::COL_CAJA_FINAL => 6, HbfSesionesTableMap::COL_TOTAL => 7, HbfSesionesTableMap::COL_NUM_CONSUMOS => 8, HbfSesionesTableMap::COL_TOTAL_INGRESOS => 9, HbfSesionesTableMap::COL_TOTAL_EGRESOS => 10, HbfSesionesTableMap::COL_TOTAL_DEBEN => 11, HbfSesionesTableMap::COL_TOTAL_SOBRA => 12, HbfSesionesTableMap::COL_TOTAL_FALTA => 13, HbfSesionesTableMap::COL_SOBRE_ROJO => 14, HbfSesionesTableMap::COL_SOBRE_VERDE => 15, HbfSesionesTableMap::COL_DEPOSITO => 16, HbfSesionesTableMap::COL_CERRADO => 17, HbfSesionesTableMap::COL_OBSERVACIONES => 18, HbfSesionesTableMap::COL_FEC_SESION => 19, HbfSesionesTableMap::COL_ID_OPCION_SESION => 20, HbfSesionesTableMap::COL_ESTADO => 21, HbfSesionesTableMap::COL_CHANGE_COUNT => 22, HbfSesionesTableMap::COL_ID_USER_MODIFIED => 23, HbfSesionesTableMap::COL_ID_USER_CREATED => 24, HbfSesionesTableMap::COL_DATE_MODIFIED => 25, HbfSesionesTableMap::COL_DATE_CREATED => 26, ),
        self::TYPE_FIELDNAME     => array('id_sesion' => 0, 'id_club' => 1, 'id_turno' => 2, 'id_asociado' => 3, 'detalle' => 4, 'caja_inicial' => 5, 'caja_final' => 6, 'total' => 7, 'num_consumos' => 8, 'total_ingresos' => 9, 'total_egresos' => 10, 'total_deben' => 11, 'total_sobra' => 12, 'total_falta' => 13, 'sobre_rojo' => 14, 'sobre_verde' => 15, 'deposito' => 16, 'cerrado' => 17, 'observaciones' => 18, 'fec_sesion' => 19, 'id_opcion_sesion' => 20, 'estado' => 21, 'change_count' => 22, 'id_user_modified' => 23, 'id_user_created' => 24, 'date_modified' => 25, 'date_created' => 26, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
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
        $this->setName('hbf_sesiones');
        $this->setPhpName('HbfSesiones');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfSesiones');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sesion', 'IdSesion', 'INTEGER', true, null, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', true, null, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', true, null, null);
        $this->addForeignKey('id_asociado', 'IdAsociado', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addColumn('detalle', 'Detalle', 'VARCHAR', false, 400, '');
        $this->addColumn('caja_inicial', 'CajaInicial', 'DECIMAL', false, null, null);
        $this->addColumn('caja_final', 'CajaFinal', 'DECIMAL', false, null, null);
        $this->addColumn('total', 'Total', 'DECIMAL', false, null, null);
        $this->addColumn('num_consumos', 'NumConsumos', 'DECIMAL', false, null, null);
        $this->addColumn('total_ingresos', 'TotalIngresos', 'DECIMAL', false, null, null);
        $this->addColumn('total_egresos', 'TotalEgresos', 'DECIMAL', false, null, null);
        $this->addColumn('total_deben', 'TotalDeben', 'DECIMAL', false, null, null);
        $this->addColumn('total_sobra', 'TotalSobra', 'DECIMAL', false, null, null);
        $this->addColumn('total_falta', 'TotalFalta', 'DECIMAL', false, null, null);
        $this->addColumn('sobre_rojo', 'SobreRojo', 'DECIMAL', false, null, null);
        $this->addColumn('sobre_verde', 'SobreVerde', 'DECIMAL', false, null, null);
        $this->addColumn('deposito', 'Deposito', 'DECIMAL', false, null, null);
        $this->addColumn('cerrado', 'Cerrado', 'VARCHAR', false, 10, null);
        $this->addColumn('observaciones', 'Observaciones', 'VARCHAR', false, 400, '');
        $this->addColumn('fec_sesion', 'FecSesion', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('id_opcion_sesion', 'IdOpcionSesion', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
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
        $this->addRelation('HbfClubs', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), null, null, null, false);
        $this->addRelation('CiUsuariosRelatedByIdAsociado', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_asociado',
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
        $this->addRelation('CiOptions', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_opcion_sesion',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('CiSessions', '\\CiSessions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_hbf_sesion',
    1 => ':id_sesion',
  ),
), null, null, 'CiSessionss', false);
        $this->addRelation('CiUsuariosRelatedByIdSesion', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, 'CiUsuariossRelatedByIdSesion', false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, 'HbfComandass', false);
        $this->addRelation('HbfEgresos', '\\HbfEgresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, 'HbfEgresoss', false);
        $this->addRelation('HbfPrepagos', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, 'HbfPrepagoss', false);
        $this->addRelation('HbfVentas', '\\HbfVentas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdSesion', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfSesionesTableMap::CLASS_DEFAULT : HbfSesionesTableMap::OM_CLASS;
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
     * @return array           (HbfSesiones object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfSesionesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfSesionesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfSesionesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfSesionesTableMap::OM_CLASS;
            /** @var HbfSesiones $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfSesionesTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfSesionesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfSesionesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfSesiones $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfSesionesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_ASOCIADO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_DETALLE);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_CAJA_INICIAL);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_CAJA_FINAL);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_NUM_CONSUMOS);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL_INGRESOS);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL_EGRESOS);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL_DEBEN);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL_SOBRA);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_TOTAL_FALTA);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_SOBRE_ROJO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_SOBRE_VERDE);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_DEPOSITO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_CERRADO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_OBSERVACIONES);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_FEC_SESION);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_OPCION_SESION);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfSesionesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_asociado');
            $criteria->addSelectColumn($alias . '.detalle');
            $criteria->addSelectColumn($alias . '.caja_inicial');
            $criteria->addSelectColumn($alias . '.caja_final');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.num_consumos');
            $criteria->addSelectColumn($alias . '.total_ingresos');
            $criteria->addSelectColumn($alias . '.total_egresos');
            $criteria->addSelectColumn($alias . '.total_deben');
            $criteria->addSelectColumn($alias . '.total_sobra');
            $criteria->addSelectColumn($alias . '.total_falta');
            $criteria->addSelectColumn($alias . '.sobre_rojo');
            $criteria->addSelectColumn($alias . '.sobre_verde');
            $criteria->addSelectColumn($alias . '.deposito');
            $criteria->addSelectColumn($alias . '.cerrado');
            $criteria->addSelectColumn($alias . '.observaciones');
            $criteria->addSelectColumn($alias . '.fec_sesion');
            $criteria->addSelectColumn($alias . '.id_opcion_sesion');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfSesionesTableMap::DATABASE_NAME)->getTable(HbfSesionesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfSesionesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfSesionesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfSesionesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfSesiones or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfSesiones object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfSesiones) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfSesionesTableMap::DATABASE_NAME);
            $criteria->add(HbfSesionesTableMap::COL_ID_SESION, (array) $values, Criteria::IN);
        }

        $query = HbfSesionesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfSesionesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfSesionesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_sesiones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfSesionesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfSesiones or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfSesiones object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfSesionesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfSesiones object
        }

        if ($criteria->containsKey(HbfSesionesTableMap::COL_ID_SESION) && $criteria->keyContainsValue(HbfSesionesTableMap::COL_ID_SESION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfSesionesTableMap::COL_ID_SESION.')');
        }


        // Set the correct dbName
        $query = HbfSesionesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfSesionesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfSesionesTableMap::buildTableMap();
