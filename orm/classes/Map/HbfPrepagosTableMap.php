<?php

namespace Map;

use \HbfPrepagos;
use \HbfPrepagosQuery;
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
 * This class defines the structure of the 'hbf_prepagos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfPrepagosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfPrepagosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_prepagos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfPrepagos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfPrepagos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the id_prepago field
     */
    const COL_ID_PREPAGO = 'hbf_prepagos.id_prepago';

    /**
     * the column name for the id_cliente field
     */
    const COL_ID_CLIENTE = 'hbf_prepagos.id_cliente';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_prepagos.id_turno';

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'hbf_prepagos.id_sesion';

    /**
     * the column name for the fichas_total field
     */
    const COL_FICHAS_TOTAL = 'hbf_prepagos.fichas_total';

    /**
     * the column name for the fichas_usadas field
     */
    const COL_FICHAS_USADAS = 'hbf_prepagos.fichas_usadas';

    /**
     * the column name for the fichas_gratis field
     */
    const COL_FICHAS_GRATIS = 'hbf_prepagos.fichas_gratis';

    /**
     * the column name for the fichas_restantes field
     */
    const COL_FICHAS_RESTANTES = 'hbf_prepagos.fichas_restantes';

    /**
     * the column name for the id_option_tipo_prepago field
     */
    const COL_ID_OPTION_TIPO_PREPAGO = 'hbf_prepagos.id_option_tipo_prepago';

    /**
     * the column name for the a_cuenta field
     */
    const COL_A_CUENTA = 'hbf_prepagos.a_cuenta';

    /**
     * the column name for the saldo field
     */
    const COL_SALDO = 'hbf_prepagos.saldo';

    /**
     * the column name for the importe field
     */
    const COL_IMPORTE = 'hbf_prepagos.importe';

    /**
     * the column name for the pagado field
     */
    const COL_PAGADO = 'hbf_prepagos.pagado';

    /**
     * the column name for the finalizado field
     */
    const COL_FINALIZADO = 'hbf_prepagos.finalizado';

    /**
     * the column name for the observaciones field
     */
    const COL_OBSERVACIONES = 'hbf_prepagos.observaciones';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_prepagos.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_prepagos.change_count';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_prepagos.id_user_created';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_prepagos.id_user_modified';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_prepagos.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_prepagos.date_created';

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
        self::TYPE_PHPNAME       => array('IdPrepago', 'IdCliente', 'IdTurno', 'IdSesion', 'FichasTotal', 'FichasUsadas', 'FichasGratis', 'FichasRestantes', 'IdOptionTipoPrepago', 'ACuenta', 'Saldo', 'Importe', 'Pagado', 'Finalizado', 'Observaciones', 'Estado', 'ChangeCount', 'IdUserCreated', 'IdUserModified', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idPrepago', 'idCliente', 'idTurno', 'idSesion', 'fichasTotal', 'fichasUsadas', 'fichasGratis', 'fichasRestantes', 'idOptionTipoPrepago', 'aCuenta', 'saldo', 'importe', 'pagado', 'finalizado', 'observaciones', 'estado', 'changeCount', 'idUserCreated', 'idUserModified', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfPrepagosTableMap::COL_ID_PREPAGO, HbfPrepagosTableMap::COL_ID_CLIENTE, HbfPrepagosTableMap::COL_ID_TURNO, HbfPrepagosTableMap::COL_ID_SESION, HbfPrepagosTableMap::COL_FICHAS_TOTAL, HbfPrepagosTableMap::COL_FICHAS_USADAS, HbfPrepagosTableMap::COL_FICHAS_GRATIS, HbfPrepagosTableMap::COL_FICHAS_RESTANTES, HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO, HbfPrepagosTableMap::COL_A_CUENTA, HbfPrepagosTableMap::COL_SALDO, HbfPrepagosTableMap::COL_IMPORTE, HbfPrepagosTableMap::COL_PAGADO, HbfPrepagosTableMap::COL_FINALIZADO, HbfPrepagosTableMap::COL_OBSERVACIONES, HbfPrepagosTableMap::COL_ESTADO, HbfPrepagosTableMap::COL_CHANGE_COUNT, HbfPrepagosTableMap::COL_ID_USER_CREATED, HbfPrepagosTableMap::COL_ID_USER_MODIFIED, HbfPrepagosTableMap::COL_DATE_MODIFIED, HbfPrepagosTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_prepago', 'id_cliente', 'id_turno', 'id_sesion', 'fichas_total', 'fichas_usadas', 'fichas_gratis', 'fichas_restantes', 'id_option_tipo_prepago', 'a_cuenta', 'saldo', 'importe', 'pagado', 'finalizado', 'observaciones', 'estado', 'change_count', 'id_user_created', 'id_user_modified', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdPrepago' => 0, 'IdCliente' => 1, 'IdTurno' => 2, 'IdSesion' => 3, 'FichasTotal' => 4, 'FichasUsadas' => 5, 'FichasGratis' => 6, 'FichasRestantes' => 7, 'IdOptionTipoPrepago' => 8, 'ACuenta' => 9, 'Saldo' => 10, 'Importe' => 11, 'Pagado' => 12, 'Finalizado' => 13, 'Observaciones' => 14, 'Estado' => 15, 'ChangeCount' => 16, 'IdUserCreated' => 17, 'IdUserModified' => 18, 'DateModified' => 19, 'DateCreated' => 20, ),
        self::TYPE_CAMELNAME     => array('idPrepago' => 0, 'idCliente' => 1, 'idTurno' => 2, 'idSesion' => 3, 'fichasTotal' => 4, 'fichasUsadas' => 5, 'fichasGratis' => 6, 'fichasRestantes' => 7, 'idOptionTipoPrepago' => 8, 'aCuenta' => 9, 'saldo' => 10, 'importe' => 11, 'pagado' => 12, 'finalizado' => 13, 'observaciones' => 14, 'estado' => 15, 'changeCount' => 16, 'idUserCreated' => 17, 'idUserModified' => 18, 'dateModified' => 19, 'dateCreated' => 20, ),
        self::TYPE_COLNAME       => array(HbfPrepagosTableMap::COL_ID_PREPAGO => 0, HbfPrepagosTableMap::COL_ID_CLIENTE => 1, HbfPrepagosTableMap::COL_ID_TURNO => 2, HbfPrepagosTableMap::COL_ID_SESION => 3, HbfPrepagosTableMap::COL_FICHAS_TOTAL => 4, HbfPrepagosTableMap::COL_FICHAS_USADAS => 5, HbfPrepagosTableMap::COL_FICHAS_GRATIS => 6, HbfPrepagosTableMap::COL_FICHAS_RESTANTES => 7, HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO => 8, HbfPrepagosTableMap::COL_A_CUENTA => 9, HbfPrepagosTableMap::COL_SALDO => 10, HbfPrepagosTableMap::COL_IMPORTE => 11, HbfPrepagosTableMap::COL_PAGADO => 12, HbfPrepagosTableMap::COL_FINALIZADO => 13, HbfPrepagosTableMap::COL_OBSERVACIONES => 14, HbfPrepagosTableMap::COL_ESTADO => 15, HbfPrepagosTableMap::COL_CHANGE_COUNT => 16, HbfPrepagosTableMap::COL_ID_USER_CREATED => 17, HbfPrepagosTableMap::COL_ID_USER_MODIFIED => 18, HbfPrepagosTableMap::COL_DATE_MODIFIED => 19, HbfPrepagosTableMap::COL_DATE_CREATED => 20, ),
        self::TYPE_FIELDNAME     => array('id_prepago' => 0, 'id_cliente' => 1, 'id_turno' => 2, 'id_sesion' => 3, 'fichas_total' => 4, 'fichas_usadas' => 5, 'fichas_gratis' => 6, 'fichas_restantes' => 7, 'id_option_tipo_prepago' => 8, 'a_cuenta' => 9, 'saldo' => 10, 'importe' => 11, 'pagado' => 12, 'finalizado' => 13, 'observaciones' => 14, 'estado' => 15, 'change_count' => 16, 'id_user_created' => 17, 'id_user_modified' => 18, 'date_modified' => 19, 'date_created' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('hbf_prepagos');
        $this->setPhpName('HbfPrepagos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfPrepagos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_prepago', 'IdPrepago', 'INTEGER', true, null, null);
        $this->addForeignKey('id_cliente', 'IdCliente', 'INTEGER', 'ci_usuarios', 'id_usuario', false, 10, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', false, 10, null);
        $this->addForeignKey('id_sesion', 'IdSesion', 'INTEGER', 'hbf_sesiones', 'id_sesion', true, 10, null);
        $this->addColumn('fichas_total', 'FichasTotal', 'INTEGER', false, null, null);
        $this->addColumn('fichas_usadas', 'FichasUsadas', 'INTEGER', false, null, null);
        $this->addColumn('fichas_gratis', 'FichasGratis', 'INTEGER', false, null, null);
        $this->addColumn('fichas_restantes', 'FichasRestantes', 'INTEGER', false, null, null);
        $this->addForeignKey('id_option_tipo_prepago', 'IdOptionTipoPrepago', 'INTEGER', 'ci_options', 'id_option', false, 10, null);
        $this->addColumn('a_cuenta', 'ACuenta', 'DECIMAL', false, null, null);
        $this->addColumn('saldo', 'Saldo', 'DECIMAL', false, null, null);
        $this->addColumn('importe', 'Importe', 'DECIMAL', false, null, null);
        $this->addColumn('pagado', 'Pagado', 'VARCHAR', false, 50, 'NO');
        $this->addColumn('finalizado', 'Finalizado', 'VARCHAR', false, 50, 'NO');
        $this->addColumn('observaciones', 'Observaciones', 'INTEGER', false, null, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'TIMESTAMP', false, null, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CiUsuariosRelatedByIdCliente', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, null, false);
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
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
  ),
), null, null, null, false);
        $this->addRelation('CiOptions', '\\CiOptions', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_option_tipo_prepago',
    1 => ':id_option',
  ),
), null, null, null, false);
        $this->addRelation('HbfTurnos', '\\HbfTurnos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), null, null, null, false);
        $this->addRelation('HbfComandas', '\\HbfComandas', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_ficha_prepago',
    1 => ':id_prepago',
  ),
), null, null, 'HbfComandass', false);
        $this->addRelation('HbfIngresos', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_prepago',
    1 => ':id_prepago',
  ),
), null, null, 'HbfIngresoss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdPrepago', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfPrepagosTableMap::CLASS_DEFAULT : HbfPrepagosTableMap::OM_CLASS;
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
     * @return array           (HbfPrepagos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfPrepagosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfPrepagosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfPrepagosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfPrepagosTableMap::OM_CLASS;
            /** @var HbfPrepagos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfPrepagosTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfPrepagosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfPrepagosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfPrepagos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfPrepagosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_PREPAGO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_CLIENTE);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_FICHAS_TOTAL);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_FICHAS_USADAS);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_FICHAS_GRATIS);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_FICHAS_RESTANTES);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_OPTION_TIPO_PREPAGO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_A_CUENTA);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_SALDO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_IMPORTE);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_PAGADO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_FINALIZADO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_OBSERVACIONES);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfPrepagosTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_prepago');
            $criteria->addSelectColumn($alias . '.id_cliente');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.fichas_total');
            $criteria->addSelectColumn($alias . '.fichas_usadas');
            $criteria->addSelectColumn($alias . '.fichas_gratis');
            $criteria->addSelectColumn($alias . '.fichas_restantes');
            $criteria->addSelectColumn($alias . '.id_option_tipo_prepago');
            $criteria->addSelectColumn($alias . '.a_cuenta');
            $criteria->addSelectColumn($alias . '.saldo');
            $criteria->addSelectColumn($alias . '.importe');
            $criteria->addSelectColumn($alias . '.pagado');
            $criteria->addSelectColumn($alias . '.finalizado');
            $criteria->addSelectColumn($alias . '.observaciones');
            $criteria->addSelectColumn($alias . '.estado');
            $criteria->addSelectColumn($alias . '.change_count');
            $criteria->addSelectColumn($alias . '.id_user_created');
            $criteria->addSelectColumn($alias . '.id_user_modified');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfPrepagosTableMap::DATABASE_NAME)->getTable(HbfPrepagosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfPrepagosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfPrepagosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfPrepagosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfPrepagos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfPrepagos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfPrepagos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfPrepagosTableMap::DATABASE_NAME);
            $criteria->add(HbfPrepagosTableMap::COL_ID_PREPAGO, (array) $values, Criteria::IN);
        }

        $query = HbfPrepagosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfPrepagosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfPrepagosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_prepagos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfPrepagosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfPrepagos or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfPrepagos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfPrepagosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfPrepagos object
        }

        if ($criteria->containsKey(HbfPrepagosTableMap::COL_ID_PREPAGO) && $criteria->keyContainsValue(HbfPrepagosTableMap::COL_ID_PREPAGO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfPrepagosTableMap::COL_ID_PREPAGO.')');
        }


        // Set the correct dbName
        $query = HbfPrepagosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfPrepagosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfPrepagosTableMap::buildTableMap();
