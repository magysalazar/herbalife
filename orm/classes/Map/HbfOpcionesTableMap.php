<?php

namespace Map;

use \HbfOpciones;
use \HbfOpcionesQuery;
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
 * This class defines the structure of the 'hbf_opciones' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class HbfOpcionesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.HbfOpcionesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'herbalife';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'hbf_opciones';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HbfOpciones';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HbfOpciones';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id_option field
     */
    const COL_ID_OPTION = 'hbf_opciones.id_option';

    /**
     * the column name for the tabla field
     */
    const COL_TABLA = 'hbf_opciones.tabla';

    /**
     * the column name for the tipo field
     */
    const COL_TIPO = 'hbf_opciones.tipo';

    /**
     * the column name for the nombre field
     */
    const COL_NOMBRE = 'hbf_opciones.nombre';

    /**
     * the column name for the descripcion field
     */
    const COL_DESCRIPCION = 'hbf_opciones.descripcion';

    /**
     * the column name for the precio field
     */
    const COL_PRECIO = 'hbf_opciones.precio';

    /**
     * the column name for the num_fichas field
     */
    const COL_NUM_FICHAS = 'hbf_opciones.num_fichas';

    /**
     * the column name for the estado field
     */
    const COL_ESTADO = 'hbf_opciones.estado';

    /**
     * the column name for the id_user_modified field
     */
    const COL_ID_USER_MODIFIED = 'hbf_opciones.id_user_modified';

    /**
     * the column name for the id_user_created field
     */
    const COL_ID_USER_CREATED = 'hbf_opciones.id_user_created';

    /**
     * the column name for the date_modified field
     */
    const COL_DATE_MODIFIED = 'hbf_opciones.date_modified';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'hbf_opciones.date_created';

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
        self::TYPE_PHPNAME       => array('IdOption', 'Tabla', 'Tipo', 'Nombre', 'Descripcion', 'Precio', 'NumFichas', 'Estado', 'IdUserModified', 'IdUserCreated', 'DateModified', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('idOption', 'tabla', 'tipo', 'nombre', 'descripcion', 'precio', 'numFichas', 'estado', 'idUserModified', 'idUserCreated', 'dateModified', 'dateCreated', ),
        self::TYPE_COLNAME       => array(HbfOpcionesTableMap::COL_ID_OPTION, HbfOpcionesTableMap::COL_TABLA, HbfOpcionesTableMap::COL_TIPO, HbfOpcionesTableMap::COL_NOMBRE, HbfOpcionesTableMap::COL_DESCRIPCION, HbfOpcionesTableMap::COL_PRECIO, HbfOpcionesTableMap::COL_NUM_FICHAS, HbfOpcionesTableMap::COL_ESTADO, HbfOpcionesTableMap::COL_ID_USER_MODIFIED, HbfOpcionesTableMap::COL_ID_USER_CREATED, HbfOpcionesTableMap::COL_DATE_MODIFIED, HbfOpcionesTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id_option', 'tabla', 'tipo', 'nombre', 'descripcion', 'precio', 'num_fichas', 'estado', 'id_user_modified', 'id_user_created', 'date_modified', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdOption' => 0, 'Tabla' => 1, 'Tipo' => 2, 'Nombre' => 3, 'Descripcion' => 4, 'Precio' => 5, 'NumFichas' => 6, 'Estado' => 7, 'IdUserModified' => 8, 'IdUserCreated' => 9, 'DateModified' => 10, 'DateCreated' => 11, ),
        self::TYPE_CAMELNAME     => array('idOption' => 0, 'tabla' => 1, 'tipo' => 2, 'nombre' => 3, 'descripcion' => 4, 'precio' => 5, 'numFichas' => 6, 'estado' => 7, 'idUserModified' => 8, 'idUserCreated' => 9, 'dateModified' => 10, 'dateCreated' => 11, ),
        self::TYPE_COLNAME       => array(HbfOpcionesTableMap::COL_ID_OPTION => 0, HbfOpcionesTableMap::COL_TABLA => 1, HbfOpcionesTableMap::COL_TIPO => 2, HbfOpcionesTableMap::COL_NOMBRE => 3, HbfOpcionesTableMap::COL_DESCRIPCION => 4, HbfOpcionesTableMap::COL_PRECIO => 5, HbfOpcionesTableMap::COL_NUM_FICHAS => 6, HbfOpcionesTableMap::COL_ESTADO => 7, HbfOpcionesTableMap::COL_ID_USER_MODIFIED => 8, HbfOpcionesTableMap::COL_ID_USER_CREATED => 9, HbfOpcionesTableMap::COL_DATE_MODIFIED => 10, HbfOpcionesTableMap::COL_DATE_CREATED => 11, ),
        self::TYPE_FIELDNAME     => array('id_option' => 0, 'tabla' => 1, 'tipo' => 2, 'nombre' => 3, 'descripcion' => 4, 'precio' => 5, 'num_fichas' => 6, 'estado' => 7, 'id_user_modified' => 8, 'id_user_created' => 9, 'date_modified' => 10, 'date_created' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('hbf_opciones');
        $this->setPhpName('HbfOpciones');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\HbfOpciones');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_option', 'IdOption', 'INTEGER', true, 10, null);
        $this->addColumn('tabla', 'Tabla', 'VARCHAR', false, 500, null);
        $this->addColumn('tipo', 'Tipo', 'VARCHAR', false, 250, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', false, 250, null);
        $this->addColumn('descripcion', 'Descripcion', 'VARCHAR', false, 500, null);
        $this->addColumn('precio', 'Precio', 'DECIMAL', false, null, null);
        $this->addColumn('num_fichas', 'NumFichas', 'INTEGER', false, null, null);
        $this->addColumn('estado', 'Estado', 'VARCHAR', false, 15, 'ENABLED');
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
        $this->addRelation('CiUsuariosRelatedByIdOptionTipoAsociado', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_asociado',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOptionTipoAsociado', false);
        $this->addRelation('CiUsuariosRelatedByIdOptionTipoRole', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_role',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOptionTipoRole', false);
        $this->addRelation('CiUsuariosRelatedByIdOptionNivelAsociado', '\\CiUsuarios', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_nivel_asociado',
    1 => ':id_option',
  ),
), null, null, 'CiUsuariossRelatedByIdOptionNivelAsociado', false);
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
        $this->addRelation('HbfVasos', '\\HbfVasos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':id_option_tipo_producto',
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
        return $withPrefix ? HbfOpcionesTableMap::CLASS_DEFAULT : HbfOpcionesTableMap::OM_CLASS;
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
     * @return array           (HbfOpciones object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = HbfOpcionesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = HbfOpcionesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + HbfOpcionesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = HbfOpcionesTableMap::OM_CLASS;
            /** @var HbfOpciones $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            HbfOpcionesTableMap::addInstanceToPool($obj, $key);
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
            $key = HbfOpcionesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = HbfOpcionesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var HbfOpciones $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                HbfOpcionesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_ID_OPTION);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_TABLA);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_TIPO);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_DESCRIPCION);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_PRECIO);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_NUM_FICHAS);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_ESTADO);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_ID_USER_MODIFIED);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_ID_USER_CREATED);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_DATE_MODIFIED);
            $criteria->addSelectColumn(HbfOpcionesTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id_option');
            $criteria->addSelectColumn($alias . '.tabla');
            $criteria->addSelectColumn($alias . '.tipo');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.descripcion');
            $criteria->addSelectColumn($alias . '.precio');
            $criteria->addSelectColumn($alias . '.num_fichas');
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
        return Propel::getServiceContainer()->getDatabaseMap(HbfOpcionesTableMap::DATABASE_NAME)->getTable(HbfOpcionesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(HbfOpcionesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(HbfOpcionesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new HbfOpcionesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a HbfOpciones or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or HbfOpciones object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HbfOpciones) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(HbfOpcionesTableMap::DATABASE_NAME);
            $criteria->add(HbfOpcionesTableMap::COL_ID_OPTION, (array) $values, Criteria::IN);
        }

        $query = HbfOpcionesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            HbfOpcionesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                HbfOpcionesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the hbf_opciones table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return HbfOpcionesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a HbfOpciones or Criteria object.
     *
     * @param mixed               $criteria Criteria or HbfOpciones object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HbfOpcionesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from HbfOpciones object
        }

        if ($criteria->containsKey(HbfOpcionesTableMap::COL_ID_OPTION) && $criteria->keyContainsValue(HbfOpcionesTableMap::COL_ID_OPTION) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.HbfOpcionesTableMap::COL_ID_OPTION.')');
        }


        // Set the correct dbName
        $query = HbfOpcionesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // HbfOpcionesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
HbfOpcionesTableMap::buildTableMap();
