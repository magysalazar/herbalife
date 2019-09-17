<?php

namespace Map;

use \CiOptions;
use \CiOptionsQuery;
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
 * This class defines the structure of the 'ci_options' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CiOptionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CiOptionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ci_options';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CiOptions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CiOptions';

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
     * the column name for the id_option field
     */
    const COL_ID_OPTION = 'ci_options.id_option';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'ci_options.nombre';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'ci_options.descripcion';

    /**
     * the column name for the id_setting field
     */
    const COL_ID_SETTING = 'ci_options.id_setting';

    /**
     * the column name for the nivel field
     */
    const COL_NIVEL = 'ci_options.nivel';

    /**
     * the column name for the precio field
     */
    const COL_PRECIO = 'ci_options.precio';

    /**
     * the column name for the num_fichas field
     */
    const COL_NUM_FICHAS = 'ci_options.num_fichas';

    /**
     * the column name for the id_modulo field
     */
    const COL_ID_MODULO = 'ci_options.id_modulo';

    /**
     * the column name for the edit_tag field
     */
    const COL_EDIT_TAG = 'ci_options.edit_tag';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'ci_options.estado';

    /**
     * the column name for the change_count field
     */
    const COL_CHANGE_COUNT = 'ci_options.change_count';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'ci_options.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'ci_options.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'ci_options.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'ci_options.date_created';

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
        self::TYPE_PHPNAME       => array('IdOption', 'Nombre', 'Descripcion', 'IdSetting', 'Nivel', 'Precio', 'NumFichas', 'IdModulo', 'EditTag', 'Estado', 'ChangeCount', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idOption', 'nombre', 'descripcion', 'idSetting', 'nivel', 'precio', 'numFichas', 'idModulo', 'editTag', 'estado', 'changeCount', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(CiOptionsTableMap::COL_ID_OPTION, CiOptionsTableMap::COL_NOMBRE, CiOptionsTableMap::COL_DESCRIPCION, CiOptionsTableMap::COL_ID_SETTING, CiOptionsTableMap::COL_NIVEL, CiOptionsTableMap::COL_PRECIO, CiOptionsTableMap::COL_NUM_FICHAS, CiOptionsTableMap::COL_ID_MODULO, CiOptionsTableMap::COL_EDIT_TAG, CiOptionsTableMap::COL_ESTADO, CiOptionsTableMap::COL_CHANGE_COUNT, CiOptionsTableMap::COL_ID_USER_MODIFIED, CiOptionsTableMap::COL_ID_USER_CREATED, CiOptionsTableMap::COL_DATE_MODIFIED, CiOptionsTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_option', 'nombre', 'descripcion', 'id_setting', 'nivel', 'precio', 'num_fichas', 'id_modulo', 'edit_tag', 'estado', 'change_count', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdOption' => 0, 'Nombre' => 1, 'Descripcion' => 2, 'IdSetting' => 3, 'Nivel' => 4, 'Precio' => 5, 'NumFichas' => 6, 'IdModulo' => 7, 'EditTag' => 8, 'Estado' => 9, 'ChangeCount' => 10, 'IdUserModified' => 11, 'IdUserCreated' => 12, 'DateModified' => 13, 'DateCreated' => 14, ),
        self::TYPE_CAMELNAME     => array('idOption' => 0, 'nombre' => 1, 'descripcion' => 2, 'idSetting' => 3, 'nivel' => 4, 'precio' => 5, 'numFichas' => 6, 'idModulo' => 7, 'editTag' => 8, 'estado' => 9, 'changeCount' => 10, 'idUserModified' => 11, 'idUserCreated' => 12, 'dateModified' => 13, 'dateCreated' => 14, ),
        self::TYPE_COLNAME       => array(CiOptionsTableMap::COL_ID_OPTION => 0, CiOptionsTableMap::COL_NOMBRE => 1, CiOptionsTableMap::COL_DESCRIPCION => 2, CiOptionsTableMap::COL_ID_SETTING => 3, CiOptionsTableMap::COL_NIVEL => 4, CiOptionsTableMap::COL_PRECIO => 5, CiOptionsTableMap::COL_NUM_FICHAS => 6, CiOptionsTableMap::COL_ID_MODULO => 7, CiOptionsTableMap::COL_EDIT_TAG => 8, CiOptionsTableMap::COL_ESTADO => 9, CiOptionsTableMap::COL_CHANGE_COUNT => 10, CiOptionsTableMap::COL_ID_USER_MODIFIED => 11, CiOptionsTableMap::COL_ID_USER_CREATED => 12, CiOptionsTableMap::COL_DATE_MODIFIED => 13, CiOptionsTableMap::COL_DATE_CREATED => 14, ),
        self::TYPE_FIELDNAME     => array('id_option' => 0, 'nombre' => 1, 'descripcion' => 2, 'id_setting' => 3, 'nivel' => 4, 'precio' => 5, 'num_fichas' => 6, 'id_modulo' => 7, 'edit_tag' => 8, 'estado' => 9, 'change_count' => 10, 'id_user_modified' => 11, 'id_user_created' => 12, 'date_modified' => 13, 'date_created' => 14, ),
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
        $this->setName('ci_options');
        $this->setPhpName('CiOptions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CiOptions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_option', 'IdOption', 'INTEGER', true, 10, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', false, 250, null);
        $this->addColumn('descripcion', 'Descripcion', 'VARCHAR', false, 250, null);
        $this->addForeignKey('id_setting', 'IdSetting', 'INTEGER', 'ci_settings', 'id_setting', false, 10, null);
        $this->addColumn('nivel', 'Nivel', 'VARCHAR', false, 200, null);
        $this->addColumn('precio', 'Precio', 'DECIMAL', false, null, null);
        $this->addColumn('num_fichas', 'NumFichas', 'INTEGER', false, null, null);
        $this->addColumn('id_modulo', 'IdModulo', 'INTEGER', false, null, null);
        $this->addColumn('edit_tag', 'EditTag', 'VARCHAR', false, 250, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', false, 15, 'ENABLED');
        $this->addColumn('change_count', 'ChangeCount', 'INTEGER', false, null, 0);
        $this->addForeignKey('id_user_modified', 'IdUserModified', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
        $this->addForeignKey('id_user_created', 'IdUserCreated', 'INTEGER', 'ci_usuarios', 'id_usuario', true, 10, null);
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
        $this->addRelation('CiSettings', '\\CiSettings', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_setting',
    1 => ':id_setting',
  ),
), null, null, null, false);
        $this->addRelation('CiModulosRelatedByIdOpcionModulo', '\\CiModulos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_modulo',
    1 => ':id_option',
  ),
), null, null, 'CiModulossRelatedByIdOpcionModulo', false);
        $this->addRelation('CiModulosRelatedByIdOpcionRoles', '\\CiModulos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_roles',
    1 => ':id_option',
  ),
), null, null, 'CiModulossRelatedByIdOpcionRoles', false);
        $this->addRelation('CiUsuariosRelatedByIdOptionTipoAsociado', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_asociado',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOptionTipoAsociado', false);
        $this->addRelation('CiUsuariosRelatedByIdOptionNivelAsociado', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_nivel_asociado',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOptionNivelAsociado', false);
        $this->addRelation('CiUsuariosRelatedByIdOpcionRole', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_role',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOpcionRole', false);
        $this->addRelation('CiUsuariosRelatedByIdTipoUsuario', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_tipo_usuario',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdTipoUsuario', false);
        $this->addRelation('HbfPrepagos', '\\HbfPrepagos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_prepago',
    1 => ':id_option',
  ),
), null, null, 'HbfPrepagoss', false);
        $this->addRelation('HbfProductosRelatedByIdOptionCategoriaProducto', '\\HbfProductos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_categoria_producto',
    1 => ':id_option',
  ),
), null, null, 'HbfProductossRelatedByIdOptionCategoriaProducto', false);
        $this->addRelation('HbfProductosRelatedByIdOptionTipoProducto', '\\HbfProductos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_producto',
    1 => ':id_option',
  ),
), null, null, 'HbfProductossRelatedByIdOptionTipoProducto', false);
        $this->addRelation('HbfSesiones', '\\HbfSesiones', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_sesion',
    1 => ':id_option',
  ),
), null, null, 'HbfSesioness', false);
        $this->addRelation('HbfTurnos', '\\HbfTurnos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_turnos',
    1 => ':id_option',
  ),
), null, null, 'HbfTurnoss', false);
        $this->addRelation('HbfVasos', '\\HbfVasos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_opcion_tipo_producto',
    1 => ':id_option',
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdOption', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CiOptionsTableMap::CLASS_DEFAULT : CiOptionsTableMap::OM_CLASS;
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
     * @return array           (CiOptions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CiOptionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CiOptionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CiOptionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CiOptionsTableMap::OM_CLASS;
            /** @var CiOptions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CiOptionsTableMap::addInstanceToPool($obj, $key);
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
            $key = CiOptionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CiOptionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CiOptions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CiOptionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ID_OPTION);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ID_SETTING);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_NIVEL);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_PRECIO);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_NUM_FICHAS);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ID_MODULO);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_EDIT_TAG);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ESTADO);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_CHANGE_COUNT);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(CiOptionsTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_option');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.id_setting');
            $criteria->addSelectColumn($alias . '.nivel');
            $criteria->addSelectColumn($alias . '.precio');
            $criteria->addSelectColumn($alias . '.num_fichas');
            $criteria->addSelectColumn($alias . '.id_modulo');
            $criteria->addSelectColumn($alias . '.edit_tag');
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
        return Propel::getServiceContainer()->getDatabaseMap(CiOptionsTableMap::DATABASE_NAME)->getTable(CiOptionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CiOptionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CiOptionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CiOptionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CiOptions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CiOptions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CiOptions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CiOptionsTableMap::DATABASE_NAME);
            $criteria->add(CiOptionsTableMap::COL_ID_OPTION, (array) $values, Criteria::IN);
        }

        $query = CiOptionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CiOptionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CiOptionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ci_options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CiOptionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CiOptions or Criteria object.
     *
     * @param mixed               $criteria Criteria or CiOptions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiOptionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CiOptions object
        }

        if ($criteria->containsKey(CiOptionsTableMap::COL_ID_OPTION) && $criteria->keyContainsValue(CiOptionsTableMap::COL_ID_OPTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CiOptionsTableMap::COL_ID_OPTION.')');
        }


        // Set the correct dbName
        $query = CiOptionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CiOptionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CiOptionsTableMap::buildTableMap();
