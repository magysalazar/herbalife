<?php

namespace Map;

use \HbfVentas;
use \HbfVentasQuery;
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
 * This class defines the structure of the 'hbf_ventas' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfVentasTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfVentasTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_ventas';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfVentas';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfVentas';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the id_venta field
     */
    const COL_ID_VENTA = 'hbf_ventas.id_venta';

    /**
     * the column name for the id_club field
     */
    const COL_ID_CLUB = 'hbf_ventas.id_club';

    /**
     * the column name for the id_turno field
     */
    const COL_ID_TURNO = 'hbf_ventas.id_turno';

    /**
     * the column name for the id_sesion field
     */
    const COL_ID_SESION = 'hbf_ventas.id_sesion';

    /**
     * the column name for the id_cliente field
     */
    const COL_ID_CLIENTE = 'hbf_ventas.id_cliente';

    /**
     * the column name for the fecha_venta field
     */
    const COL_FECHA_VENTA = 'hbf_ventas.fecha_venta';

    /**
     * the column name for the id_producto field
     */
    const COL_ID_PRODUCTO = 'hbf_ventas.id_producto';

    /**
     * the column name for the precio field
     */
    const COL_PRECIO = 'hbf_ventas.precio';

    /**
     * the column name for the observaciones field
     */
    const COL_OBSERVACIONES = 'hbf_ventas.observaciones';

    /**
     * the column name for the a_cuenta field
     */
    const COL_A_CUENTA = 'hbf_ventas.a_cuenta';

    /**
     * the column name for the saldo field
     */
    const COL_SALDO = 'hbf_ventas.saldo';

    /**
     * the column name for the entregado field
     */
    const COL_ENTREGADO = 'hbf_ventas.entregado';

    /**
     * the column name for the pagado field
     */
    const COL_PAGADO = 'hbf_ventas.pagado';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_ventas.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'hbf_ventas.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_ventas.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_ventas.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_ventas.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_ventas.date_created';

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
        self::TYPE_PHPNAME       => array('IdVenta', 'IdClub', 'IdTurno', 'IdSesion', 'IdCliente', 'FechaVenta', 'IdProducto', 'Precio', 'Observaciones', 'ACuenta', 'Saldo', 'Entregado', 'Pagado', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idVenta', 'idClub', 'idTurno', 'idSesion', 'idCliente', 'fechaVenta', 'idProducto', 'precio', 'observaciones', 'aCuenta', 'saldo', 'entregado', 'pagado', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfVentasTableMap::COL_ID_VENTA, HbfVentasTableMap::COL_ID_CLUB, HbfVentasTableMap::COL_ID_TURNO, HbfVentasTableMap::COL_ID_SESION, HbfVentasTableMap::COL_ID_CLIENTE, HbfVentasTableMap::COL_FECHA_VENTA, HbfVentasTableMap::COL_ID_PRODUCTO, HbfVentasTableMap::COL_PRECIO, HbfVentasTableMap::COL_OBSERVACIONES, HbfVentasTableMap::COL_A_CUENTA, HbfVentasTableMap::COL_SALDO, HbfVentasTableMap::COL_ENTREGADO, HbfVentasTableMap::COL_PAGADO, HbfVentasTableMap::COL_ESTADO, HbfVentasTableMap::COL_CHANGE_COUNT, HbfVentasTableMap::COL_ID_USER_MODIFIED, HbfVentasTableMap::COL_ID_USER_CREATED, HbfVentasTableMap::COL_DATE_MODIFIED, HbfVentasTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_venta', 'id_club', 'id_turno', 'id_sesion', 'id_cliente', 'fecha_venta', 'id_producto', 'precio', 'observaciones', 'a_cuenta', 'saldo', 'entregado', 'pagado', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdVenta' => 0, 'IdClub' => 1, 'IdTurno' => 2, 'IdSesion' => 3, 'IdCliente' => 4, 'FechaVenta' => 5, 'IdProducto' => 6, 'Precio' => 7, 'Observaciones' => 8, 'ACuenta' => 9, 'Saldo' => 10, 'Entregado' => 11, 'Pagado' => 12, 'Estado' => 13, 'ChangeCount' => 14, 'IdUserModified' => 15, 'IdUserCreated' => 16, 'DateModified' => 17, 'DateCreated' => 18, ),
        self::TYPE_CAMELNAME     => array('idVenta' => 0, 'idClub' => 1, 'idTurno' => 2, 'idSesion' => 3, 'idCliente' => 4, 'fechaVenta' => 5, 'idProducto' => 6, 'precio' => 7, 'observaciones' => 8, 'aCuenta' => 9, 'saldo' => 10, 'entregado' => 11, 'pagado' => 12, 'estado' => 13, 'changeCount' => 14, 'idUserModified' => 15, 'idUserCreated' => 16, 'dateModified' => 17, 'dateCreated' => 18, ),
        self::TYPE_COLNAME       => array(HbfVentasTableMap::COL_ID_VENTA => 0, HbfVentasTableMap::COL_ID_CLUB => 1, HbfVentasTableMap::COL_ID_TURNO => 2, HbfVentasTableMap::COL_ID_SESION => 3, HbfVentasTableMap::COL_ID_CLIENTE => 4, HbfVentasTableMap::COL_FECHA_VENTA => 5, HbfVentasTableMap::COL_ID_PRODUCTO => 6, HbfVentasTableMap::COL_PRECIO => 7, HbfVentasTableMap::COL_OBSERVACIONES => 8, HbfVentasTableMap::COL_A_CUENTA => 9, HbfVentasTableMap::COL_SALDO => 10, HbfVentasTableMap::COL_ENTREGADO => 11, HbfVentasTableMap::COL_PAGADO => 12, HbfVentasTableMap::COL_ESTADO => 13, HbfVentasTableMap::COL_CHANGE_COUNT => 14, HbfVentasTableMap::COL_ID_USER_MODIFIED => 15, HbfVentasTableMap::COL_ID_USER_CREATED => 16, HbfVentasTableMap::COL_DATE_MODIFIED => 17, HbfVentasTableMap::COL_DATE_CREATED => 18, ),
        self::TYPE_FIELDNAME     => array('id_venta' => 0, 'id_club' => 1, 'id_turno' => 2, 'id_sesion' => 3, 'id_cliente' => 4, 'fecha_venta' => 5, 'id_producto' => 6, 'precio' => 7, 'observaciones' => 8, 'a_cuenta' => 9, 'saldo' => 10, 'entregado' => 11, 'pagado' => 12, 'estado' => 13, 'change_count' => 14, 'id_user_modified' => 15, 'id_user_created' => 16, 'date_modified' => 17, 'date_created' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('hbf_ventas');
        $this->setPhpName('HbfVentas');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfVentas');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_venta', 'IdVenta', 'INTEGER', true, 10, null);
        $this->addForeignKey('id_club', 'IdClub', 'INTEGER', 'hbf_clubs', 'id_club', false, 10, null);
        $this->addForeignKey('id_turno', 'IdTurno', 'INTEGER', 'hbf_turnos', 'id_turno', false, 10, null);
        $this->addForeignKey('id_sesion', 'IdSesion', 'INTEGER', 'hbf_sesiones', 'id_sesion', false, 10, null);
        $this->addForeignKey('id_cliente', 'IdCliente', 'INTEGER', 'ci_usuarios', 'id_usuario', false, 10, null);
        $this->addColumn('fecha_venta', 'FechaVenta', 'DATE', false, null, null);
        $this->addForeignKey('id_producto', 'IdProducto', 'INTEGER', 'hbf_productos', 'id_producto', false, 10, null);
        $this->addColumn('precio', 'Precio', 'DECIMAL', false, null, null);
        $this->addColumn('observaciones', 'Observaciones', 'VARCHAR', false, 600, null);
        $this->addColumn('a_cuenta', 'ACuenta', 'DECIMAL', false, null, null);
        $this->addColumn('saldo', 'Saldo', 'DECIMAL', false, null, null);
        $this->addColumn('entregado', 'Entregado', 'VARCHAR', false, 10, null);
        $this->addColumn('pagado', 'Pagado', 'VARCHAR', false, 10, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', true, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, null, null);
        $this->addColumn('date_modified', 'DateModified', 'INTEGER', true, null, null);
        $this->addColumn('date_created', 'DateCreated', 'INTEGER', true, null, null);
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
        $this->addRelation('HbfClubs', '\\HbfClubs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_club',
    1 => ':id_club',
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
        $this->addRelation('HbfProductos', '\\HbfProductos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_producto',
    1 => ':id_producto',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdVenta', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? HbfVentasTableMap::CLASS_DEFAULT : HbfVentasTableMap::OM_CLASS;
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
     * @return array           (HbfVentas object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfVentasTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfVentasTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfVentasTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfVentasTableMap::OM_CLASS;
            /** @var HbfVentas $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfVentasTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfVentasTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfVentasTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfVentas $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfVentasTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_VENTA);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_CLUB);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_TURNO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_SESION);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_CLIENTE);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_FECHA_VENTA);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_PRODUCTO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_PRECIO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_OBSERVACIONES);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_A_CUENTA);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_SALDO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ENTREGADO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_PAGADO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfVentasTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_venta');
            $criteria->addSelectColumn($alias . '.id_club');
            $criteria->addSelectColumn($alias . '.id_turno');
            $criteria->addSelectColumn($alias . '.id_sesion');
            $criteria->addSelectColumn($alias . '.id_cliente');
            $criteria->addSelectColumn($alias . '.fecha_venta');
            $criteria->addSelectColumn($alias . '.id_producto');
            $criteria->addSelectColumn($alias . '.precio');
            $criteria->addSelectColumn($alias . '.observaciones');
            $criteria->addSelectColumn($alias . '.a_cuenta');
            $criteria->addSelectColumn($alias . '.saldo');
            $criteria->addSelectColumn($alias . '.entregado');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfVentasTableMap::DATABASE_NAME)->getTable(HbfVentasTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfVentasTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfVentasTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfVentasTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfVentas or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfVentas object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfVentas) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfVentasTableMap::DATABASE_NAME);
            $criteria->add(HbfVentasTableMap::COL_ID_VENTA, (array) $values, Criteria::IN);
        }

        $query = HbfVentasQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfVentasTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfVentasTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_ventas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfVentasQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfVentas or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfVentas object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfVentasTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfVentas object
        }

        if ($criteria->containsKey(HbfVentasTableMap::COL_ID_VENTA) && $criteria->keyContainsValue(HbfVentasTableMap::COL_ID_VENTA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfVentasTableMap::COL_ID_VENTA.')');
        }


        // Set the correct dbName
        $query = HbfVentasQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfVentasTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfVentasTableMap::buildTableMap();
