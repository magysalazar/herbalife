<?php

namespace Map;

use \HbfComandas;
use \HbfComandasQuery;
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
 * This class defines the structure of the 'hbf_comandas' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfComandasTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfComandasTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_comandas';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfComandas';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfComandas';

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
     * the column name for the id_comanda field
     */
    const COL_ID_COMANDA = 'hbf_comandas.id_comanda';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_comandas.id_club';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_comandas.id_turno';

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'hbf_comandas.id_sesion';

    /**
     * the column name for the id_cliente field
     */
    const COL_ID_CLIENTE = 'hbf_comandas.id_cliente';

    /**
     * the column name for the ids_vasos field
     */
    const COL_IDS_VASOS = 'hbf_comandas.ids_vasos';

    /**
     * the column name for the importe field
     */
    const COL_IMPORTE = 'hbf_comandas.importe';

    /**
     * the column name for the a_cuenta field
     */
    const COL_A_CUENTA = 'hbf_comandas.a_cuenta';

    /**
     * the column name for the saldo field
     */
    const COL_SALDO = 'hbf_comandas.saldo';

    /**
     * the column name for the prioridad field
     */
    const COL_PRIORIDAD = 'hbf_comandas.prioridad';

    /**
     * the column name for the hora_entrega field
     */
    const COL_HORA_ENTREGA = 'hbf_comandas.hora_entrega';

    /**
     * the column name for the tipo_consumo field
     */
    const COL_TIPO_CONSUMO = 'hbf_comandas.tipo_consumo';

    /**
     * the column name for the comentarios field
     */
    const COL_COMENTARIOS = 'hbf_comandas.comentarios';

    /**
     * the column name for the id_ficha_prepago field
     */
    const COL_ID_FICHA_PREPAGO = 'hbf_comandas.id_ficha_prepago';

    /**
     * the column name for the pagado field
     */
    const COL_PAGADO = 'hbf_comandas.pagado';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_comandas.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_comandas.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_comandas.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_comandas.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_comandas.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_comandas.date_created';

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
        self::TYPE_PHPNAME       => array('IdComanda', 'IdClub', 'IdTurno', 'IdSesion', 'IdCliente', 'IdsVasos', 'Importe', 'ACuenta', 'Saldo', 'Prioridad', 'HoraEntrega', 'TipoConsumo', 'Comentarios', 'IdFichaPrepago', 'Pagado', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idComanda', 'idClub', 'idTurno', 'idSesion', 'idCliente', 'idsVasos', 'importe', 'aCuenta', 'saldo', 'prioridad', 'horaEntrega', 'tipoConsumo', 'comentarios', 'idFichaPrepago', 'pagado', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfComandasTableMap::COL_ID_COMANDA, HbfComandasTableMap::COL_ID_CLUB, HbfComandasTableMap::COL_ID_TURNO, HbfComandasTableMap::COL_ID_SESION, HbfComandasTableMap::COL_ID_CLIENTE, HbfComandasTableMap::COL_IDS_VASOS, HbfComandasTableMap::COL_IMPORTE, HbfComandasTableMap::COL_A_CUENTA, HbfComandasTableMap::COL_SALDO, HbfComandasTableMap::COL_PRIORIDAD, HbfComandasTableMap::COL_HORA_ENTREGA, HbfComandasTableMap::COL_TIPO_CONSUMO, HbfComandasTableMap::COL_COMENTARIOS, HbfComandasTableMap::COL_ID_FICHA_PREPAGO, HbfComandasTableMap::COL_PAGADO, HbfComandasTableMap::COL_ESTADO, HbfComandasTableMap::COL_CHANGE_COUNT, HbfComandasTableMap::COL_ID_USER_MODIFIED, HbfComandasTableMap::COL_ID_USER_CREATED, HbfComandasTableMap::COL_DATE_MODIFIED, HbfComandasTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_comanda', 'id_club', 'id_turno', 'id_sesion', 'id_cliente', 'ids_vasos', 'importe', 'a_cuenta', 'saldo', 'prioridad', 'hora_entrega', 'tipo_consumo', 'comentarios', 'id_ficha_prepago', 'pagado', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdComanda' => 0, 'IdClub' => 1, 'IdTurno' => 2, 'IdSesion' => 3, 'IdCliente' => 4, 'IdsVasos' => 5, 'Importe' => 6, 'ACuenta' => 7, 'Saldo' => 8, 'Prioridad' => 9, 'HoraEntrega' => 10, 'TipoConsumo' => 11, 'Comentarios' => 12, 'IdFichaPrepago' => 13, 'Pagado' => 14, 'Estado' => 15, 'ChangeCount' => 16, 'IdUserModified' => 17, 'IdUserCreated' => 18, 'DateModified' => 19, 'DateCreated' => 20, ),
        self::TYPE_CAMELNAME     => array('idComanda' => 0, 'idClub' => 1, 'idTurno' => 2, 'idSesion' => 3, 'idCliente' => 4, 'idsVasos' => 5, 'importe' => 6, 'aCuenta' => 7, 'saldo' => 8, 'prioridad' => 9, 'horaEntrega' => 10, 'tipoConsumo' => 11, 'comentarios' => 12, 'idFichaPrepago' => 13, 'pagado' => 14, 'estado' => 15, 'changeCount' => 16, 'idUserModified' => 17, 'idUserCreated' => 18, 'dateModified' => 19, 'dateCreated' => 20, ),
        self::TYPE_COLNAME       => array(HbfComandasTableMap::COL_ID_COMANDA => 0, HbfComandasTableMap::COL_ID_CLUB => 1, HbfComandasTableMap::COL_ID_TURNO => 2, HbfComandasTableMap::COL_ID_SESION => 3, HbfComandasTableMap::COL_ID_CLIENTE => 4, HbfComandasTableMap::COL_IDS_VASOS => 5, HbfComandasTableMap::COL_IMPORTE => 6, HbfComandasTableMap::COL_A_CUENTA => 7, HbfComandasTableMap::COL_SALDO => 8, HbfComandasTableMap::COL_PRIORIDAD => 9, HbfComandasTableMap::COL_HORA_ENTREGA => 10, HbfComandasTableMap::COL_TIPO_CONSUMO => 11, HbfComandasTableMap::COL_COMENTARIOS => 12, HbfComandasTableMap::COL_ID_FICHA_PREPAGO => 13, HbfComandasTableMap::COL_PAGADO => 14, HbfComandasTableMap::COL_ESTADO => 15, HbfComandasTableMap::COL_CHANGE_COUNT => 16, HbfComandasTableMap::COL_ID_USER_MODIFIED => 17, HbfComandasTableMap::COL_ID_USER_CREATED => 18, HbfComandasTableMap::COL_DATE_MODIFIED => 19, HbfComandasTableMap::COL_DATE_CREATED => 20, ),
        self::TYPE_FIELDNAME     => array('id_comanda' => 0, 'id_club' => 1, 'id_turno' => 2, 'id_sesion' => 3, 'id_cliente' => 4, 'ids_vasos' => 5, 'importe' => 6, 'a_cuenta' => 7, 'saldo' => 8, 'prioridad' => 9, 'hora_entrega' => 10, 'tipo_consumo' => 11, 'comentarios' => 12, 'id_ficha_prepago' => 13, 'pagado' => 14, 'estado' => 15, 'change_count' => 16, 'id_user_modified' => 17, 'id_user_created' => 18, 'date_modified' => 19, 'date_created' => 20, ),
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
        $this->setName('hbf_comandas');
        $this->setPhpName('HbfComandas');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfComandas');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_comanda', 'IdComanda', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', true, 10, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', true, 10, null);
        $this->addForeignKey('id_sesion', 'IdSesion', 'INTEGER', 'hbf_sesiones', 'id_sesion', true, null, null);
        $this->addForeignKey('id_cliente', 'IdCliente', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
        $this->addColumn('ids_vasos', 'IdsVasos', 'VARCHAR', false, 250, null);
        $this->addColumn('importe', 'Importe', 'DECIMAL', false, null, null);
        $this->addColumn('a_cuenta', 'ACuenta', 'DECIMAL', false, null, null);
        $this->addColumn('saldo', 'Saldo', 'DECIMAL', false, null, null);
        $this->addColumn('prioridad', 'Prioridad', 'VARCHAR', false, 500, null);
        $this->addColumn('hora_entrega', 'HoraEntrega', 'TIME', false, null, null);
        $this->addColumn('tipo_consumo', 'TipoConsumo', 'VARCHAR', false, 500, null);
        $this->addColumn('comentarios', 'Comentarios', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('id_ficha_prepago', 'IdFichaPrepago', 'INTEGER', 'hbf_prepagos', 'id_prepago', false, 10, null);
        $this->addColumn('pagado', 'Pagado', 'VARCHAR', false, 10, null);
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
        $this->addRelation('HbfClubs', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('HbfTurnos', '\\HbfTurnos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_turno',
    1 => ':id_turno',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_sesion',
    1 => ':id_sesion',
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
        $this->addRelation('CiUsuariosRelatedByIdCliente', '\\CiUsuarios', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_cliente',
    1 => ':id_usuario',
  ),
), null, null, null, false);
        $this->addRelation('HbfPrepagos', '\\HbfPrepagos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_ficha_prepago',
    1 => ':id_prepago',
  ),
), null, null, null, false);
        $this->addRelation('HbfDetallesPedidos', '\\HbfDetallesPedidos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, 'HbfDetallesPedidoss', false);
        $this->addRelation('HbfIngresos', '\\HbfIngresos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, 'HbfIngresoss', false);
        $this->addRelation('HbfVasos', '\\HbfVasos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_comanda',
    1 => ':id_comanda',
  ),
), null, null, 'HbfVasoss', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdComanda', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfComandasTableMap::CLASS_DEFAULT : HbfComandasTableMap::OM_CLASS;
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
     * @return array           (HbfComandas object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfComandasTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfComandasTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfComandasTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfComandasTableMap::OM_CLASS;
            /** @var HbfComandas $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfComandasTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfComandasTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfComandasTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfComandas $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfComandasTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_COMANDA);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_CLIENTE);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_IDS_VASOS);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_IMPORTE);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_A_CUENTA);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_SALDO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_PRIORIDAD);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_HORA_ENTREGA);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_TIPO_CONSUMO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_COMENTARIOS);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_FICHA_PREPAGO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_PAGADO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfComandasTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_comanda');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.id_cliente');
            $criteria->addSelectColumn($alias . '.ids_vasos');
            $criteria->addSelectColumn($alias . '.importe');
            $criteria->addSelectColumn($alias . '.a_cuenta');
            $criteria->addSelectColumn($alias . '.saldo');
            $criteria->addSelectColumn($alias . '.prioridad');
            $criteria->addSelectColumn($alias . '.hora_entrega');
            $criteria->addSelectColumn($alias . '.tipo_consumo');
            $criteria->addSelectColumn($alias . '.comentarios');
            $criteria->addSelectColumn($alias . '.id_ficha_prepago');
            $criteria->addSelectColumn($alias . '.pagado');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfComandasTableMap::DATABASE_NAME)->getTable(HbfComandasTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfComandasTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfComandasTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfComandasTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfComandas or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfComandas object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfComandas) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfComandasTableMap::DATABASE_NAME);
            $criteria->add(HbfComandasTableMap::COL_ID_COMANDA, (array) $values, Criteria::IN);
        }

        $query = HbfComandasQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfComandasTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfComandasTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_comandas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfComandasQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfComandas or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfComandas object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfComandasTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfComandas object
        }

        if ($criteria->containsKey(HbfComandasTableMap::COL_ID_COMANDA) && $criteria->keyContainsValue(HbfComandasTableMap::COL_ID_COMANDA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfComandasTableMap::COL_ID_COMANDA.')');
        }


        // Set the correct dbName
        $query = HbfComandasQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfComandasTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfComandasTableMap::buildTableMap();
